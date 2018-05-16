<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Models\Employee;

class CreateOrUpdateEmployeeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createEmployee',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('employees');
    }

    public function args()
    {
        return [
          'id' => [
            'type' => Type::int(),
            'description' => 'ID of the employee. Provide this if updating the user info.'
          ],
          'fullname' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The employee\'s full name'
          ],
          'birth_date' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The day the employee was born'
          ],
          'gender' => [
            'type' => Type::string(),
            'description' => 'The employee\'s self-declared gender'
          ],
          'birth_city' => [
            'type' => Type::string(),
            'description' => 'The employee\'s birthplace'
          ],
          'birth_state' => [
            'type' => Type::string(),
            'description' => 'The state where the employee was born'
          ],
          'rg' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The employee\'s identification number'
          ],
          'rg_issuer' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The entity who issued the identification'
          ],
          'rg_issuer_state' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The state where the identification was issued'
          ],
          'rg_issuance_date' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The day the identification was issued according to the document'
          ],
          'cpf' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The employee\'s taxpayer ID'
          ],
          'address' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The employee\'s address'
          ],
          'city' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The city where the employee lives'
          ],
          'state' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The state where the employee lives'
          ],
          'father_name' => [
            'type' => Type::string(),
            'description' => 'The employee\'s father\'s name'
          ],
          'mother_name' => [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The employee\'s mother\'s name'
          ],
          'marital_status' => [
            'type' => Type::string(),
            'description' => 'The marital status of the employee'
          ],
          'voter_tit'=> [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The employee\'s voter ID'
          ],
          'voter_tit_section'=> [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The voter ID\'s section'
          ],
          'voter_tit_zone'=> [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The voter ID\'s zone'
          ],
          'voter_tit_state'=> [
            'type' => Type::nonNull(Type::string()),
            'description' => 'The  voter ID\'s state'
          ],
          'bank_id' => [
            'type' => Type::int(),
            'description' => 'The bank where the employee has a checking account'
          ],
          'bank_account_agency' => [
            'type' => Type::int(),
            'description' => 'The agency where the employee has a checking account'
          ],
          'bank_account_number' => [
            'type' => Type::int(),
            'description' => 'The employee\'s checking account number'
          ],
          'bank_account_digit' => [
            'type' => Type::int(),
            'description' => 'The checking account verifying digit'
          ],
          'hiring_date' => [
            'type' => Type::string(),
            'description' => 'The day the employee was hired'
          ],
          'salary' => [
            'type' => Type::float(),
            'description' => 'The employee\'s salary'
          ],
          'admission_exam_date' => [
            'type' => Type::string(),
            'description' => 'The day the employee took the admission medical exam'
          ],
          'admission_apt_to_work' => [
            'type' => Type::boolean(),
            'description' => 'Whether the employee is apt to work upon being hired'
          ],
          'exit_exam_date' => [
            'type' => Type::string(),
            'description' => 'The day the employee took the exit medical exam'
          ],
          'exit_apt_to_work' => [
            'type' => Type::boolean(),
            'description' => 'Whether the employee is apt to work upon leaving the company'
          ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
      if (array_key_exists('id', $args)) {
        $id = $args['id'];
        unset($args['id']);

        Employee::where('id', $args['id'])->update($args);

        return Employee::find($id);
      }
      return Employee::create($args);
    }
}
