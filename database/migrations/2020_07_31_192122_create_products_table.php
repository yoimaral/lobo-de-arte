<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('name');
            $table->text('description');
            $table->unsignedInteger('price');
            $table->timestamp('disabled_at')->nullable()->default(null);
            $table->timestamps();
        });
    }
    // $table->softDeletes('deleted_at'); Para hacer el Soft delete

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
