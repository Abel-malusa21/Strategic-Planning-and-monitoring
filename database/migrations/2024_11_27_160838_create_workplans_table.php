<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_workplans_table.php
public function up()
{
    Schema::create('workplans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('objective_id')->constrained()->onDelete('cascade');
        $table->string('department');
        $table->string('activity');
        $table->string('quarter'); // Q1, Q2, Q3, Q4
        $table->date('due_date');
        $table->decimal('budget', 10, 2)->nullable();
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('workplans');
    }

};
