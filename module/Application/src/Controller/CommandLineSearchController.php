<?php
/**
 * Camera
 *
 * PHP Version 7.0
 *
 * @link      https://github.com/jansloot/camera
 * @copyright Copyright (c) 2018
 * @license   GNU General Public License v2.0
 */

declare(strict_types=1);

namespace Application\Controller;

use Application\Model\Camera;
use Application\Repository\Criteria\ContainsCriteria;
use Application\Repository\RepositoryInterface;
use RuntimeException;
use Zend\Mvc\Console\Controller\AbstractConsoleController;
use Zend\Console\Request as ConsoleRequest;

class CommandLineSearchController extends AbstractConsoleController
{
    /** @var RepositoryInterface */
    private $repository;

    /**
     * CommandLineSearchController constructor.
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return void
     */
    public function indexAction()
    {
        $request = $this->getRequest();

        // Make sure that we are running in a console and the user has not tricked our
        // application into running this action from a public web server.
        if (! $request instanceof ConsoleRequest) {
            throw new RuntimeException('You can only use this action from a console!');
        }

        $term = $request->getParam('name');

        $cameras = $this->repository->find(new ContainsCriteria('name', $term));

        /** @var Camera $camera */
        foreach ($cameras as $camera) {
            $this->getConsole()
                ->writeLine(sprintf(
                    '%d | %s | %s | %s',
                    $camera->getNumber(),
                    $camera->getName(),
                    $camera->getLatitude(),
                    $camera->getLongitude()
                ));
        }
        $this->getConsole()->writeLine();
    }
}
