<?php
/**
 * @author Piotr Mrowczynski <Piotr.Mrowczynski@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OCA\DAV\Files;

use Sabre\HTTP\RequestInterface;
use Sabre\DAV\Exception\BadRequest;

/**
 * This class is used to parse multipart/related HTTP message according to RFC http://www.rfc-archive.org/getrfc.php?rfc=2387
 * This class requires a message to contain Content-length parameters, which is used in high performance reading of file contents.
 */

class MultipartContentsParser {
    /**
     * @var \Sabre\HTTP\RequestInterface
     */
    private $request;

    /**
     * @var resource
     */
    private $content = null;

    /**
     * @var Bool
     */
    private $endDelimiterReached = false;

    /**
     * Constructor.
     *
     * @param \Sabre\HTTP\RequestInterface $request
     */
    public function __construct(RequestInterface $request) {
        $this->request = $request;
    }

    /**
     * Get a line.
     *
     * If false is return, it's the end of file.
     *
     * @throws \Sabre\DAV\Exception\BadRequest
     * @return string|boolean
     */
    public function gets() {
        $content = $this->getContent();
        if (!is_resource($content)) {
            throw new BadRequest('Unable to get request content');
        }

        return fgets($content);
    }

    /**
     * @return int
     */
    public function getCursor() {
        return ftell($this->getContent());
    }

    /**
     * @return int
     */
    public function getEndDelimiterReached() {
        return $this->endDelimiterReached;
    }

    /**
     * Return if end of file.
     *
     * @return bool
     */
    public function eof() {
        return feof($this->getContent());
    }

    /**
     * Seeks to offset of some file contentLength from the current cursor possition in the
     * multipartContent.
     *
     * Return true on success and false on failure
     *
     * @return bool
     */
    public function multipartContentSeekToContentLength($contentLength) {
        return (fseek($this->getContent(),$contentLength, SEEK_CUR) === 0 ? true : false);
    }

    /**
     * Get request content.
     *
     * @return resource
     * @throws \Sabre\DAV\Exception\BadRequest
     */
    public function getContent() {
        if ($this->content === null) {
            $this->content = $this->request->getBody();

            if (!$this->content) {
                throw new BadRequest('Unable to get request content');
            }
        }

        return $this->content;
    }

    /**
     * Get a part of request separated by boundrary $boundary.
     *
     * If this method returns an exception, it means whole request has to be abandoned,
     * Request part without correct headers might corrupt the message and parsing is imposible
     *
     * @param  String $boundary
     *
     * @throws \Exception
     * @return array (array $headers, resource $bodyStream)
     */
    public function getPartHeaders($boundary) {
        $delimiter = '--'.$boundary."\r\n";
        $endDelimiter = '--'.$boundary.'--';
        $boundaryCount = 0;
        $content = '';
        $headers = null;
        $body = null;

        while (!$this->eof()) {
            $line = $this->gets();
            if ($line === false) {
                if ($boundaryCount == 0) {
                    //empty part, ignore
                    break;
                }
                else{
                    throw new \Exception('An error appears while reading and parsing header of content part using fgets');
                }
            }

            if ($boundaryCount == 0) {
                if ($line != $delimiter) {
                    if ($this->getCursor() == strlen($line)) {
                        throw new \Exception('Expected boundary delimiter in content part - this is not a multipart request');
                    }
                    elseif ($line == $endDelimiter || $line == $endDelimiter."\r\n") {
                        $this->endDelimiterReached = true;
                        break;
                    }
                    elseif ($line == "\r\n") {
                        continue;
                    }
                } else {
                    continue;
                }
                //at this point we know, that first line was boundrary
                $boundaryCount++;
            }
            elseif ($boundaryCount == 1 && $line == "\r\n"){
                //header-end according to RFC
                $content .= $line;
                $headers = $this->readHeaders($content);
                break;
            }
            elseif ($line == $endDelimiter || $line == $endDelimiter."\r\n") {
                $this->endDelimiterReached = true;
                break;
            }

            $content .= $line;
        }

        if ($this->eof()){
            $this->endDelimiterReached = true;
        }

        return $headers;
    }
    
    /**
     * Read the contents from the current file pointer to the specified length
     *
     * @param int $length
     * 
     * @throws \Sabre\DAV\Exception\BadRequest
     * @return string $buf
     */
    public function streamReadToString($length) {
        if ($length<0) {
            throw new BadRequest('Method streamRead cannot read contents with negative length');
        }
        $source = $this->getContent();
        $bufChunkSize = 8192;
        $count = $length;
        $buf = '';

        while ($count!=0) {
            $bufSize = (($count - $bufChunkSize)<0) ? $count : $bufChunkSize;
            $buf .= fread($source, $bufSize);
            $count -= $bufSize;
        }

        return $buf;
    }

    /**
     * Read the contents from the current file pointer to the specified length and pass
     *
     * @param resource $target, int $length
     *
     * @throws \Sabre\DAV\Exception\BadRequest
     * @return bool $result)
     */
    public function streamReadToStream($target, $length) {
        if ($length<0) {
            throw new BadRequest('Method streamRead cannot read contents with negative length');
        }
        $source = $this->getContent();
        $bufChunkSize = 8192;
        $count = $length;
        $returnStatus = true;

        while ($count!=0) {
            $bufSize = (($count - $bufChunkSize)<0) ? $count : $bufChunkSize;
            $buf = fread($source, $bufSize);
            $bytesWritten = fwrite($target, $buf);

            // note: strlen is expensive so only use it when necessary,
            // on the last block
            if ($bytesWritten === false
                || ($bytesWritten < $bufSize && $bytesWritten < strlen($buf))
            ) {
                // write error, could be disk full ?
                $returnStatus = false;
                break;
            }
            $count -= $bufSize;
        }

        return $returnStatus;
    }

    
    /**
     * Get headers from content
     *
     * @param string $content
     * 
     * @return Array $headers
     */
    public function readHeaders($content) {
        $headers = null;
        $headerLimitation = strpos($content, "\r\n\r\n");
        if ($headerLimitation === false) {
            return null;
        }
        $headersContent = substr($content, 0, $headerLimitation);
        $headersContent = trim($headersContent);
        foreach (explode("\r\n", $headersContent) as $header) {
            $parts = explode(':', $header, 2);
            if (count($parts) != 2) {
                //has incorrect header, try to continue
                continue;
            }
            $headers[strtolower(trim($parts[0]))] = trim($parts[1]);
        }

        return $headers;
    }
}