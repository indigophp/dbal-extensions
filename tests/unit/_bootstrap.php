<?php
// Here you can initialize variables that will be available to your tests

use Doctrine\DBAL\Types\Type;

require_once __DIR__.'/stubs/Types.php';

Type::addType('money', 'Indigo\\DBAL\\Type\\MoneyType');
Type::addType('fullmoney', 'Indigo\\DBAL\\Type\\FullMoneyType');
