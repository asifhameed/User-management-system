<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('tag_action')->nullable();
            $table->string('display_name')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('section_id_fk')->unsigned()->nullable();
                $table->foreign('section_id_fk')->references('id')->on('role_sections');
            $table->boolean('status')->default('1');
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
        Schema::dropIfExists('role_permissions');
    }
}
