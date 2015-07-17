<?php

class myClass {
	public $property = 'value';
}

$myArray = [
	'key' => 'value'
];

$classInstance = new myClass();

echo $classInstance->property;

echo $myArray['key'];