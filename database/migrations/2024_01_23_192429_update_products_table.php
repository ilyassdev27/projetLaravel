<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Check if the column already exists before adding it
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->foreignIdFor(\App\Models\Category::class)->nullable()->constrained()->cascadeOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the foreign key only if the column exists
            if (Schema::hasColumn('products', 'category_id')) {
                $table->dropForeign(['category_id']);
            }
        });
    }
}
