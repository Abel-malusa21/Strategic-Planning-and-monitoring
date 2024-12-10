<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('scorecards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workplan_id')->constrained()->onDelete('cascade');
            $table->string('activity_name');

            // Quarterly Progress Fields
            $table->integer('progress_q1')->default(0); // Q1 Progress in percentage
            $table->integer('progress_q2')->default(0); // Q2 Progress in percentage
            $table->integer('progress_q3')->default(0); // Q3 Progress in percentage
            $table->integer('progress_q4')->default(0); // Q4 Progress in percentage

            $table->decimal('budgeted_amount', 10, 2);
            $table->decimal('actual_spent', 10, 2)->nullable();

            // Source of Funds
            $table->string('source_of_funds');

            // Comments/Assumptions
            $table->text('comments')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('scorecards');
    }
};
