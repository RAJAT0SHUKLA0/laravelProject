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
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id();
           $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->string('name')->nullable();
            $table->text('image')->nullable();
            $table->tinyinteger('status')->default(0);
            $table->string('meta_title');
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->tinyinteger('is_delete')->default(0);
            $table->string('slug')->nullable();
           $table->longText('description')->nullable();
           $table->timestamps();  
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product');
    }
};
