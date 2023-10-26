<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('tanggal_pengajuan')->nullable();
            $table->timestamp('tanggal_penerimaan')->nullable();
            $table->timestamp('tanggal_persetujuan')->nullable();
            $table->timestamp('tanggal_penolakan')->nullable();
            $table->timestamp('tanggal_pengiriman')->nullable();
            $table->string('nama_pengaju');
            $table->string('lokasi');
            $table->integer('stok');
            $table->enum('status', ['diajukan', 'disetujui', 'ditolak', 'dikirim', 'diterima']);
            $table->unsignedBigInteger('inventory_id');
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('requester_id');
            $table->foreign('requester_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
