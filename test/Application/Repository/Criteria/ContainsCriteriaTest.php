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

namespace Application\Test\Repository\Criteria;

use Application\Model\Camera;
use Application\Repository\CameraRepository;
use Application\Repository\Criteria\ContainsCriteria;
use Application\Repository\RepositoryInterface;
use PHPUnit\Framework\TestCase;

class ContainsCriteriaTest extends TestCase
{
    /** @var ContainsCriteria */
    private $object;

    protected function setUp()
    {
        $this->object = new ContainsCriteria('name', 'UTR-CM-501');
    }

    public function testConstruct()
    {
        $this->assertAttributeSame('name', 'field', $this->object);
        $this->assertAttributeSame('UTR-CM-501', 'match', $this->object);
    }

    public function testVisit()
    {
        $camera501 = new Camera('UTR-CM-501 Neude rijbaan voor Postkantoor', 52.093421, 5.118278);
        $camera503 = new Camera('UTR-CM-503 Neude plein', 52.093448, 5.118536);
        $repository = new CameraRepository($camera501, $camera503);

        $result = $this->object->visit($repository);

        $this->assertSame([$camera501], $result);

    }
}
