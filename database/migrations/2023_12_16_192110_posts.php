<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('category')->nullable();
            $table->string('author');
            $table->string('cover');
            $table->longText('content');
            $table->text('keyword');
            $table->text('caption');
            $table->boolean('isComentOn')->default(true);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
