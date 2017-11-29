<?php

$config = [
  'add_product_rules' => [
            [
                'field' => 'pname',
                'label' => 'Product Name',
                'rules' => 'required'
            ],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ]
      ],
    
    'add_users_rules' => [
            [
                'field'=>'firstname',
                'label'=>'Firstname',
                'rules'=>'required'
            ],
            [
                'field'=>'lastname',
                'label'=>'Lastname',
                'rules'=>'required'
            ],
            [
                'field'=>'username',
                'label'=>'Username',
                'rules'=>'required'
            ],
            [
                'field'=>'password',
                'label'=>'Password',
                'rules'=>'required'
            ],
            [
                'field'=>'c_password',
                'label'=>'Confirm Password',
                'rules'=>'required'
            ]
            
    ]
];