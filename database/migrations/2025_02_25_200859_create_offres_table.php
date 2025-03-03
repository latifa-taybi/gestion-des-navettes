<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->string("description");
            $table->string("ville_depart");
            $table->string("ville_arrivee");
            $table->date("date_depart");
            $table->date("date_arrivee");
            $table->integer("place_dispo");
            $table->decimal("prix");
            $table->foreignId("societe_id")->constrained("societe");
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('offres',function(Blueprint $table){
            $table->dropForeign("societe_id");
        });
        Schema::dropIfExists('offres');
    }
};
