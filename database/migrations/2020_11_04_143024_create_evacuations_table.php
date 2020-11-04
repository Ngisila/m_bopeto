<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvacuationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evacuations', function (Blueprint $table) {
            $table->id();
            $table->boolean('confirmation')->default(0);
            $table->string('observation');
            $table->foreignId('abonne_id')->constrained('abonnes');
            $table->foreignId('frequen_id')->constrained('frequences');
            $table->foreignId('type_ev_id')->constrained('type_evacuations');
            $table->foreignId('agent_id')->constrained('agents');
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
        Schema::dropIfExists('evacuations');
    }
}
