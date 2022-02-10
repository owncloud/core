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

namespace Google\Service\Digitalassetlinks;

class CheckResponse extends \Google\Collection
{
  protected $collection_key = 'errorCode';
  /**
   * @var string
   */
  public $debugString;
  /**
   * @var string[]
   */
  public $errorCode;
  /**
   * @var bool
   */
  public $linked;
  /**
   * @var string
   */
  public $maxAge;

  /**
   * @param string
   */
  public function setDebugString($debugString)
  {
    $this->debugString = $debugString;
  }
  /**
   * @return string
   */
  public function getDebugString()
  {
    return $this->debugString;
  }
  /**
   * @param string[]
   */
  public function setErrorCode($errorCode)
  {
    $this->errorCode = $errorCode;
  }
  /**
   * @return string[]
   */
  public function getErrorCode()
  {
    return $this->errorCode;
  }
  /**
   * @param bool
   */
  public function setLinked($linked)
  {
    $this->linked = $linked;
  }
  /**
   * @return bool
   */
  public function getLinked()
  {
    return $this->linked;
  }
  /**
   * @param string
   */
  public function setMaxAge($maxAge)
  {
    $this->maxAge = $maxAge;
  }
  /**
   * @return string
   */
  public function getMaxAge()
  {
    return $this->maxAge;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CheckResponse::class, 'Google_Service_Digitalassetlinks_CheckResponse');
