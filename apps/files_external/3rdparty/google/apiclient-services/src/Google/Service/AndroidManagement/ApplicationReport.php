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

class Google_Service_AndroidManagement_ApplicationReport extends Google_Collection
{
  protected $collection_key = 'signingKeyCertFingerprints';
  public $applicationSource;
  public $displayName;
  protected $eventsType = 'Google_Service_AndroidManagement_ApplicationEvent';
  protected $eventsDataType = 'array';
  public $installerPackageName;
  protected $keyedAppStatesType = 'Google_Service_AndroidManagement_KeyedAppState';
  protected $keyedAppStatesDataType = 'array';
  public $packageName;
  public $packageSha256Hash;
  public $signingKeyCertFingerprints;
  public $state;
  public $versionCode;
  public $versionName;

  public function setApplicationSource($applicationSource)
  {
    $this->applicationSource = $applicationSource;
  }
  public function getApplicationSource()
  {
    return $this->applicationSource;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_AndroidManagement_ApplicationEvent[]
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
  /**
   * @return Google_Service_AndroidManagement_ApplicationEvent[]
   */
  public function getEvents()
  {
    return $this->events;
  }
  public function setInstallerPackageName($installerPackageName)
  {
    $this->installerPackageName = $installerPackageName;
  }
  public function getInstallerPackageName()
  {
    return $this->installerPackageName;
  }
  /**
   * @param Google_Service_AndroidManagement_KeyedAppState[]
   */
  public function setKeyedAppStates($keyedAppStates)
  {
    $this->keyedAppStates = $keyedAppStates;
  }
  /**
   * @return Google_Service_AndroidManagement_KeyedAppState[]
   */
  public function getKeyedAppStates()
  {
    return $this->keyedAppStates;
  }
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  public function getPackageName()
  {
    return $this->packageName;
  }
  public function setPackageSha256Hash($packageSha256Hash)
  {
    $this->packageSha256Hash = $packageSha256Hash;
  }
  public function getPackageSha256Hash()
  {
    return $this->packageSha256Hash;
  }
  public function setSigningKeyCertFingerprints($signingKeyCertFingerprints)
  {
    $this->signingKeyCertFingerprints = $signingKeyCertFingerprints;
  }
  public function getSigningKeyCertFingerprints()
  {
    return $this->signingKeyCertFingerprints;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setVersionCode($versionCode)
  {
    $this->versionCode = $versionCode;
  }
  public function getVersionCode()
  {
    return $this->versionCode;
  }
  public function setVersionName($versionName)
  {
    $this->versionName = $versionName;
  }
  public function getVersionName()
  {
    return $this->versionName;
  }
}
