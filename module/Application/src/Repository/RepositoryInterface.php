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

namespace Application\Repository;

use Application\Repository\MetaData\MetaDataInterface;

interface RepositoryInterface
{
    /**
     * @return array
     */
    public function findAll(): array;

    /**
     * @param $criteriaOrField
     * @param string|null $value
     * @return array
     */
    public function find($criteriaOrField, string $value = null): array;

    /**
     * @return MetaDataInterface
     */
    public function getMetaData(): MetaDataInterface;

    /**
     * @return string
     */
    public function getModelName(): string;
}
