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

use Zend\Console\Adapter\AdapterInterface;
use Zend\ModuleManager\Feature\ConsoleBannerProviderInterface;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;

class Module implements ConsoleBannerProviderInterface, ConsoleUsageProviderInterface
{
    const VERSION = '1.0.0';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * @param AdapterInterface $console
     * @return string|null
     */
    public function getConsoleBanner(AdapterInterface $console)
    {
        return 'Camera v' . self::VERSION;
    }

    /**
     * @param AdapterInterface $console
     * @return array|string|null
     */
    public function getConsoleUsage(AdapterInterface $console)
    {
        return [
            'search --name=' => 'Search for cameras'
        ];
    }
}
