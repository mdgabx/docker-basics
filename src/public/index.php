<?php

require_once __DIR__ . '/../vendor/autoload.php';


$fields = [
    new \App\Fields\Text('textField'),
    new \App\Fields\Checkbox('checkboxField'),
    new \App\Fields\Radio('radioField'),
];


foreach($fields as $field) 
{
    echo $field->render() . '<br />';
}