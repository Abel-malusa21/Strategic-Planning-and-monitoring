<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_reports_table.php
public function up()
{
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->string('department');
        $table->text('summary'); // Summary of activities and progress
        $table->enum('type', ['weekly', 'monthly', 'quarterly', 'annually']);
        $table->date('report_date');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('reports');
}

};
