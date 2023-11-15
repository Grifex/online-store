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
        Schema::table('categories', function (Blueprint $table) {
     /*      $table->unsignedBigInteger('parent_id')->nullable();
            $table->index('parent_id','category_category_idx');
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');*/
            $table->string('slug')->unique()->after('name')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {

/*         $table->dropForeign('categories_parent_id_foreign');
            $table->dropIndex('category_category_idx');
            $table->dropColumn('parent_id');*/
            $table->dropColumn('slug');
        });
    }
};
