<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestbookEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guestbook_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('homepage')->nullable(true);
            $table->text('text');
            $table->string('ip');
            $table->string('user_agent');
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
        Schema::dropIfExists('guestbook_entries');
    }
}
