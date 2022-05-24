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

namespace Google\Service\Storage;

class BucketCors extends \Google\Collection
{
  protected $collection_key = 'responseHeader';
  /**
   * @var int
   */
  public $maxAgeSeconds;
  /**
   * @var string[]
   */
  public $method;
  /**
   * @var string[]
   */
  public $origin;
  /**
   * @var string[]
   */
  public $responseHeader;

  /**
   * @param int
   */
  public function setMaxAgeSeconds($maxAgeSeconds)
  {
    $this->maxAgeSeconds = $maxAgeSeconds;
  }
  /**
   * @return int
   */
  public function getMaxAgeSeconds()
  {
    return $this->maxAgeSeconds;
  }
  /**
   * @param string[]
   */
  public function setMethod($method)
  {
    $this->method = $method;
  }
  /**
   * @return string[]
   */
  public function getMethod()
  {
    return $this->method;
  }
  /**
   * @param string[]
   */
  public function setOrigin($origin)
  {
    $this->origin = $origin;
  }
  /**
   * @return string[]
   */
  public function getOrigin()
  {
    return $this->origin;
  }
  /**
   * @param string[]
   */
  public function setResponseHeader($responseHeader)
  {
    $this->responseHeader = $responseHeader;
  }
  /**
   * @return string[]
   */
  public function getResponseHeader()
  {
    return $this->responseHeader;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BucketCors::class, 'Google_Service_Storage_BucketCors');
