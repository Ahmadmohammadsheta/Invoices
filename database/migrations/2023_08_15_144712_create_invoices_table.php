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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number', 50);
            $table->enum('invoice_type', [1, 2, 3, 4]);
            $table->date('invoice_date')->nullable();
            $table->date('due_date')->nullable();
            // $table->date('payment_date')->nullable();
            $table->bigInteger('trader_id')->nullable();
            $table->foreign('trader_id')->references('id')->on('traders')->onDelete('cascade');
            $table->bigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->bigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            // $table->bigInteger('section_id')->unsigned();
            // $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->decimal('amount_collection', 8, 2)->nullable();;
            $table->decimal('amount_commission', 8, 2);
            $table->decimal('discount', 8, 2);
            $table->decimal('value_vat', 8, 2);
            $table->string('rate_vat', 999);
            $table->decimal('total', 8, 2);
            $table->tinyInteger('status')->default(0);
            $table->text('note')->nullable();
            $table->date('expire_date')->nullable();
            $table->unsignedBigInteger('created_by', 999);
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restricted');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
