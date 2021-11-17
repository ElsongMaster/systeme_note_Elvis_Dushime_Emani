<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteUserdislikedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_userdislikeds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('note_id')->constrained('notes','id');
            $table->foreignId('user_id')->constrained('users','id');
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
        Schema::dropIfExists('note_userdislikeds');
    }
}
