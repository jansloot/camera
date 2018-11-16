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

namespace Application\Reader;

use Application\Exception\EndOfFileException;
use RuntimeException;

class CsvReader
{
    /** @var string */
    private $filename;

    /** @var resource|null */
    private $resource;

    /**
     * CsvReader constructor.
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    /**
     * Read a single line from the file
     * @return array
     * @throws EndOfFileException when the end of file is detected
     */
    public function readLine(): array
    {
        if ($this->resource === null) {
            $this->openFile();
        }

        $data = fgetcsv($this->resource, 0, ';');

        if ($data === false) {
            throw new EndOfFileException('End of file was reached');
        }

        return $data ?: [];
    }

    /**
     * Open the file
     * @throws RuntimeException when the file could not be opened
     */
    private function openFile()
    {
        $resource = fopen($this->filename, 'r');

        if ($resource === false) {
            throw new RuntimeException('Unable to open file ' . $this->filename);
        }

        $this->resource = $resource;
    }

    /**
     * Destruct the CSV file reader
     */
    public function __destruct()
    {
        /* Close the resource if open */
        if ($this->resource) {
            fclose($this->resource);
        }
    }
}
