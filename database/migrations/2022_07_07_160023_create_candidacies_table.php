<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidacies', function (Blueprint $table) {
            $table->id();
            /* identity */
            $table->string('province_id');
            $table->string('county');
            $table->string('bi');
            $table->string('fullname');
            $table->date('birthdate');
            $table->string('residence');
            $table->string('tel', 14);
            $table->string('qualification');
            $table->string('email');
            $table->string('iban');
            $table->longText('hph')->nullable();

            /* docs */
            $table->string('doc_qualification');
            $table->string('doc_iban');
            $table->string('photo');

            $table->string('status')->default('AGUARDA AVALIAÇÃO');

            $table->string('status_exam');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidacies');
    }
}
