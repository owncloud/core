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

namespace Google\Service\RecaptchaEnterprise;

class GoogleCloudRecaptchaenterpriseV1Event extends \Google\Model
{
  /**
   * @var string
   */
  public $expectedAction;
  /**
   * @var string
   */
  public $hashedAccountId;
  /**
   * @var string
   */
  public $siteKey;
  /**
   * @var string
   */
  public $token;
  /**
   * @var string
   */
  public $userAgent;
  /**
   * @var string
   */
  public $userIpAddress;

  /**
   * @param string
   */
  public function setExpectedAction($expectedAction)
  {
    $this->expectedAction = $expectedAction;
  }
  /**
   * @return string
   */
  public function getExpectedAction()
  {
    return $this->expectedAction;
  }
  /**
   * @param string
   */
  public function setHashedAccountId($hashedAccountId)
  {
    $this->hashedAccountId = $hashedAccountId;
  }
  /**
   * @return string
   */
  public function getHashedAccountId()
  {
    return $this->hashedAccountId;
  }
  /**
   * @param string
   */
  public function setSiteKey($siteKey)
  {
    $this->siteKey = $siteKey;
  }
  /**
   * @return string
   */
  public function getSiteKey()
  {
    return $this->siteKey;
  }
  /**
   * @param string
   */
  public function setToken($token)
  {
    $this->token = $token;
  }
  /**
   * @return string
   */
  public function getToken()
  {
    return $this->token;
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
  public function setUserIpAddress($userIpAddress)
  {
    $this->userIpAddress = $userIpAddress;
  }
  /**
   * @return string
   */
  public function getUserIpAddress()
  {
    return $this->userIpAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecaptchaenterpriseV1Event::class, 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Event');
