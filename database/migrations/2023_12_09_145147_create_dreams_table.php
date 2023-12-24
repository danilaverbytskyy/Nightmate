<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dreams', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->text('content');
            $table->string('slug');
            $table->date('updated_at');
            $table->date('created_at');
            $table->bigInteger('user_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dreams');
    }
};
