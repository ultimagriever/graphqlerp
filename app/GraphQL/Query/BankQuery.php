<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Models\Bank;

class BankQuery extends Query
{
    protected $attributes = [
        'name' => 'banks',
        'description' => 'Query to fetch banks'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('banks'));
    }

    public function args()
    {
        return [
          'id' => [
            'type' => Type::string(),
            'description' => 'The Febraban ID of the bank'
          ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
      if (array_key_exists('id', $args)) {
        return Bank::where('id', $args['id'])->get();
      }

      return Bank::all();
    }
}
