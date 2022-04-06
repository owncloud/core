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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1GetAsyncQueryResultUrlResponseURLInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $md5;
  /**
   * @var string
   */
  public $sizeBytes;
  /**
   * @var string
   */
  public $uri;

  /**
   * @param string
   */
  public function setMd5($md5)
  {
    $this->md5 = $md5;
  }
  /**
   * @return string
   */
  public function getMd5()
  {
    return $this->md5;
  }
  /**
   * @param string
   */
  public function setSizeBytes($sizeBytes)
  {
    $this->sizeBytes = $sizeBytes;
  }
  /**
   * @return string
   */
  public function getSizeBytes()
  {
    return $this->sizeBytes;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1GetAsyncQueryResultUrlResponseURLInfo::class, 'Google_Service_Apigee_GoogleCloudApigeeV1GetAsyncQueryResultUrlResponseURLInfo');
