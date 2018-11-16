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

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Application\Repository;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\CameraController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'camera' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/camera[/:action]',
                    'defaults' => [
                        'controller' => Controller\CameraController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'console' => [
        'router' => [
            'routes' => [
                'search-cameras' => [
                    'type'    => 'simple',
                    // types below
                    'options' => [
                        'route'    => 'search --name=',
                        'defaults' => [
                            'controller' => Controller\CommandLineSearchController::class,
                            'action'     => 'index',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\CameraController::class => Controller\Factory\CameraControllerFactory::class,
            Controller\CommandLineSearchController::class => Controller\Factory\CommandLineSearchControllerFactory::class
        ],
    ],
    'service_manager' => [
        'factories' => [
            Repository\CameraRepository::class => Repository\Factory\CameraRepositoryFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
