<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfterRoleidToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('role_id_fk')->unsigned()->nullable()->after('password');
                $table->foreign('role_id_fk')->references('id')->on('roles');
            $table->boolean('status')->default('1')->after('role_id_fk');
            $table->datetime('blocked_at')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id_fk');
            $table->dropColumn('status');
            $table->dropColumn('blocked_at');
        });
    }
}
