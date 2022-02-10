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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2UserInfo extends \Google\Model
{
  /**
   * @var bool
   */
  public $directUserRequest;
  /**
   * @var string
   */
  public $ipAddress;
  /**
   * @var string
   */
  public $userAgent;
  /**
   * @var string
   */
  public $userId;

  /**
   * @param bool
   */
  public function setDirectUserRequest($directUserRequest)
  {
    $this->directUserRequest = $directUserRequest;
  }
  /**
   * @return bool
   */
  public function getDirectUserRequest()
  {
    return $this->directUserRequest;
  }
  /**
   * @param string
   */
  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }
  /**
   * @return string
   */
  public function getIpAddress()
  {
    return $this->ipAddress;
  }
  /**
   * @param string
   */
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  /**
   * @return string
   */
  public function getUserAgent()
  {
    return $this->userAgent;
  }
  /**
   * @param string
   */
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  /**
   * @return string
   */
  public function getUserId()
  {
    return $this->userId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2UserInfo::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2UserInfo');
