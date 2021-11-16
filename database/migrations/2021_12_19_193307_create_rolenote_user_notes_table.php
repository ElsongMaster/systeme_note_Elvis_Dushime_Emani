<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolenoteUserNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolenote_user_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rolenote_id')->constrained('rolenotes','id');
            $table->foreignId('user_id')->constrained('users','id');
            $table->foreignId('note_id')->constrained('notes','id');
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
        Schema::dropIfExists('rolenote_user_notes');
    }
}
