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
    {
        Schema::create('borrow_records', function (Blueprint $table) {
            $table->id();
            $table->integer('uid')->comment('user id');
            $table->integer('bid')->comment('book id');
            $table->boolean('is_returned')->default(false);
            $table->timestamp('borrow_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('return_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_records');
    }
};
