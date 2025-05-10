let currentQuestionIndex = 0;
let answers = [];
let recordedVideos = [];
let isListening = false;
let isRecording = false;
let mediaRecorder
let recordedChunks = [];
let stream;
let countdownInterval;
let currentAudio = null;
let isUploading = false;
let countdownFinished = false;
let audioPlayedForCurrentQuestion = false;
let recordingStartTime = null; // Track recording start time

document.addEventListener('DOMContentLoaded', function () {
  console.log('DOM loaded, initializing interview process...');
  const listenButton = document.getElementById('listen-button');
  const recordButton = document.getElementById('record-button');
  const actionButton = document.getElementById('action-button');

  console.log('Checking for questions:', window.questions);
  if (!window.questions || window.questions.length === 0) {
    console.error('No questions available, redirecting to pathways...');
    window.location.href = '/pathways?error=' + encodeURIComponent('No questions available. Please select a path.');
    return;
  }

  console.log('Saving questions to sessionStorage:', window.questions);
  sessionStorage.setItem('interviewQuestions', JSON.stringify(window.questions));

  console.log('Disabling buttons initially...');
  if (listenButton) {
    listenButton.disabled = true;
    console.log('Listen button disabled');
  }
  if (actionButton) {
    actionButton.disabled = true;
    console.log('Action button disabled');
  }

  console.log('Adding event listeners...');
  if (recordButton) {
    recordButton.addEventListener('click', startRecording);
    console.log('Record button listener added');
  }
  if (listenButton) {
    listenButton.addEventListener('click', startListening);
    console.log('Listen button listener added');
  } else {
    console.error('Listen button not found!');
  }
  if (actionButton) {
    actionButton.addEventListener('click', sendAnswers);
    console.log('Action button listener added');
  }

  window.debugListenButton = () => {
    if (listenButton) {
      console.log('Listen button exists, checking event listeners...');
      listenButton.click();
    } else {
      console.error('Listen button not found in debugListenButton!');
    }
  };
});

async function startRecording() {
  try {
    console.log('startRecording called...');
    if (isRecording) {
      console.log('Recording already in progress, exiting.');
      return;
    }

    if (stream) {
      console.log('Cleaning up existing stream...');
      stream.getTracks().forEach(track => track.stop());
      stream = null;
    }

    if (currentAudio) {
      console.log('Pausing and resetting current audio in startRecording...');
      currentAudio.pause();
      currentAudio.currentTime = 0;
      currentAudio = null;
    }
    isListening = false;
    console.log('isListening reset to false in startRecording');

    audioPlayedForCurrentQuestion = false;
    console.log('audioPlayedForCurrentQuestion set to false in startRecording');

    console.log('Requesting media access...');
    stream = await navigator.mediaDevices.getUserMedia({
      video: { width: 480, height: 270, frameRate: 10 },
      audio: true,
    });
    console.log('Media stream acquired:', stream);

    const videoElement = document.createElement('video');
    videoElement.srcObject = stream;
    videoElement.autoplay = true;
    videoElement.playsInline = true;
    const videoContainer = document.getElementById('video-container');
    if (videoContainer) {
      console.log('Clearing video container and adding new video element...');
      videoContainer.innerHTML = "";
      videoContainer.appendChild(videoElement);
    } else {
      console.error('Video container not found!');
    }

    const img = document.getElementById('person-placeholder');
    if (img) {
      console.log('Hiding person-placeholder image...');
      img.style.display = 'none';
    }

    mediaRecorder = new MediaRecorder(stream, { mimeType: 'video/webm;codecs=vp8,opus' });
    recordedChunks = [];
    mediaRecorder.ondataavailable = (event) => {
      if (event.data.size > 0) {
        console.log('Recording data available, size:', event.data.size);
        recordedChunks.push(event.data);
      } else {
        console.warn('Received empty data chunk');
      }
    };
    mediaRecorder.onstop = () => {
      console.log('MediaRecorder stopped, recordedChunks length:', recordedChunks.length);
    };
    console.log('Starting media recorder...');
    mediaRecorder.start(1000);
    console.log('Media recorder started:', mediaRecorder.state);

    const listenButton = document.getElementById('listen-button');
    const recordButton = document.getElementById('record-button');
    const actionButton = document.getElementById('action-button');
    const questionText = document.getElementById('question-text');
    if (listenButton) {
      listenButton.disabled = false;
      console.log('Listen button enabled');
    }
    if (recordButton) {
      recordButton.disabled = true;
      console.log('Record button disabled');
    }
    if (actionButton) {
      actionButton.disabled = true;
      console.log('Action button disabled');
    }
    if (questionText) {
      questionText.innerText = "Click 'Start Listening' to hear the question.";
      console.log('Updated question text to prompt for listening');
    }

    isRecording = true;
    console.log('isRecording set to true');

    recordingStartTime = Date.now(); // Start the timer
    console.log('Recording start time:', recordingStartTime);

    console.log('Starting countdown in startRecording...');
    startCountdown();
  } catch (error) {
    console.error('Error during recording:', error);
    Swal.fire({
      icon: 'error',
      title: 'Recording Failed',
      text: 'Failed to start recording. Please ensure your camera and microphone are accessible and try again.',
      confirmButtonText: 'OK',
      confirmButtonColor: '#349BDB',
    });
    resetUI();
  }
}

async function startListening() {
  try {
    console.log('startListening called...');
    if (!isRecording) {
      console.log('Recording not active, cannot start listening.');
      Swal.fire({
        icon: 'warning',
        title: 'Recording Required',
        text: 'Please start recording first before listening to the question.',
        confirmButtonText: 'OK',
        confirmButtonColor: '#349BDB',
      });
      return;
    }
    if (isListening) {
      console.log('Already listening, exiting.');
      return;
    }
    if (currentQuestionIndex >= window.questions.length) {
      console.log('All questions answered, startListening aborted.');
      return;
    }
    if (countdownFinished) {
      console.log('Countdown has finished, startListening aborted until Send is clicked.');
      return;
    }
    if (audioPlayedForCurrentQuestion) {
      console.log('Audio already played for this question, skipping playback.');
      return;
    }

    const listenButton = document.getElementById('listen-button');
    if (listenButton) {
      listenButton.disabled = true;
      console.log('Listen button disabled after starting to listen');
    }

    isListening = true;
    console.log('isListening set to true');
    const question = window.questions[currentQuestionIndex];
    console.log('Current question:', question);

    if (!question || !question.audio_url || !question.text) {
      console.error('Invalid question data:', question);
      Swal.fire({
        icon: 'error',
        title: 'Invalid Question',
        text: 'Invalid question data. Please try again.',
        confirmButtonText: 'OK',
        confirmButtonColor: '#349BDB',
      });
      resetUI();
      return;
    }

    if (currentAudio) {
      console.log('Pausing and resetting current audio...');
      currentAudio.pause();
      currentAudio.currentTime = 0;
    }
    const audio = new Audio(question.audio_url);
    currentAudio = audio;
    console.log('New audio created:', question.audio_url);

    const audioLoadTimeout = setTimeout(() => {
      console.error('Audio loading timed out:', question.audio_url);
      Swal.fire({
        icon: 'error',
        title: 'Audio Load Failed',
        text: 'Failed to load audio. Please try again.',
        confirmButtonText: 'OK',
        confirmButtonColor: '#349BDB',
      });
      resetUI();
    }, 5000);

    audio.oncanplaythrough = () => {
      clearTimeout(audioLoadTimeout);
      if (audioPlayedForCurrentQuestion) {
        console.log('Audio already played (oncanplaythrough), skipping playback.');
        return;
      }
      console.log('Audio can play, starting playback...');
      audio.play().catch(e => {
        console.error('Error playing audio:', e);
        Swal.fire({
          icon: 'error',
          title: 'Audio Playback Failed',
          text: 'Failed to play audio. Please try again.',
          confirmButtonText: 'OK',
          confirmButtonColor: '#349BDB',
        });
        resetUI();
      });
      const questionText = document.getElementById('question-text');
      if (questionText) {
        const questionTextContent = 'Question ' + (currentQuestionIndex + 1) + ': ' + question.text;
        console.log('Updating question text to:', questionTextContent);
        questionText.innerText = questionTextContent;
      } else {
        console.error('question-text element not found!');
      }
      console.log('Starting sound waves animation...');
      drawSoundWaves(audio);
      audioPlayedForCurrentQuestion = true;
      console.log('audioPlayedForCurrentQuestion set to true');
    };

    audio.onended = () => {
      console.log('Audio playback ended');
      isListening = false;
      currentAudio = null;
      console.log('isListening set to false, currentAudio cleared');
    };

    audio.onerror = (e) => {
      clearTimeout(audioLoadTimeout);
      console.error('Error playing audio:', e);
      Swal.fire({
        icon: 'error',
        title: 'Audio Error',
        text: 'Failed to play audio. Please try again.',
        confirmButtonText: 'OK',
        confirmButtonColor: '#349BDB',
      });
      resetUI();
    };
  } catch (error) {
    console.error('Error during listening:', error);
    Swal.fire({
      icon: 'error',
      title: 'Listening Failed',
      text: 'Failed to listen. Please try again.',
      confirmButtonText: 'OK',
      confirmButtonColor: '#349BDB',
    });
    resetUI();
  }
}

function startCountdown() {
  if (countdownFinished) {
    console.log('Countdown already finished, skipping startCountdown.');
    return;
  }

  let countdownTime = 10;
  console.log('startCountdown called, countdownTime:', countdownTime);
  const countdownElement = document.getElementById('countdown');
  if (!countdownElement) {
    console.error('countdown element not found!');
    return;
  }

  clearInterval(countdownInterval);
  console.log('Cleared previous countdown interval');
  countdownInterval = setInterval(() => {
    const minutes = Math.floor(countdownTime / 60);
    const seconds = countdownTime % 60;
    const countdownText = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    countdownElement.innerText = countdownText;
    console.log('Countdown:', countdownText);
    countdownTime--;

    if (countdownTime < 0) {
      console.log('Countdown finished, stopping all functions...');
      clearInterval(countdownInterval);
      countdownElement.innerText = "0:00";

      stopRecording();

      if (currentAudio) {
        console.log('Pausing and resetting current audio after countdown...');
        currentAudio.pause();
        currentAudio.currentTime = 0;
        currentAudio = null;
      }

      const recordButton = document.getElementById('record-button');
      const listenButton = document.getElementById('listen-button');
      const actionButton = document.getElementById('action-button');
      const questionText = document.getElementById('question-text');
      if (recordButton) {
        recordButton.disabled = true;
        console.log('Record button disabled after countdown');
      }
      if (listenButton) {
        listenButton.disabled = true;
        console.log('Listen button disabled after countdown');
      }
      if (actionButton) {
        actionButton.disabled = false;
        console.log('Action button enabled for sending answer');
      }
      if (questionText) {
        questionText.innerText = "Time's up! Click 'Send' to submit your answer.";
        console.log('Updated question text to prompt for sending');
      }

      isListening = false;
      isRecording = false;
      countdownFinished = true;
      console.log('countdownFinished set to true, isListening and isRecording set to false');
    }
  }, 1000);
}

// async function sendAnswers() {
//   try {
//     console.log('sendAnswers called...');
//     if (recordedChunks.length === 0) {
//       console.error('No recorded chunks available!');
//       Swal.fire({
//         icon: 'error',
//         title: 'No Video Recorded',
//         text: 'No video recorded. Please try recording again.',
//         confirmButtonText: 'OK',
//         confirmButtonColor: '#349BDB',
//       });
//       resetUI();
//       return;
//     }

//     clearInterval(countdownInterval);
//     console.log('Cleared countdown interval in sendAnswers');

//     console.log('Creating video blob from recorded chunks...');
//     const blob = new Blob(recordedChunks, { type: 'video/webm' });
//     const recordingEndTime = Date.now();
//     const timeTaken = Math.round((recordingEndTime - recordingStartTime) / 1000); // Time in seconds
//     console.log('Recording duration (seconds):', timeTaken);
//     recordedVideos.push({ blob, questionId: window.questions[currentQuestionIndex].id, timeTaken });
//     console.log(`Stored video for question ${currentQuestionIndex + 1}, total videos: ${recordedVideos.length}`);
//     recordedChunks = [];

//     if (currentAudio) {
//       console.log('Pausing and resetting current audio in sendAnswers...');
//       currentAudio.pause();
//       currentAudio.currentTime = 0;
//       currentAudio = null;
//     }
//     isListening = false;
//     console.log('isListening reset to false in sendAnswers');

//     countdownFinished = false;
//     console.log('countdownFinished reset to false in sendAnswers');

//     audioPlayedForCurrentQuestion = false;
//     console.log('audioPlayedForCurrentQuestion reset to false in sendAnswers for next question');

//     currentQuestionIndex++;
//     console.log('Incremented currentQuestionIndex to:', currentQuestionIndex);

//     const questionText = document.getElementById('question-text');
//     const recordButton = document.getElementById('record-button');
//     const listenButton = document.getElementById('listen-button');
//     const actionButton = document.getElementById('action-button');

//     if (currentQuestionIndex < window.questions.length) {
//       console.log('Moving to next question...');
//       if (questionText) {
//         console.log('Updating question text for next question...');
//         questionText.innerText = `Click 'Start Recording' to begin Question ${currentQuestionIndex + 1}.`;
//       }
//       if (recordButton) {
//         recordButton.disabled = false;
//         console.log('Record button enabled');
//       }
//       if (listenButton) {
//         listenButton.disabled = true;
//         console.log('Listen button disabled');
//       }
//       if (actionButton) {
//         actionButton.disabled = true;
//         console.log('Action button disabled');
//       }
//     } else {
//       console.log('All questions answered, uploading all videos...');
//       if (questionText) {
//         questionText.innerText = "All questions answered. Uploading your answers...";
//       }
//       if (recordButton) {
//         recordButton.disabled = true;
//         console.log('Record button disabled during upload');
//       }
//       if (listenButton) {
//         listenButton.disabled = true;
//         console.log('Listen button disabled during upload');
//       }
//       if (actionButton) {
//         actionButton.disabled = true;
//         console.log('Action button disabled during upload');
//       }

//       isUploading = true;
//       window.addEventListener('beforeunload', handleBeforeUnload);

//       for (let i = 0; i < recordedVideos.length; i++) {
//         const { blob, questionId, timeTaken } = recordedVideos[i];
//         console.log(`Uploading video ${i + 1} of ${recordedVideos.length} for question ID: ${questionId}`);
//         if (!(blob instanceof Blob) || blob.size === 0) {
//           console.error('Invalid blob for video upload:', blob);
//           throw new Error('Invalid video blob');
//         }
//         if (!Number.isInteger(questionId) || questionId <= 0) {
//           console.error('Invalid questionId for video upload:', questionId);
//           throw new Error('Invalid question ID');
//         }
//         await uploadVideo(blob, questionId, timeTaken);
//       }

//       console.log('All videos uploaded successfully');
//       recordedVideos = [];

//       console.log('Storing interview state in the database...');
//       const urlParams = new URLSearchParams(window.location.search);
//       const path = urlParams.get('path');
//       const subPath = urlParams.get('subPath');
//       const response = await fetch('/api/complete-interview', {
//         method: 'POST',
//         headers: {
//           'Content-Type': 'application/json',
//           'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//         },
//         body: JSON.stringify({ path, subPath }),
//         credentials: 'same-origin', // Ensure session cookie is sent
//       });

//       if (!response.ok) {
//         const errorData = await response.json();
//         throw new Error(errorData.error || 'Failed to store interview state');
//       }

//       const result = await response.json();
//       console.log('Interview state stored:', result);

//       isUploading = false;
//       window.removeEventListener('beforeunload', handleBeforeUnload);

//       window.location.href = '/wait?success=' + encodeURIComponent('All answers submitted successfully.');
//     }
//   } catch (error) {
//     console.error('Error in sendAnswers:', error.message);
//     Swal.fire({
//       icon: 'error',
//       title: 'Submission Failed',
//       text: error.message || 'Failed to process answer. Please try again.',
//       confirmButtonText: 'OK',
//       confirmButtonColor: '#349BDB',
//     });
//     isUploading = false;
//     window.removeEventListener('beforeunload', handleBeforeUnload);
//     resetUI();
//   }
// }

// async function uploadVideo(blob, questionId, timeTaken) {
//   console.log('uploadVideo called...');

//   // Debug: Check blob
//   console.log('Blob:', blob);
//   if (!(blob instanceof Blob) || blob.size === 0) {
//     console.error('Invalid blob in uploadVideo:', blob);
//     throw new Error('Invalid video blob');
//   }

//   // Debug: Check questionId
//   console.log('Question ID:', questionId);
//   if (!Number.isInteger(questionId) || questionId <= 0) {
//     console.error('Invalid questionId in uploadVideo:', questionId);
//     throw new Error('Invalid question ID');
//   }

//   // Debug: Check timeTaken
//   console.log('Time Taken:', timeTaken);
//   if (!Number.isInteger(timeTaken) || timeTaken < 0) {
//     console.error('Invalid timeTaken in uploadVideo:', timeTaken);
//     throw new Error('Invalid time taken');
//   }

//   // Fetch userId
//   const userId = await fetchUserId();
//   console.log('User ID fetched:', userId);
//   // Debug: Check userId
//   if (!Number.isInteger(userId) || userId <= 0) {
//     console.error('Invalid userId in uploadVideo:', userId);
//     throw new Error('Invalid user ID');
//   }

//   // Prepare formData
//   const formData = new FormData();
//   // Create a new Blob with explicit type to ensure MIME type is set correctly
//   const videoBlob = new Blob([blob], { type: 'video/webm' });
//   formData.append('video', videoBlob, `user_${userId}_question_${questionId}.webm`);
//   formData.append('question_id', questionId);
//   formData.append('user_id', userId);
//   formData.append('time_taken', timeTaken); // Add time_taken to FormData
//   // Debug: Log formData entries
//   console.log('FormData prepared for upload:');
//   for (let [key, value] of formData.entries()) {
//     console.log(`FormData entry - ${key}:`, value);
//   }

//   // Send the request with additional headers for debugging
//   console.log('Sending video to /api/submit-answer...');
//   const requestHeaders = new Headers();
//   requestHeaders.append('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
//   requestHeaders.append('Accept', 'application/json'); // Explicitly request JSON response

//   const response = await fetch('/api/submit-answer', {
//     method: 'POST',
//     headers: requestHeaders,
//     body: formData,
//     credentials: 'same-origin',
//   });

//   // Debug: Check response details
//   console.log('Upload response status:', response.status);
//   console.log('Response headers:', response.headers.get('content-type'));

//   // If the response is not OK or not JSON, log the raw response
//   if (!response.ok || !response.headers.get('content-type')?.includes('application/json')) {
//     const rawResponse = await response.text();
//     console.error('Raw response from server:', rawResponse);
//     throw new Error('Server did not return JSON or failed validation. Check the raw response in the console for details.');
//   }

//   const result = await response.json();
//   console.log('Upload response:', result);
// }

async function sendAnswers() {
  try {
    console.log('sendAnswers called...');
    if (recordedChunks.length === 0) {
      console.error('No recorded chunks available!');
      Swal.fire({
        icon: 'error',
        title: 'No Video Recorded',
        text: 'No video recorded. Please try recording again.',
        confirmButtonText: 'OK',
        confirmButtonColor: '#349BDB',
      });
      resetUI();
      return;
    }

    clearInterval(countdownInterval);
    console.log('Cleared countdown interval in sendAnswers');

    console.log('Creating video blob from recorded chunks...');
    const blob = new Blob(recordedChunks, { type: 'video/webm' });
    if (!(blob instanceof Blob) || blob.size === 0) {
      throw new Error('Failed to create a valid video blob');
    }

    const recordingEndTime = Date.now();
    const timeTaken = Math.round((recordingEndTime - recordingStartTime) / 1000); // Time in seconds
    console.log('Recording duration (seconds):', timeTaken);
    if (!Number.isInteger(timeTaken) || timeTaken < 0) {
      throw new Error('Invalid recording duration');
    }

    const questionId = window.questions[currentQuestionIndex].id;
    if (!Number.isInteger(questionId) || questionId <= 0) {
      throw new Error('Invalid question ID');
    }

    recordedVideos.push({ blob, questionId, timeTaken });
    console.log(`Stored video for question ${currentQuestionIndex + 1}, total videos: ${recordedVideos.length}`);
    recordedChunks = [];

    if (currentAudio) {
      console.log('Pausing and resetting current audio in sendAnswers...');
      currentAudio.pause();
      currentAudio.currentTime = 0;
      currentAudio = null;
    }
    isListening = false;
    console.log('isListening reset to false in sendAnswers');

    countdownFinished = false;
    console.log('countdownFinished reset to false in sendAnswers');

    audioPlayedForCurrentQuestion = false;
    console.log('audioPlayedForCurrentQuestion reset to false in sendAnswers for next question');

    currentQuestionIndex++;
    console.log('Incremented currentQuestionIndex to:', currentQuestionIndex);

    const questionText = document.getElementById('question-text');
    const recordButton = document.getElementById('record-button');
    const listenButton = document.getElementById('listen-button');
    const actionButton = document.getElementById('action-button');

    if (currentQuestionIndex < window.questions.length) {
      console.log('Moving to next question...');
      if (questionText) {
        console.log('Updating question text for next question...');
        questionText.innerText = `Click 'Start Recording' to begin Question ${currentQuestionIndex + 1}.`;
      }
      if (recordButton) {
        recordButton.disabled = false;
        console.log('Record button enabled');
      }
      if (listenButton) {
        listenButton.disabled = true;
        console.log('Listen button disabled');
      }
      if (actionButton) {
        actionButton.disabled = true;
        console.log('Action button disabled');
      }
    } else {
      console.log('All questions answered, uploading all videos...');
      if (questionText) {
        questionText.innerText = "All questions answered. Uploading your answers...";
      }
      if (recordButton) {
        recordButton.disabled = true;
        console.log('Record button disabled during upload');
      }
      if (listenButton) {
        listenButton.disabled = true;
        console.log('Listen button disabled during upload');
      }
      if (actionButton) {
        actionButton.disabled = true;
        console.log('Action button disabled during upload');
      }

      isUploading = true;
      window.addEventListener('beforeunload', handleBeforeUnload);

      for (let i = 0; i < recordedVideos.length; i++) {
        const { blob, questionId, timeTaken } = recordedVideos[i];
        console.log(`Uploading video ${i + 1} of ${recordedVideos.length} for question ID: ${questionId}`);
        try {
          await uploadVideo(blob, questionId, timeTaken);
        } catch (uploadError) {
          console.error(`Failed to upload video ${i + 1}:`, uploadError.message);
          throw new Error(`Failed to upload video for question ${questionId}: ${uploadError.message}`);
        }
      }

      console.log('All videos uploaded successfully');
      recordedVideos = [];

      console.log('Storing interview state in the database...');
      const urlParams = new URLSearchParams(window.location.search);
      const path = urlParams.get('path');
      const subPath = urlParams.get('subPath');
      const response = await fetch('/api/complete-interview', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ path, subPath }),
        credentials: 'same-origin',
      });

      if (!response.ok) {
        const errorData = await response.json();
        throw new Error(errorData.error || 'Failed to store interview state');
      }

      const result = await response.json();
      console.log('Interview state stored:', result);

      isUploading = false;
      window.removeEventListener('beforeunload', handleBeforeUnload);

      window.location.href = '/wait?success=' + encodeURIComponent('All answers submitted successfully.');
    }
  } catch (error) {
    console.error('Error in sendAnswers:', error.message);
    Swal.fire({
      icon: 'error',
      title: 'Submission Failed',
      text: error.message || 'Failed to process answer. Please try again.',
      confirmButtonText: 'OK',
      confirmButtonColor: '#349BDB',
    });
    isUploading = false;
    window.removeEventListener('beforeunload', handleBeforeUnload);
    resetUI();
  }
}

async function uploadVideo(blob, questionId, timeTaken) {
  console.log('uploadVideo called...');

  // Debug: Check blob
  console.log('Blob:', blob);
  if (!(blob instanceof Blob) || blob.size === 0) {
    console.error('Invalid blob in uploadVideo:', blob);
    throw new Error('Invalid video blob');
  }

  // Debug: Check questionId
  console.log('Question ID:', questionId);
  if (!Number.isInteger(questionId) || questionId <= 0) {
    console.error('Invalid questionId in uploadVideo:', questionId);
    throw new Error('Invalid question ID');
  }

  // Debug: Check timeTaken
  console.log('Time Taken:', timeTaken);
  if (!Number.isInteger(timeTaken) || timeTaken < 0) {
    console.error('Invalid timeTaken in uploadVideo:', timeTaken);
    throw new Error('Invalid time taken');
  }

  // Fetch userId
  let userId;
  try {
    userId = await fetchUserId();
    console.log('User ID fetched:', userId);
    if (!Number.isInteger(userId) || userId <= 0) {
      console.error('Invalid userId in uploadVideo:', userId);
      throw new Error('Invalid user ID');
    }
  } catch (error) {
    console.error('Failed to fetch user ID:', error.message);
    throw new Error('Failed to fetch user ID: ' + error.message);
  }

  // Prepare formData
  const formData = new FormData();
  const videoBlob = new Blob([blob], { type: 'video/webm' });
  formData.append('video', videoBlob, `user_${userId}_question_${questionId}.webm`);
  formData.append('question_id', questionId);
  formData.append('user_id', userId);
  formData.append('time_taken', timeTaken);
  console.log('FormData prepared for upload:');
  for (let [key, value] of formData.entries()) {
    console.log(`FormData entry - ${key}:`, value);
  }

  // Send the request
  console.log('Sending video to /api/submit-answer...');
  const requestHeaders = new Headers();
  requestHeaders.append('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
  requestHeaders.append('Accept', 'application/json');

  let response;
  try {
    response = await fetch('/api/submit-answer', {
      method: 'POST',
      headers: requestHeaders,
      body: formData,
      credentials: 'same-origin',
    });
  } catch (fetchError) {
    console.error('Fetch error while uploading video:', fetchError.message);
    throw new Error('Network error while uploading video: ' + fetchError.message);
  }

  console.log('Upload response status:', response.status);
  console.log('Response headers:', response.headers.get('content-type'));

  let responseData;
  try {
    if (!response.headers.get('content-type')?.includes('application/json')) {
      const rawResponse = await response.text();
      console.error('Raw response from server (non-JSON):', rawResponse);
      throw new Error('Server did not return JSON');
    }
    responseData = await response.json();
  } catch (parseError) {
    console.error('Error parsing response as JSON:', parseError.message);
    throw new Error('Failed to parse server response: ' + parseError.message);
  }

  if (!response.ok) {
    if (response.status === 422) {
      console.error('Validation error from server:', responseData);
      throw new Error('Validation failed: ' + (responseData.message || 'Unknown validation error'));
    } else if (response.status === 500) {
      console.error('Server error from server:', responseData);
      if (responseData.message.includes('Cloudinary')) {
        throw new Error('Cloudinary configuration error: ' + (responseData.message || 'Unknown Cloudinary error'));
      }
      throw new Error('Server error: ' + (responseData.message || 'Unknown server error'));
    } else {
      console.error('Unexpected error from server:', responseData);
      throw new Error('Unexpected error: ' + (responseData.message || `Status ${response.status}`));
    }
  }

  console.log('Upload response:', responseData);
  return responseData;
}

async function fetchUserId() {
  const response = await fetch('/api/user-id', {
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
    credentials: 'same-origin', // Ensure session cookie is sent
  });
  if (!response.ok) {
    throw new Error('Failed to fetch user ID');
  }
  const data = await response.json();
  return data.user_id;
}

function stopRecording() {
  console.log('stopRecording called...');
  if (mediaRecorder && mediaRecorder.state !== 'inactive') {
    console.log('Stopping media recorder...');
    mediaRecorder.requestData();
    mediaRecorder.stop();
    console.log('Media recorder state after stop:', mediaRecorder.state);
  }
  if (stream) {
    console.log('Stopping media stream tracks...');
    stream.getTracks().forEach(track => track.stop());
    stream = null;
  }
  isListening = false;
  isRecording = false;
  console.log('isListening and isRecording reset to false in stopRecording');
  const img = document.getElementById('person-placeholder');
  if (img) {
    console.log('Showing person-placeholder image...');
    img.style.display = 'block';
  }
  const listenButton = document.getElementById('listen-button');
  if (listenButton) {
    listenButton.disabled = true;
    console.log('Listen button disabled to prevent auto-trigger');
  }
}

function resetUI() {
  console.log('resetUI called...');
  const questionText = document.getElementById('question-text');
  const listenButton = document.getElementById('listen-button');
  const recordButton = document.getElementById('record-button');
  const actionButton = document.getElementById('action-button');
  if (questionText) {
    console.log('Resetting question text...');
    questionText.innerText = "An error occurred. Click 'Start Recording' to try again.";
  }
  if (listenButton) {
    listenButton.disabled = true;
    console.log('Listen button disabled');
  }
  if (recordButton) {
    recordButton.disabled = false;
    console.log('Record button enabled');
  }
  if (actionButton) {
    actionButton.disabled = true;
    console.log('Action button disabled');
  }
  if (currentAudio) {
    console.log('Pausing and resetting current audio in resetUI...');
    currentAudio.pause();
    currentAudio.currentTime = 0;
    currentAudio = null;
  }
  isRecording = false;
  isListening = false;
  countdownFinished = false;
  audioPlayedForCurrentQuestion = false;
  console.log('isRecording, isListening, countdownFinished, and audioPlayedForCurrentQuestion reset to false');
}

function drawSoundWaves(audio) {
  console.log('drawSoundWaves called...');
  const canvas = document.getElementById('sound-waves-canvas');
  const ctx = canvas.getContext('2d');
  const width = canvas.width;
  const height = canvas.height;
  const waveHeight = height / 2;
  let x = 0;
  let y = waveHeight;
  let animationFrameId;

  const img = document.getElementById('robot-bottom-img');
  if (img) {
    console.log('Hiding robot-bottom-img...');
    img.style.display = 'none';
  } else {
    console.error('robot-bottom-img element not found!');
  }

  function draw() {
    ctx.clearRect(0, 0, width, height);
    ctx.beginPath();
    ctx.moveTo(0, waveHeight);

    for (let i = 0; i < width; i++) {
      const amplitude = Math.random() * 60;
      y = waveHeight + Math.sin((i + x) * 0.07) * amplitude;
      ctx.lineTo(i, y);
    }

    ctx.strokeStyle = '#3498DB';
    ctx.lineWidth = 5;
    ctx.stroke();
    x += 1;
    animationFrameId = requestAnimationFrame(draw);
  }

  console.log('Starting sound wave animation...');
  draw();

  if (audio) {
    audio.onended = () => {
      console.log('Audio ended, stopping sound wave animation...');
      cancelAnimationFrame(animationFrameId);
      ctx.clearRect(0, 0, width, height);
      if (img) {
        console.log('Showing robot-bottom-img...');
        img.style.display = 'block';
      }
    };
  } else {
    setTimeout(() => {
      console.log('No audio, stopping sound wave animation after 5 seconds...');
      cancelAnimationFrame(animationFrameId);
      ctx.clearRect(0, 0, width, height);
      if (img) {
        console.log('Showing robot-bottom-img...');
        img.style.display = 'block';
      }
    }, 5000);
  }
}

document.querySelector('img[alt="Robot"]').addEventListener('click', () => {
  console.log('Robot image clicked, triggering sound waves...');
  drawSoundWaves();
});

function handleBeforeUnload(event) {
  if (isUploading) {
    event.preventDefault();
    event.returnValue = 'Your answers are still uploading. Are you sure you want to leave?';
    return 'Your answers are still uploading. Are you sure you want to leave?';
  }
}