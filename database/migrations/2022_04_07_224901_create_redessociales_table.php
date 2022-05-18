<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedessocialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redessociales', function (Blueprint $table) {
            $table->id();
            $table->foreignId("contacto_id")->references("id")->on("contactos");
            $table->foreignId("tipored_id")->references("id")->on("tiposredes");
            $table->string("url", 50);
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
        Schema::dropIfExists('redessociales');
    }
}
