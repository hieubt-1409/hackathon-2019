<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSessionIdOnSessionMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('session_messages', function (Blueprint $table) {
            $table->renameColumn('session_id', 'session_bid_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('session_messages', function (Blueprint $table) {
            $table->renameColumn('session_bid_id', 'session_id');
        });
    }
}
