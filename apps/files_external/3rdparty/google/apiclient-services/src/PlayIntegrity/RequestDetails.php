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

namespace Google\Service\PlayIntegrity;

class RequestDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $nonce;
  /**
   * @var string
   */
  public $requestPackageName;
  /**
   * @var string
   */
  public $timestampMillis;

  /**
   * @param string
   */
  public function setNonce($nonce)
  {
    $this->nonce = $nonce;
  }
  /**
   * @return string
   */
  public function getNonce()
  {
    return $this->nonce;
  }
  /**
   * @param string
   */
  public function setRequestPackageName($requestPackageName)
  {
    $this->requestPackageName = $requestPackageName;
  }
  /**
   * @return string
   */
  public function getRequestPackageName()
  {
    return $this->requestPackageName;
  }
  /**
   * @param string
   */
  public function setTimestampMillis($timestampMillis)
  {
    $this->timestampMillis = $timestampMillis;
  }
  /**
   * @return string
   */
  public function getTimestampMillis()
  {
    return $this->timestampMillis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RequestDetails::class, 'Google_Service_PlayIntegrity_RequestDetails');
