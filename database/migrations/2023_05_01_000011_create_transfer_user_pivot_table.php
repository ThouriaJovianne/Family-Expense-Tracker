<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('transfer_user', function (Blueprint $table) {
            $table->unsignedBigInteger('transfer_id');
            $table->foreign('transfer_id', 'transfer_id_fk_8416326')->references('id')->on('transfers')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_8416326')->references('id')->on('users')->onDelete('cascade');
        });
    }
}