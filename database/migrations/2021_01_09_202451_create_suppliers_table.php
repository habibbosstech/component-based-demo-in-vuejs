<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name',100)->unique();
            $table->string('supplier_email',70)->unique();
            $table->string('password')->nullable();
            $table->string('company_name',70)->nullable();
            $table->string('website',100)->nullable();
            $table->string('supplier_phone',20)->nullable();
            $table->tinyInteger('is_active')->default('0');
            $table->tinyInteger('is_deleted')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
