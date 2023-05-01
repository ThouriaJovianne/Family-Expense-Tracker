<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenuesTable extends Migration
{
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_of_source')->nullable();
            $table->decimal('amount', 15, 2);
            $table->date('date_of_receipt');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}