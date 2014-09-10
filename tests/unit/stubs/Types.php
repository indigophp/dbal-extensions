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
 * Dummy Enum Type
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class DummyEnumType extends AbstractEnumType
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'enumdummy';

    /**
     * {@inheritdoc}
     */
    protected $values = array(
        'TRUE',
        'FALSE',
    );
}

Type::addType('enumdummy', 'Indigo\\DBAL\\Type\\DummyEnumType');
