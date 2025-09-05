<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Proyecto;
use App\Models\User;

class CreateProyectosUserTable extends Migration
{
    public function up()
    {
        Schema::create('proyectos_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('proyecto_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->unique(['user_id', 'proyecto_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyectos_user');
    }
}
