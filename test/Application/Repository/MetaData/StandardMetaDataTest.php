<?php
/**
 * Simulation
 *
 * PHP Version 5.5
 *
 * @link      https://github.com/DannyvdSluijs/Simulation/
 * @copyright Copyright (c) 2016-2018
 * @license
 */

namespace Application\Test\Repository\MetaData;

use Application\Repository\MetaData\StandardMetaData;
use PHPUnit\Framework\TestCase;

class StandardMetaDataTest extends TestCase
{
    /** @var StandardMetaData */
    private $object;

    protected function setUp()
    {
        $this->object = new StandardMetaData('name', 'latitude', 'longitude');
    }

    public function test__construct()
    {
        $this->assertAttributeSame(['name', 'latitude', 'longitude'], 'fields', $this->object);
    }

    public function testGetFields()
    {
        $this->assertSame(['name', 'latitude', 'longitude'], $this->object->getFields());
    }

    public function testHasField()
    {
        $this->assertTrue($this->object->hasField('name'));
        $this->assertTrue($this->object->hasField('latitude'));
        $this->assertTrue($this->object->hasField('longitude'));

        $this->assertFalse($this->object->hasField('public'));
    }
}
