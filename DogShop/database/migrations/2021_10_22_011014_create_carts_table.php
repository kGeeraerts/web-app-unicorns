<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('session_id')->nullable();
            $table->timestamps();

            $table->foreign('session_id')
                ->references('id')
                ->on('sessions')
                ->onDelete('cascade');
        });


        Schema::create('cartables', function (Blueprint $table) {
            $table->foreignId('cart_id')->constrained()->onDelete('cascade');
            $table->morphs('cartable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('cartable');
        Schema::dropIfExists('carts');
    }
}
