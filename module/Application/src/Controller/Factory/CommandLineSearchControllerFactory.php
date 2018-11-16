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

namespace Application\Controller\Factory;

use Application\Controller\CommandLineSearchController;
use Application\Repository\CameraRepository;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CommandLineSearchControllerFactory implements FactoryInterface
{
    /**
     * Create the command line search controller
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return CommandLineSearchController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): CommandLineSearchController
    {
        /** @var CameraRepository $repository */
        $repository = $container->get(CameraRepository::class);

        return new CommandLineSearchController($repository);
    }
}
