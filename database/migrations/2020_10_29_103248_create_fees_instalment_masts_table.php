<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesInstalmentMastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_instalment_masts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('st_date')->nullable();
            $table->date('ed_date')->nullable();
            $table->decimal('amount',9,2)->nullable();
            $table->integer('fees_mast_id')->nullable();
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
        Schema::dropIfExists('fees_instalment_masts');
    }
}
