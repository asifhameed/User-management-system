<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionsAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions_assigns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('role_id_fk')->unsigned()->nullable(); 
                $table->foreign('role_id_fk')->references('id')->on('roles');
            $table->bigInteger('section_id_fk')->unsigned()->nullable();
                $table->foreign('section_id_fk')->references('id')->on('role_sections');
            $table->string('permission_names')->nullable();
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
        Schema::dropIfExists('role_permissions_assigns');
    }
}
