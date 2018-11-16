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

use Application\Model\Camera;
use Application\Repository\Criteria\CriteriaInterface;
use Application\Repository\Criteria\ExactMatchCriteria;
use Application\Repository\MetaData\MetaDataInterface;
use Application\Repository\MetaData\StandardMetaData;

class CameraRepository implements RepositoryInterface
{
    /** @var Camera[] */
    private $cameras;

    /** @var MetaDataInterface */
    private $metaData;

    /**
     * CameraRepository constructor.
     * @param Camera ...$cameras
     */
    public function __construct(Camera ...$cameras)
    {
        $this->cameras = $cameras;
        $this->metaData = new StandardMetaData('name', 'latitude', 'longitude');
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->cameras;
    }

    /**
     * @param CriteriaInterface|string $criteriaOrField
     * @param string|null $value
     * @return array
     */
    public function find($criteriaOrField, string $value = null): array
    {
        if (\is_string($criteriaOrField)) {
            if ($value === null) {
                throw new \BadMethodCallException(__CLASS__ . '::' . __METHOD__ . ' supports (string, string) or (Criteria) as method input');
            }
            $criteriaOrField = new ExactMatchCriteria($criteriaOrField, $value);
        }

        if (! $criteriaOrField instanceof CriteriaInterface) {
            throw new \BadMethodCallException(__CLASS__ . '::' . __METHOD__ . ' supports (string, string) or (Criteria) as method input');
        }

        return $criteriaOrField->visit($this);
    }

    /**
     * @return MetaDataInterface
     */
    public function getMetaData(): MetaDataInterface
    {
        return $this->metaData;
    }

    /**
     * @return string
     */
    public function getModelName(): string
    {
        return Camera::class;
    }
}
