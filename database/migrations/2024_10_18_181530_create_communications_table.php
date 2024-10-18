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
        Schema::create('communications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('api_comunicacao_id');
            $table->date('data_disponibilizacao');
            $table->string('sigla_tribunal');
            $table->string('tipo_comunicacao');
            $table->string('nome_orgao');
            $table->text('texto');
            $table->string('numero_processo');
            $table->string('meio');
            $table->string('link')->nullable();
            $table->string('tipo_documento');
            $table->string('nome_classe');
            $table->string('codigo_classe');
            $table->integer('numero_comunicacao');
            $table->boolean('ativo');
            $table->string('hash');
            $table->string('status');
            $table->string('motivo_cancelamento')->nullable();
            $table->date('data_cancelamento')->nullable();
            $table->date('data_envio');
            $table->string('meiocompleto');
            $table->string('numeroprocessocommascara');
            $table->boolean('notificado_email')->default(false);
            $table->boolean('notificado_whatsapp')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communications');
    }
};
