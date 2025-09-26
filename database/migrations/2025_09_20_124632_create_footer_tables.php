<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. امکانات فروشگاه
        Schema::create('footer_features', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('url')->nullable();
            $table->tinyInteger('position')->default(0)->comment('developer explain 0 or 1 ... in admin\content\banner model');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        // 2. لینک‌های ستونی
        Schema::create('footer_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->tinyInteger('position')->default(0)->comment('developer explain 0 or 1 ... in  FooterLink model');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        // 3. شبکه‌های اجتماعی
        Schema::create('footer_socials', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('url');
            $table->string('icon')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        // 4. نمادهای اعتماد
        Schema::create('footer_badges', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon_path')->nullable();
            $table->string('url')->nullable();
            $table->longText('script')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });



        // 5. تنظیمات کلی فوتر
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('copyright')->nullable();
            $table->timestamps();
        });


    }

    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
        Schema::dropIfExists('footer_badges');
        Schema::dropIfExists('social_links');
        Schema::dropIfExists('footer_links');
        Schema::dropIfExists('footer_features');
    }
};
