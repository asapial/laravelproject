<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('topics_name', function (Blueprint $table) {
            $table->increments('id'); // Auto-incrementing primary key
            $table->text('name')->nullable(); // TEXT column for long strings, nullable
            $table->text('link')->nullable(); // TEXT column for long strings, nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics_name');
    }
};
