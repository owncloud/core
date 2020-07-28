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

class Google_Service_PlayableLocations_GoogleMapsUnityClientInfo extends Google_Model
{
  public $apiClient;
  public $applicationId;
  public $applicationVersion;
  public $deviceModel;
  public $languageCode;
  public $operatingSystem;
  public $operatingSystemBuild;
  public $platform;

  public function setApiClient($apiClient)
  {
    $this->apiClient = $apiClient;
  }
  public function getApiClient()
  {
    return $this->apiClient;
  }
  public function setApplicationId($applicationId)
  {
    $this->applicationId = $applicationId;
  }
  public function getApplicationId()
  {
    return $this->applicationId;
  }
  public function setApplicationVersion($applicationVersion)
  {
    $this->applicationVersion = $applicationVersion;
  }
  public function getApplicationVersion()
  {
    return $this->applicationVersion;
  }
  public function setDeviceModel($deviceModel)
  {
    $this->deviceModel = $deviceModel;
  }
  public function getDeviceModel()
  {
    return $this->deviceModel;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setOperatingSystem($operatingSystem)
  {
    $this->operatingSystem = $operatingSystem;
  }
  public function getOperatingSystem()
  {
    return $this->operatingSystem;
  }
  public function setOperatingSystemBuild($operatingSystemBuild)
  {
    $this->operatingSystemBuild = $operatingSystemBuild;
  }
  public function getOperatingSystemBuild()
  {
    return $this->operatingSystemBuild;
  }
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  public function getPlatform()
  {
    return $this->platform;
  }
}
