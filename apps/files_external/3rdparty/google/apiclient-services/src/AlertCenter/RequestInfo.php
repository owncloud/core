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

namespace Google\Service\AlertCenter;

class RequestInfo extends \Google\Collection
{
  protected $collection_key = 'appDeveloperEmail';
  /**
   * @var string[]
   */
  public $appDeveloperEmail;
  /**
   * @var string
   */
  public $appKey;
  /**
   * @var string
   */
  public $numberOfRequests;

  /**
   * @param string[]
   */
  public function setAppDeveloperEmail($appDeveloperEmail)
  {
    $this->appDeveloperEmail = $appDeveloperEmail;
  }
  /**
   * @return string[]
   */
  public function getAppDeveloperEmail()
  {
    return $this->appDeveloperEmail;
  }
  /**
   * @param string
   */
  public function setAppKey($appKey)
  {
    $this->appKey = $appKey;
  }
  /**
   * @return string
   */
  public function getAppKey()
  {
    return $this->appKey;
  }
  /**
   * @param string
   */
  public function setNumberOfRequests($numberOfRequests)
  {
    $this->numberOfRequests = $numberOfRequests;
  }
  /**
   * @return string
   */
  public function getNumberOfRequests()
  {
    return $this->numberOfRequests;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RequestInfo::class, 'Google_Service_AlertCenter_RequestInfo');
