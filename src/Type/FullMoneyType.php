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

use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Money\Currency;
use Money\Money;

/**
 * Full Money Type
 *
 * Uses Fowler's money pattern implemented by Mathias Verraes
 *
 * NOTE: this type uses string as base with the currency stored in it.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class FullMoneyType extends StringType
{
    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
         return (string) $value->getCurrency() . ' '. $value->getAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        list($currency, $amount) = explode(' ', $value, 2);

        return new Money((int) $amount, new Currency($currency));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'fullmoney';
    }
}
