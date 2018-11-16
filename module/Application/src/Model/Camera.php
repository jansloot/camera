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

namespace Application\Model;

use JsonSerializable;

class Camera implements JsonSerializable
{
    /** @var string */
    private $name;

    /** @var float */
    private $latitude;

    /** @var float */
    private $longitude;

    /**
     * Camera constructor.
     * @param string $name
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(string $name, float $latitude, float $longitude)
    {
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            /* Derived params */
            'number' => $this->getNumber(),
        ];
    }

    /**
     * Get the camera number
     *
     * The camera number is part of the name. Name seems to be constructed as UTR-CM-{id}-{description}
     * @return int
     */
    public function getNumber(): int
    {
        list(, , $id) = explode('-', $this->name);

        return (int) $id;
    }


    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
