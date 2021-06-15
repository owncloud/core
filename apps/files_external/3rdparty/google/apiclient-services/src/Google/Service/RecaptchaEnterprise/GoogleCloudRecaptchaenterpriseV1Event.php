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

class Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Event extends Google_Model
{
  public $expectedAction;
  public $siteKey;
  public $token;
  public $userAgent;
  public $userIpAddress;

  public function setExpectedAction($expectedAction)
  {
    $this->expectedAction = $expectedAction;
  }
  public function getExpectedAction()
  {
    return $this->expectedAction;
  }
  public function setSiteKey($siteKey)
  {
    $this->siteKey = $siteKey;
  }
  public function getSiteKey()
  {
    return $this->siteKey;
  }
  public function setToken($token)
  {
    $this->token = $token;
  }
  public function getToken()
  {
    return $this->token;
  }
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  public function getUserAgent()
  {
    return $this->userAgent;
  }
  public function setUserIpAddress($userIpAddress)
  {
    $this->userIpAddress = $userIpAddress;
  }
  public function getUserIpAddress()
  {
    return $this->userIpAddress;
  }
}
