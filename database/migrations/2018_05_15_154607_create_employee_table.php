<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('employees', function (Blueprint $table) {
      $table->increments('id');

      // Personal Data
      $table->string('fullname');
      $table->enum('gender', ['Masculino', 'Feminino', 'Outro']);
      $table->date('birth_date');
      $table->string('birth_city');
      $table->string('birth_state');
      $table->string('rg')->nullable(false);
      $table->string('rg_issuer')->nullable(false);
      $table->string('rg_issuer_state')->nullable(false);
      $table->string('rg_issuance_date')->nullable(false);
      $table->string('cpf')->nullable(false);
      $table->string('address')->nullable(false);
      $table->string('city')->nullable(false);
      $table->string('state')->nullable(false);
      $table->string('father_name');
      $table->string('mother_name')->nullable(false);
      $table->string('marital_status');

      // Voter info
      $table->string('voter_tit')->nullable(false);
      $table->string('voter_tit_section')->nullable(false);
      $table->string('voter_tit_zone')->nullable(false);
      $table->string('voter_tit_state')->nullable(false);

      // Banking info
      $table->integer('bank_id');
      $table->integer('bank_account_agency');
      $table->integer('bank_account_number');
      $table->integer('bank_account_digit');

      // Employment info
      $table->date('hiring_date');
      $table->decimal('salary', 7, 2);
      $table->date('admission_exam_date');
      $table->boolean('admission_apt_to_work');
      $table->date('exit_exam_date');
      $table->boolean('exit_apt_to_work');

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
    Schema::dropIfExists('employees');
  }
}
