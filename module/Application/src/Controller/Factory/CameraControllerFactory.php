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

use Application\Controller\CameraController;
use Application\Repository\CameraRepository;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CameraControllerFactory implements FactoryInterface
{
    /**
     * Create the camera controller
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return CameraController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): CameraController
    {
        /** @var CameraRepository $repository */
        $repository = $container->get(CameraRepository::class);

        return new CameraController($repository);
    }
}
