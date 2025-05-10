<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('path'); // المسار الرئيسي (SOC, Red Teaming, Malware, Pentest)
            $table->string('sub_path')->nullable(); // المسار الفرعي (Network, Mobile, Web) لـ Pentest فقط
            $table->text('text'); // نص السؤال
            $table->string('audio_url'); // رابط الصوت من Cloudinary
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};