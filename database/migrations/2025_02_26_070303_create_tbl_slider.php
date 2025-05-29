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
        Schema::create('tbl_slider', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('OfferTitle');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->text('image');
            $table->tinyinteger('is_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_slider');
    }
};
