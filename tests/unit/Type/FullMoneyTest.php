<?php

/*
 * This file is part of the Indigo DBAL Extensions package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\DBAL\Type;

use Money\Money;
use Money\Currency;
use Doctrine\DBAL\Types\Type;

/**
 * Tests for Full Money Type
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\DBAL\Type\FullMoneyType
 */
class FullMoneyTest extends AbstractTypeTest
{
    /**
     * {@inheritdoc}
     */
    protected $typeName = 'fullmoney';

    /**
     * Creates a new Money
     *
     * @param numeric $value
     *
     * @return Money
     */
    protected function createMoney($value = 1, $currency = 'USD')
    {
        return new Money($value, new Currency($currency));
    }

    /**
     * @covers ::convertToDatabaseValue
     */
    public function testMoneyConvertsToDatabaseValue()
    {
        $m = $this->createMoney();

        $this->assertEquals('USD 1', $this->type->convertToDatabaseValue($m, $this->platform));
    }

    /**
     * @covers ::convertToPHPValue
     */
    public function testDatabaseValueConvertsToMoney()
    {
        $m = $this->createMoney();

        $this->assertEquals($m, $this->type->convertToPHPValue('USD 1', $this->platform));
    }
}
