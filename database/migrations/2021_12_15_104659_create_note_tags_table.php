<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId("note_id")->constrained('notes','id');
            $table->foreignId("tag_id")->constrained('tags','id');
            $table->dropForeign('note_tags_note_id_foreign');
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
        Schema::dropIfExists('note_tags');
    }
}
