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
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->text('description');
      $table->string('image')->nullable();
      $table->decimal('price', 8, 2);
      $table->integer('stock');
      $table->timestamps(); // Incluye created_at y updated_at
    });
  }


  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    //
  }
};
