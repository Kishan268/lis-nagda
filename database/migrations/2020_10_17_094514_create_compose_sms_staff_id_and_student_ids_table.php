<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComposeSmsStaffIdAndStudentIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compose_sms_staff_id_and_student_ids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('compose_sms_id', 11)->nullable();
            $table->string('reciver_id', 11)->nullable();
            $table->string('reciver_type', 50)->nullable();
            $table->string('status',2)->default(1);
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
        Schema::dropIfExists('compose_sms_staff_id_and_student_ids');
    }
}
