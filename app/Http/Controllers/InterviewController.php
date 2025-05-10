<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use App\Models\Interview;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class InterviewController extends Controller
{
    /**
     * Display the pathways selection page.
     */
    public function showPathways(Request $request)
    {
        $paths = Question::select('path')->distinct()->pluck('path')->toArray();
        $subPaths = [
            'soc' => [],
            'malware' => [],
            'pentest' => [],
            'red_teaming' => [],
        ];

        foreach ($paths as $path) {
            $subPaths[$path] = Question::where('path', $path)
                ->whereNotNull('sub_path')
                ->select('sub_path')
                ->distinct()
                ->pluck('sub_path')
                ->toArray();
        }

        $error = $request->query('error');
        return view('interview.pathways', compact('paths', 'subPaths', 'error'));
    }

    /**
     * Retrieve questions based on the selected path and sub-path.
     */
    public function getQuestions(Request $request)
    {
        $path = $request->query('path');
        $subPath = $request->query('subPath');

        $pathMapping = [
            'soc' => 'soc',
            'malware-analysis' => 'malware',
            'pen-test' => 'pentest',
            'redTeaming' => 'red_teaming',
        ];

        if (!$path || !isset($pathMapping[$path])) {
            return redirect()->route('pathways')->with('error', 'Invalid path selected.');
        }

        $path = $pathMapping[$path];
        $validSubPaths = ['web', 'mobile', 'network'];
        if ($path === 'pentest') {
            if (!$subPath || !in_array($subPath, $validSubPaths)) {
                return redirect()->route('pathways')->with('error', 'Invalid sub-path selected for Penetration Testing.');
            }
        } else {
            $subPath = null;
        }

        \Log::info("Fetching questions for path: {$path}, subPath: " . ($subPath ?? 'null'));

        $allQuestions = Question::select('id', 'text', 'audio_url')
            ->where('path', $path)
            ->when($subPath, fn($query) => $query->where('sub_path', $subPath))
            ->inRandomOrder()
            ->take(15)
            ->get();

        // Log audio URLs for debugging
        foreach ($allQuestions as $question) {
            \Log::info("Question ID: {$question->id}, Audio URL: {$question->audio_url}");
        }

        $uniqueQuestions = $allQuestions->unique(function ($question) {
            return $question->text . '|' . $question->audio_url;
        })->take(1);

        \Log::info("Found {$uniqueQuestions->count()} unique questions");

        if ($uniqueQuestions->count() < 1) {
            return redirect()->route('pathways')->with('error', 'Not enough unique questions available for this path. Please add more questions.');
        }

        // Pass path and subPath in the redirect
        return redirect()->route('interview', [
            'path' => $path,
            'subPath' => $subPath,
        ])->with('questions', $uniqueQuestions);
    }

    /**
     * Display the interview page with questions.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $path = $request->query('path');
        $subPath = $request->query('subPath');

        $pathMapping = [
            'soc' => 'soc',
            'malware' => 'malware',
            'pentest' => 'pentest',
            'red_teaming' => 'red_teaming',
        ];

        if (!$path || !isset($pathMapping[$path])) {
            return redirect()->route('pathways')->with('error', 'Invalid path selected.');
        }

        $mappedPath = $pathMapping[$path];
        $validSubPaths = ['web', 'mobile', 'network'];
        if ($mappedPath === 'pentest') {
            if (!$subPath || !in_array($subPath, $validSubPaths)) {
                return redirect()->route('pathways')->with('error', 'Invalid sub-path selected for Penetration Testing.');
            }
        } else {
            $subPath = null;
        }

        $existingInterview = Interview::where('user_id', $user->id)
            ->where('path', $mappedPath)
            ->where('sub_path', $subPath)
            ->first();

        if ($existingInterview && $existingInterview->status === 'pending') {
            \Log::info("User {$user->id} attempted to re-enter interview for path: {$mappedPath}, subPath: " . ($subPath ?? 'null'));
            abort(403, 'You have already completed this interview. Your answers are under review.');
        }

        if (!$existingInterview) {
            Interview::create([
                'user_id' => $user->id,
                'path' => $mappedPath,
                'sub_path' => $subPath,
                'status' => 'in_progress',
                'started_at' => now(),
            ]);
        }

        $questions = $request->session()->get('questions', []);
        if (empty($questions)) {
            return redirect()->route('pathways')->with('error', 'No questions available. Please select a path.');
        }

        $error = $request->query('error');
        return view('interview.interview', compact('questions', 'error'));
    }

    /**
     * Get the authenticated user's ID for use in JavaScript.
     */
    public function getUserId(Request $request)
    {
        return response()->json(['user_id' => $request->user()->id]);
    }

    /**
     * Handle the submission of an answer video.
     */
 
     public function submitAnswer(Request $request)
     {
         ini_set('max_execution_time', 300);
 
         // Check if user is authenticated
         if (!$request->user()) {
             Log::error('User not authenticated');
             return response()->json(['error' => 'Unauthenticated'], 401);
         }
 
         // Log MIME types for debugging
         $video = $request->file('video');
         if ($video) {
             $mimeType = $video->getClientMimeType();
             $serverMimeType = $video->getMimeType();
             Log::info("Client-reported MIME type for video: {$mimeType}");
             Log::info("Server-detected MIME type for video: {$serverMimeType}");
         }
 
         // Validate the request
         $validated = $request->validate([
             'video' => 'required|file|mimes:webm,mp4,x-matroska|max:51200', // Added x-matroska for MKV
             'question_id' => 'required|integer|exists:questions,id',
             'user_id' => 'required|integer|exists:users,id',
             'time_taken' => 'required|numeric|min:0',
         ]);
 
         // Extract validated data
         $video = $request->file('video');
         $questionId = $request->input('question_id');
         $userId = $request->input('user_id');
         $timeTaken = $request->input('time_taken');
 
         Log::info("Uploading answer for question ID: {$questionId}, User ID: {$userId}");
         Log::info("Uploading answer for video: " . ($video ? 'Present' : 'Missing'));
         Log::info("Video file size: " . ($video ? $video->getSize() : 'N/A') . " bytes");
 
         // Validate input data
         if (!$video || !$questionId || !$userId) {
             Log::error("Missing video, question ID, or user ID: video=" . ($video ? 'Present' : 'Missing') . ", questionId={$questionId}, userId={$userId}");
             return response()->json(['error' => 'Missing video, question ID, or user ID'], 400);
         }
 
         // Validate question existence
         $question = Question::find($questionId);
         if (!$question) {
             Log::error("Invalid question ID: {$questionId}");
             return response()->json(['error' => 'Invalid question ID'], 400);
         }
 
         Log::info("Uploading answer for question with ID: {$question->id}, Text: {$question->text}");
 
         try {
             // Store the video in local storage
             $folder = "interview_videos/user_{$userId}";
             $fileName = "user_{$userId}_question_{$questionId}." . $video->getClientOriginalExtension();
             $path = $video->storeAs($folder, $fileName, 'public'); // Store in storage/app/public
 
             Log::info("Video stored locally at: {$path}");
 
             // Generate a URL for the stored video
             $videoUrl = Storage::url($path);
             Log::info("Generated video URL: {$videoUrl}");
 
             // Create the answer record in the database
             Log::info("Creating answer record in database...");
             $answer = Answer::create([
                 'question_id' => $questionId,
                 'video_url' => $videoUrl,
                 'user_id' => $userId,
                 'time_taken' => $timeTaken,
             ]);
             Log::info("Answer created successfully, ID: {$answer->id}");
 
             return response()->json(['success' => 'Answer uploaded successfully']);
         } catch (\Exception $e) {
             Log::error('Upload failed: ' . $e->getMessage());
             Log::error('Stack trace: ' . $e->getTraceAsString());
             return response()->json(['error' => 'Upload failed: ' . $e->getMessage()], 500);
         }
     }
     
   /* public function submitAnswer(Request $request)
   
    {
        ini_set('max_execution_time', 300);

        if (!$request->user()) {
            \Log::error('User not authenticated');
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    
        $video = $request->file('video');
        if ($video) {
            $mimeType = $video->getClientMimeType();
            \Log::info("Detected MIME type for video: {$mimeType}");
        }
    
        $validated = $request->validate([
            'video' => 'required|file|mimes:webm,mp4,x-matroska|max:51200',
            'question_id' => 'required|integer|exists:questions,id',
            'user_id' => 'required|integer|exists:users,id',
            'time_taken' => 'required|numeric|min:0',
        ]);
    
        $video = $request->file('video');
        $questionId = $request->input('question_id');
        $userId = $request->input('user_id');
        $timeTaken = $request->input('time_taken');
    
        \Log::info("Uploading answer for question ID: {$questionId}, User ID: {$userId}");
        \Log::info("Uploading answer for video: " . ($video ? 'Present' : 'Missing'));
        \Log::info("Video file size: " . ($video ? $video->getSize() : 'N/A') . " bytes");
    
        if (!$video || !$questionId || !$userId) {
            \Log::error("Missing video, question ID, or user ID: video=" . ($video ? 'Present' : 'Missing') . ", questionId={$questionId}, userId={$userId}");
            return response()->json(['error' => 'Missing video, question ID, or user ID'], 400);
        }
    
        $question = Question::find($questionId);
        if (!$question) {
            \Log::error("Invalid question ID: {$questionId}");
            return response()->json(['error' => 'Invalid question ID'], 400);
        }
    
        \Log::info("Uploading answer for question with ID: {$question->id}, Text: {$question->text}");
    
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);
    
        try {
            \Log::info("Uploading video to Cloudinary for user ID: {$userId}");
            $folder = "interview_videos/user_{$userId}";
            $publicId = "user_{$userId}_question_{$questionId}";
            $uploadedVideo = $cloudinary->uploadApi()->upload($video->getPathname(), [
                'resource_type' => 'video',
                'folder' => $folder,
                'public_id' => $publicId,
                'timeout' => 300,
            ]);
            \Log::info("Video uploaded to Cloudinary, secure_url: {$uploadedVideo['secure_url']}");
    
            \Log::info("Creating answer record in database...");
            $answer = Answer::create([
                'question_id' => $questionId,
                'video_url' => $uploadedVideo['secure_url'],
                'user_id' => $userId,
                'time_taken' => $timeTaken,
            ]);
            \Log::info("Answer created successfully, ID: {$answer->id}");
    
            return response()->json(['success' => 'Answer uploaded successfully']);
        } catch (\Exception $e) {
            \Log::error('Upload failed: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json(['error' => 'Upload failed: ' . $e->getMessage()], 500);
        }
    }
*/
    /**
     * Mark the interview as completed and store its state.
     */
    
     public function completeInterview(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            \Log::error('User not authenticated');
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $path = $request->input('path');
        $subPath = $request->input('subPath');

        $pathMapping = [
            'soc' => 'soc',
            'malware' => 'malware',
            'pentest' => 'pentest',
            'red_teaming' => 'red_teaming',
        ];

        if (!$path || !isset($pathMapping[$path])) {
            \Log::error("Invalid path provided: {$path}");
            return response()->json(['error' => 'Invalid path'], 400);
        }

        $mappedPath = $pathMapping[$path];
        $validSubPaths = ['web', 'mobile', 'network'];
        if ($mappedPath === 'pentest') {
            if (!$subPath || !in_array($subPath, $validSubPaths)) {
                \Log::error("Invalid sub-path for pentest: {$subPath}");
                return response()->json(['error' => 'Invalid sub-path for Penetration Testing'], 400);
            }
        } else {
            $subPath = null;
        }

        $interview = Interview::where('user_id', $user->id)
            ->where('path', $mappedPath)
            ->where('sub_path', $subPath)
            ->first();

        if (!$interview) {
            \Log::error("Interview not found for user {$user->id}, path: {$mappedPath}, subPath: " . ($subPath ?? 'null'));
            return response()->json(['error' => 'Interview not found'], 404);
        }

        if ($interview->status === 'pending') {
            \Log::info("Interview already completed for user {$user->id}, path: {$mappedPath}, subPath: " . ($subPath ?? 'null'));
            return response()->json(['message' => 'Interview already completed']);
        }

        $folderUrl = "https://res.cloudinary.com/" . env('CLOUDINARY_CLOUD_NAME') . "/video/upload/interview_videos/user_{$user->id}/";

        $interview->update([
            'folder_url' => $folderUrl,
            'status' => 'pending',
            'completed_at' => now(),
        ]);

        \Log::info("Interview state updated for user {$user->id}, path: {$mappedPath}, subPath: " . ($subPath ?? 'null'));

        return response()->json(['message' => 'Interview state stored successfully']);
    }

    /**
     * Display the wait page after interview completion.
     */
    public function showWaitPage(Request $request)
    {
        $success = $request->query('success');
        return view('interview.wait', compact('success'));
    }
}