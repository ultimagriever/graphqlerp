<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class BankType extends BaseType
{
  protected $attributes = [
      'name' => 'banks',
      'description' => 'GraphQL type representing the Bank model'
  ];

  public function fields()
  {
      return [
        'id' => [
          'type' => Type::string(),
          'description' => 'The bank\'s ID in Febraban\'s database'
        ],
        'name' => [
          'type' => Type::string(),
          'description' => 'The bank\'s name'
        ]
      ];
  }

  public function resolveIdField($root, $args)
  {
    return str_pad((string) $root->id, 3, "0");
  }
}
