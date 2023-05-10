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
        Schema::create('cidade', function (Blueprint $table) {
            $table->increments('id');
            		$table->string('cep', 255);
            		$table->string('logradouro', 255)->nullable();
                    $table->string('complemento', 255)->nullable();
                    $table->string('localidade', 255)->nullable();
                    $table->string('uf', 255)->nullable();
                    $table->string('ibge', 255)->nullable();
                    $table->string('gia', 255)->nullable();
                    $table->string('ddd', 255)->nullable();
                    $table->string('siafi', 255)->nullable();
            		$table->timestamps();
        	});
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cidade');
    }
};
