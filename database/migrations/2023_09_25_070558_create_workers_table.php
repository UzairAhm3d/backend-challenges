<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   // I changed it to workers because employees already exists.
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->morphs('workerables');
            $table->foreignId('user_id')->constrained();
            $table->boolean('is_head')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
