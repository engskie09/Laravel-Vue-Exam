<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('accounts');
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("name");
            $table->string("description");
            $table->timestamps();
        });

    DB::table('accounts')->insert(
            [
                array(
                    'id' => 1,
                    'user_id' => 1,
                    'name' => 'Account QWE',
                    'description' => "Account Description 1"
                ),

                array(
                    'id' => 2,
                    'user_id' => 1,
                    'name' => 'Account CCC',
                    'description' => "Account Description 2"
                ),

                array(
                    'id' => 3,
                    'user_id' => 1,
                    'name' => 'Account 123',
                    'description' => "Account Description 3"
                )
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
