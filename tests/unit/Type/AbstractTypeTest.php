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
use Codeception\TestCase\Test;

/**
 * Tests for Types
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @group Dbal
 */
abstract class AbstractTypeTest extends Test
{
    /**
     * Platform mock
     *
     * @var Doctrine\DBAL\Platforms\AbstractPlatform
     */
    protected $platform;

    /**
     * Type
     *
     * @var Doctrine\DBAL\Types\Type
     */
    protected $type;

    /**
     * Type name
     *
     * @var string
     */
    protected $typeName = '';

    public function _before()
    {
        $this->platform = \Mockery::mock('Doctrine\\DBAL\\Platforms\\AbstractPlatform');
        $this->type = Type::getType($this->typeName);
    }

    /**
     * @covers ::getName
     */
    public function testName()
    {
        $this->assertEquals($this->typeName, $this->type->getName());
    }
}
