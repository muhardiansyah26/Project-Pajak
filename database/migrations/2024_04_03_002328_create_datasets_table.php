<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->id();
            $table->string('nop_sppt');
            $table->string('nm_wp_sppt');
            $table->string('jalan_op');
            $table->string('jln_wp_sppt');
            $table->string('nm_kelurahan');
            $table->string('nm_kecamatan');
            $table->string('thn_pajak_sppt');
            $table->string('nilai_sppt');
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
        Schema::dropIfExists('datasets');
    }
};
