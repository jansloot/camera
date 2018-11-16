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

class ExactMatchCriteria implements CriteriaInterface
{
    /** @var string */
    private $field;

    /** @var string */
    private $match;

    /**
     * ExactMatchCriteria constructor.
     * @param string $field
     * @param string $match
     */
    public function __construct(string $field, string $match)
    {
        $this->field = $field;
        $this->match = $match;
    }

    /**
     * @param RepositoryInterface $repository
     * @return array
     */
    public function visit(RepositoryInterface $repository): array
    {
        $models = $repository->findAll();
        $metaData = $repository->getMetaData();

        if (! $metaData->hasField($this->field)) {
            throw new \BadMethodCallException($repository->getModelName() . ' has not field ' . $this->field);
        }

        /* @todo validate public getter availability */

        $matches = [];
        foreach ($models as $model) {
            $method = 'get' . ucfirst($this->field);
            $value = $model->$method();

            if ($value !== $this->match) {
                continue;
            }


            $matches[] = $model;
        }

        return $matches;
    }
}
