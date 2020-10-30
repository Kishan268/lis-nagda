<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesMastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_masts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fees_name',150)->nullable();
            $table->decimal('amount',9,2)->nullable();
            $table->integer('reciept_head_mast_id')->nullable();
            $table->integer('currency')->nullable();
            $table->integer('payment_mode')->nullable();
            $table->integer('course_type')->nullable();
            $table->decimal('online_payment_discount',9,2)->nullable();
            $table->boolean('fees_refund')->default(1);
            $table->boolean('fees_student_assign')->default(1);
            $table->decimal('due_fees',9,2)->nullable();
            $table->string('gender',2)->nullable();
            $table->integer('cast_category')->nullable();
            $table->integer('rte_status')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('batch_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('fees_for')->nullable();
            $table->integer('class_batch_section')->nullable();
            $table->string('status',1)->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('fees_masts');
    }
}
