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

namespace Google\Service\FirebaseManagement;

class WebAppConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $apiKey;
  /**
   * @var string
   */
  public $appId;
  /**
   * @var string
   */
  public $authDomain;
  /**
   * @var string
   */
  public $databaseURL;
  /**
   * @var string
   */
  public $locationId;
  /**
   * @var string
   */
  public $measurementId;
  /**
   * @var string
   */
  public $messagingSenderId;
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $storageBucket;

  /**
   * @param string
   */
  public function setApiKey($apiKey)
  {
    $this->apiKey = $apiKey;
  }
  /**
   * @return string
   */
  public function getApiKey()
  {
    return $this->apiKey;
  }
  /**
   * @param string
   */
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return string
   */
  public function getAppId()
  {
    return $this->appId;
  }
  /**
   * @param string
   */
  public function setAuthDomain($authDomain)
  {
    $this->authDomain = $authDomain;
  }
  /**
   * @return string
   */
  public function getAuthDomain()
  {
    return $this->authDomain;
  }
  /**
   * @param string
   */
  public function setDatabaseURL($databaseURL)
  {
    $this->databaseURL = $databaseURL;
  }
  /**
   * @return string
   */
  public function getDatabaseURL()
  {
    return $this->databaseURL;
  }
  /**
   * @param string
   */
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  /**
   * @return string
   */
  public function getLocationId()
  {
    return $this->locationId;
  }
  /**
   * @param string
   */
  public function setMeasurementId($measurementId)
  {
    $this->measurementId = $measurementId;
  }
  /**
   * @return string
   */
  public function getMeasurementId()
  {
    return $this->measurementId;
  }
  /**
   * @param string
   */
  public function setMessagingSenderId($messagingSenderId)
  {
    $this->messagingSenderId = $messagingSenderId;
  }
  /**
   * @return string
   */
  public function getMessagingSenderId()
  {
    return $this->messagingSenderId;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param string
   */
  public function setStorageBucket($storageBucket)
  {
    $this->storageBucket = $storageBucket;
  }
  /**
   * @return string
   */
  public function getStorageBucket()
  {
    return $this->storageBucket;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WebAppConfig::class, 'Google_Service_FirebaseManagement_WebAppConfig');
