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

namespace Application\Repository\Criteria;

use Application\Repository\RepositoryInterface;

interface CriteriaInterface
{
    /**
     * @param RepositoryInterface $repository
     * @return array
     */
    public function visit(RepositoryInterface $repository): array;
}
