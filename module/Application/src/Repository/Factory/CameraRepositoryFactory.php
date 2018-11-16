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

namespace Application\Repository\Factory;

use Application\Exception\EndOfFileException;
use Application\Model\Camera;
use Application\Reader\CsvReader;
use Application\Repository\CameraRepository;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CameraRepositoryFactory implements FactoryInterface
{
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return CameraRepository
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): CameraRepository
    {
        /* @todo to heavy for a factory pattern, perhaps a DataMapper is needed? */
        $cameras = [];
        $reader = new CsvReader('./data/cameras-defb.csv');
        /* Read first line as that is only the header */
        $reader->readLine();

        while (true) {
            /* CSV Format: Camera;Latitude;Longitude */
            try {
                $entry = $reader->readLine();
            } catch (EndOfFileException $e) {
                break;
            }

            /* Source validation */
            if (\count($entry) !== 3) {
                /* Other 3 fields isn't considered valid */
                continue;
            }


            $cameras[] = new Camera($entry[0], (float) $entry[1], (float) $entry[2]);
        }

        return new CameraRepository(...$cameras);
    }
}
