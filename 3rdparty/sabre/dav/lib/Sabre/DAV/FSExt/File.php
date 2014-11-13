<?php

namespace Sabre\DAV\FSExt;
use Sabre\DAV;

/**
 * File class
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class File extends Node implements DAV\PartialUpdate\IPatchSupport {

    /**
     * Updates the data
     *
     * data is a readable stream resource.
     *
     * @param resource|string $data
     * @return string
     */
    public function put($data) {

        file_put_contents($this->path,$data);
        return '"' . md5_file($this->path) . '"';

    }

    /**
     * Updates the file based on a range specification.
     *
     * The first argument is the data, which is either a readable stream
     * resource or a string.
     *
     * The second argument is the type of update we're doing.
     * This is either:
     * * 1. append
     * * 2. update based on a start byte
     * * 3. update based on an end byte
     *;
     * The third argument is the start or end byte.
     *
     * After a successful put operation, you may choose to return an ETag. The
     * etag must always be surrounded by double-quotes. These quotes must
     * appear in the actual string you're returning.
     *
     * Clients may use the ETag from a PUT request to later on make sure that
     * when they update the file, the contents haven't changed in the mean
     * time.
     *
     * @param resource|string $data
     * @param int $rangeType
     * @param int $offset
     * @return string|null
     */
    public function patch($data, $rangeType, $offset = null) {

        switch($rangeType) {
            case 1 :
                $f = fopen($this->path, 'a');
                break;
            case 2 :
                $f = fopen($this->path, 'c');
                fseek($f,$offset);
                break;
            case 3 :
                $f = fopen($this->path, 'c');
                fseek($f, $offset, SEEK_END);
                break;
        }
        if (is_string($data)) {
            fwrite($f, $data);
        } else {
            stream_copy_to_stream($data,$f);
        }
        fclose($f);
        return '"' . md5_file($this->path) . '"';

    }

    /**
     * Returns the data
     *
     * @return resource
     */
    public function get() {

        return fopen($this->path,'r');

    }

    /**
     * Delete the current file
     *
     * @return bool
     */
    public function delete() {

        unlink($this->path);
        return parent::delete();

    }

    /**
     * Returns the ETag for a file
     *
     * An ETag is a unique identifier representing the current version of the file. If the file changes, the ETag MUST change.
     * The ETag is an arbitrary string, but MUST be surrounded by double-quotes.
     *
     * Return null if the ETag can not effectively be determined
     *
     * @return string|null
     */
    public function getETag() {

        return '"' . md5_file($this->path). '"';

    }

    /**
     * Returns the mime-type for a file
     *
     * If null is returned, we'll assume application/octet-stream
     *
     * @return string|null
     */
    public function getContentType() {

        return null;

    }

    /**
     * Returns the size of the file, in bytes
     *
     * @return int
     */
    public function getSize() {

        return filesize($this->path);

    }

}

