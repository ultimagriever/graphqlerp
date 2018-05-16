<?php
/**
 * Created by PhpStorm.
 * User: cognizant
 * Date: 15/05/18
 * Time: 12:45
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model {
  protected $fillable = [
    'fullname',
    'birth_date',
    'gender',
    'birth_city',
    'birth_state',
    'rg',
    'rg_issuer',
    'rg_issuer_state',
    'rg_issuance_date',
    'cpf',
    'address',
    'city',
    'state',
    'father_name',
    'mother_name',
    'marital_status',
    'voter_tit',
    'voter_tit_section',
    'voter_tit_zone',
    'voter_tit_state',
    'bank_id',
    'bank_account_agency',
    'bank_account_number',
    'bank_account_digit',
    'hiring_date',
    'salary',
    'admission_exam_date',
    'admission_apt_to_work',
    'exit_exam_date',
    'exit_apt_to_work'
  ];

  public function bank() {
    return $this->hasOne(Bank::class);
  }
}
