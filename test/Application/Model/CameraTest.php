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

namespace Application\Test\Model;

use Application\Model\Camera;
use PHPUnit\Framework\TestCase;

class CameraTest extends TestCase
{
    /** @var Camera */
    private $object;

    protected function setUp()
    {
        $this->object = new Camera('UTR-CM-501 Neude rijbaan voor Postkantoor', 52.093421, 5.118278);
    }

    public function testGetNumber()
    {
        $this->assertSame(501, $this->object->getNumber());
    }

    public function testGetName()
    {
        $this->assertSame('UTR-CM-501 Neude rijbaan voor Postkantoor', $this->object->getName());
    }

    public function testToArray()
    {
        $this->assertSame(
            [
                'name' => 'UTR-CM-501 Neude rijbaan voor Postkantoor',
                'latitude' => 52.093421,
                'longitude' => 5.118278,
                'number' => 501
            ],
            $this->object->toArray()

        );
    }

    public function test__construct()
    {
        $this->assertAttributeSame('UTR-CM-501 Neude rijbaan voor Postkantoor', 'name', $this->object);
        $this->assertAttributeSame(52.093421, 'latitude', $this->object);
        $this->assertAttributeSame(5.118278, 'longitude', $this->object);
    }

    public function testGetLatitude()
    {
        $this->assertSame(52.093421, $this->object->getLatitude());
    }

    public function testGetLongitude()
    {
        $this->assertSame(5.118278, $this->object->getLongitude());
    }

    public function testJsonSerialize()
    {
        $this->assertSame($this->object->toArray(), $this->object->jsonSerialize());
    }
}
