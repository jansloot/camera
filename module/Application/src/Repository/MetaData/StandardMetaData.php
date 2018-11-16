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

namespace Application\Repository\MetaData;

class StandardMetaData implements MetaDataInterface
{
    /** @var string[] */
    private $fields;

    /**
     * StandardMetaData constructor.
     * @param string ...$fields
     */
    public function __construct(string ...$fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param string $fieldName
     * @return bool
     */
    public function hasField(string $fieldName): bool
    {
        return \in_array($fieldName, $this->fields);
    }
}
