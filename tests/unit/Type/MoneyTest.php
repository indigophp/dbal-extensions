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
 * Tests for Money Type
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\DBAL\Type\MoneyType
 */
class MoneyTest extends AbstractTypeTest
{
    /**
     * {@inheritdoc}
     */
    protected $typeName = 'money';

    public function _before()
    {
        parent::_before();

        $this->type->setCurrency('USD');
    }

    /**
     * Creates a new Money
     *
     * @param numeric $value
     *
     * @return Money
     */
    protected function createMoney($value = 1)
    {
        return new Money($value, new Currency($this->type->getCurrency()));
    }

    /**
     * @covers ::convertToDatabaseValue
     */
    public function testMoneyConvertsToDatabaseValue()
    {
        $m = $this->createMoney();

        $this->assertEquals(1, $this->type->convertToDatabaseValue($m, $this->platform));
        $this->assertNull($this->type->convertToDatabaseValue(null, $this->platform));
    }

    /**
     * @covers ::convertToPHPValue
     */
    public function testDatabaseValueConvertsToMoney()
    {
        $m = $this->createMoney();

        $this->assertEquals($m, $this->type->convertToPHPValue('1', $this->platform));
        $this->assertNull($this->type->convertToPHPValue(null, $this->platform));
    }

    /**
     * @covers ::getCurrency
     * @covers ::setCurrency
     */
    public function testCurrency()
    {
        $this->assertSame($this->type, $this->type->setCurrency('EUR'));
        $this->assertEquals('EUR', $this->type->getCurrency());
    }

    /**
     * @covers ::getCurrency
     * @covers ::getDefaultCurrency
     * @covers ::setDefaultCurrency
     */
    public function testDefaultCurrency()
    {
        $this->type->setCurrency(null);
        $this->type->setDefaultCurrency('USD');

        $this->assertEquals('USD', $this->type->getCurrency());

        $this->type->setCurrency(null);
        $this->type->setDefaultCurrency(null);

        $localeconv = localeconv();

        $this->assertEquals($localeconv['int_curr_symbol'], $this->type->getCurrency());
    }
}
