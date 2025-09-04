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
        Schema::table('orders', function (Blueprint $table) {
            // Add customer information fields
            $table->string('customer_name')->nullable()->after('user_id');
            $table->string('customer_email')->nullable()->after('customer_name');
            $table->string('customer_phone')->nullable()->after('customer_email');
            
            // Add shipping information fields
            $table->string('shipping_address')->nullable()->after('customer_phone');
            $table->string('shipping_city')->nullable()->after('shipping_address');
            $table->string('shipping_state')->nullable()->after('shipping_city');
            $table->string('shipping_zip_code')->nullable()->after('shipping_state');
            $table->string('shipping_country')->nullable()->after('shipping_zip_code');
            
            // Add payment status field
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending')->after('status');
            
            // Rename total to total_amount for consistency
            $table->renameColumn('total', 'total_amount');
            
            // Add discount_amount field
            $table->decimal('discount_amount', 10, 2)->default(0)->after('discount');
            
            // Add tax_amount field for consistency
            $table->renameColumn('tax', 'tax_amount');
            
            // Add shipping_amount field for consistency
            $table->renameColumn('shipping_cost', 'shipping_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Remove customer information fields
            $table->dropColumn([
                'customer_name', 'customer_email', 'customer_phone',
                'shipping_address', 'shipping_city', 'shipping_state', 'shipping_zip_code', 'shipping_country'
            ]);
            
            // Remove payment status field
            $table->dropColumn('payment_status');
            
            // Rename total_amount back to total
            $table->renameColumn('total_amount', 'total');
            
            // Remove discount_amount field
            $table->dropColumn('discount_amount');
            
            // Rename tax_amount back to tax
            $table->renameColumn('tax_amount', 'tax');
            
            // Rename shipping_amount back to shipping_cost
            $table->renameColumn('shipping_amount', 'shipping_cost');
        });
    }
};
