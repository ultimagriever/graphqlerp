<?php

namespace App\GraphQL\Query;

use App\Models\Employee;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class EmployeeQuery extends Query
{
    protected $attributes = [
        'name' => 'employees',
        'description' => 'Query to fetch employees'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('employees'));
    }

    public function args()
    {
        return [
          'id' => [
            'type' => Type::int(),
            'description' => 'ID of the employee'
          ],
          'rg' => [
            'type' => Type::string(),
            'description' => 'Employee personal identification'
          ],
          'cpf' => [
            'type' => Type::string(),
            'description' => 'Employee taxpayer identification'
          ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (array_key_exists('id', $args)) {
          return Employee::where(['id' => $args['id']])->get();
        }

        if (array_key_exists('rg', $args)) {
          return Employee::where(['rg' => $args['rg']])->get();
        }

        if (array_key_exists('cpf', $args)) {
          return Employee::where(['cpf' => $args['cpf']])->get();
        }

        return Employee::all();
    }
}
