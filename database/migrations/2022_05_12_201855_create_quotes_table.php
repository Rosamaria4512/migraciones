<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->time('hora_programa');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->time('tiempo_total');
            $table->float('total_pago',9,2);
            $table->unsignedBigInteger('employee_id');
            $table->foreign("employee_id")->references("id")->on("employee")
            ->onUpdate("cascade")->onDelete("cascade");

            $table->unsignedBigInteger('forma_pago_id');
            $table->foreign("forma_pago_id")->references("id")->on("forma_pago")
            ->onUpdate("cascade")->onDelete("cascade");
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
        Schema::dropIfExists('quotes');
    }
}
