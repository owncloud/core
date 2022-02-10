<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Appengine;

class StaticFilesHandler extends \Google\Model
{
  /**
   * @var bool
   */
  public $applicationReadable;
  /**
   * @var string
   */
  public $expiration;
  /**
   * @var string[]
   */
  public $httpHeaders;
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var string
   */
  public $path;
  /**
   * @var bool
   */
  public $requireMatchingFile;
  /**
   * @var string
   */
  public $uploadPathRegex;

  /**
   * @param bool
   */
  public function setApplicationReadable($applicationReadable)
  {
    $this->applicationReadable = $applicationReadable;
  }
  /**
   * @return bool
   */
  public function getApplicationReadable()
  {
    return $this->applicationReadable;
  }
  /**
   * @param string
   */
  public function setExpiration($expiration)
  {
    $this->expiration = $expiration;
  }
  /**
   * @return string
   */
  public function getExpiration()
  {
    return $this->expiration;
  }
  /**
   * @param string[]
   */
  public function setHttpHeaders($httpHeaders)
  {
    $this->httpHeaders = $httpHeaders;
  }
  /**
   * @return string[]
   */
  public function getHttpHeaders()
  {
    return $this->httpHeaders;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param bool
   */
  public function setRequireMatchingFile($requireMatchingFile)
  {
    $this->requireMatchingFile = $requireMatchingFile;
  }
  /**
   * @return bool
   */
  public function getRequireMatchingFile()
  {
    return $this->requireMatchingFile;
  }
  /**
   * @param string
   */
  public function setUploadPathRegex($uploadPathRegex)
  {
    $this->uploadPathRegex = $uploadPathRegex;
  }
  /**
   * @return string
   */
  public function getUploadPathRegex()
  {
    return $this->uploadPathRegex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StaticFilesHandler::class, 'Google_Service_Appengine_StaticFilesHandler');
