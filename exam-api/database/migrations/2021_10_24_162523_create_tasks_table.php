<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("account_id");
            $table->integer("points");
            $table->integer("status");
            $table->timestamps();
        });

        DB::table('tasks')->insert([
            array(
                'user_id' => 1,
                'account_id' => 1,
                'points' => 15,
                'status' => 0,
            ),

            array(
                'user_id' => 1,
                'account_id' => 1,
                'points' => 10,
                'status' => 1,
            ),

            array(
                'user_id' => 1,
                'account_id' => 1,
                'points' => 20,
                'status' => 0,
            ),

            array(
                'user_id' => 1,
                'account_id' => 2,
                'points' => 30,
                'status' => 1,
            ),

            array(
                'user_id' => 1,
                'account_id' => 2,
                'points' => 15,
                'status' => 0,
            ),

            array(
                'user_id' => 1,
                'account_id' => 3,
                'points' => 10,
                'status' => 0,
            ),

            array(
                'user_id' => 1,
                'account_id' => 3,
                'points' => 5,
                'status' => 0,
            ),

            array(
                'user_id' => 1,
                'account_id' => 3,
                'points' => 5,
                'status' => 1,
            ),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
