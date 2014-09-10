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

use Doctrine\DBAL\Types\Type;

/**
 * Tests for Enum Type
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\DBAL\Type\AbstractEnumType
 */
class EnumTest extends AbstractTypeTest
{
    /**
     * {@inheritdoc}
     */
    protected $typeName = 'enumdummy';

    /**
     * @covers ::convertToDatabaseValue
     */
    public function testEnumConvertsToDatabaseValue()
    {
        $this->assertEquals('TRUE', $this->type->convertToDatabaseValue('TRUE', $this->platform));
    }

    /**
     * @covers            ::convertToDatabaseValue
     * @expectedException InvalidArgumentException
     */
    public function testConversionFailure()
    {
        $this->type->convertToDatabaseValue('NULL', $this->platform);
    }

    /**
     * @covers ::getSqlDeclaration
     * @covers ::escapeValue
     */
    public function testSqlDeclaration()
    {
        $expected = "ENUM('TRUE', 'FALSE') COMMENT '(DC2Type:enumdummy)'";

        $this->assertEquals($expected, $this->type->getSqlDeclaration([], $this->platform));
    }

    /**
     * @covers ::getValues
     */
    public function testValues()
    {
        $this->assertEquals(['TRUE', 'FALSE'], $this->type->getValues());
    }
}
