<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpencesTable extends Migration
{
    public function up()
    {
        Schema::create('expences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', 15, 2);
            $table->string('name');
            $table->longText('description')->nullable();
            $table->date('expense_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}