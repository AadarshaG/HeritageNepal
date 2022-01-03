<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullbale();
            $table->string('company_name');
            $table->string('company_address');
            $table->string('phone_number');
            $table->string('landline_number')->nullbale();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealer_profiles', function(Blueprint $table){
            $table->dropForeign('dealer_profiles_user_id_foreign');
        });
        Schema::dropIfExists('dealer_profiles');
    }
}
