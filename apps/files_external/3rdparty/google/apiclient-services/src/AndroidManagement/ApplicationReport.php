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

namespace Google\Service\AndroidManagement;

class ApplicationReport extends \Google\Collection
{
  protected $collection_key = 'signingKeyCertFingerprints';
  /**
   * @var string
   */
  public $applicationSource;
  /**
   * @var string
   */
  public $displayName;
  protected $eventsType = ApplicationEvent::class;
  protected $eventsDataType = 'array';
  /**
   * @var string
   */
  public $installerPackageName;
  protected $keyedAppStatesType = KeyedAppState::class;
  protected $keyedAppStatesDataType = 'array';
  /**
   * @var string
   */
  public $packageName;
  /**
   * @var string
   */
  public $packageSha256Hash;
  /**
   * @var string[]
   */
  public $signingKeyCertFingerprints;
  /**
   * @var string
   */
  public $state;
  /**
   * @var int
   */
  public $versionCode;
  /**
   * @var string
   */
  public $versionName;

  /**
   * @param string
   */
  public function setApplicationSource($applicationSource)
  {
    $this->applicationSource = $applicationSource;
  }
  /**
   * @return string
   */
  public function getApplicationSource()
  {
    return $this->applicationSource;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param ApplicationEvent[]
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
  /**
   * @return ApplicationEvent[]
   */
  public function getEvents()
  {
    return $this->events;
  }
  /**
   * @param string
   */
  public function setInstallerPackageName($installerPackageName)
  {
    $this->installerPackageName = $installerPackageName;
  }
  /**
   * @return string
   */
  public function getInstallerPackageName()
  {
    return $this->installerPackageName;
  }
  /**
   * @param KeyedAppState[]
   */
  public function setKeyedAppStates($keyedAppStates)
  {
    $this->keyedAppStates = $keyedAppStates;
  }
  /**
   * @return KeyedAppState[]
   */
  public function getKeyedAppStates()
  {
    return $this->keyedAppStates;
  }
  /**
   * @param string
   */
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  /**
   * @return string
   */
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param string
   */
  public function setPackageSha256Hash($packageSha256Hash)
  {
    $this->packageSha256Hash = $packageSha256Hash;
  }
  /**
   * @return string
   */
  public function getPackageSha256Hash()
  {
    return $this->packageSha256Hash;
  }
  /**
   * @param string[]
   */
  public function setSigningKeyCertFingerprints($signingKeyCertFingerprints)
  {
    $this->signingKeyCertFingerprints = $signingKeyCertFingerprints;
  }
  /**
   * @return string[]
   */
  public function getSigningKeyCertFingerprints()
  {
    return $this->signingKeyCertFingerprints;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param int
   */
  public function setVersionCode($versionCode)
  {
    $this->versionCode = $versionCode;
  }
  /**
   * @return int
   */
  public function getVersionCode()
  {
    return $this->versionCode;
  }
  /**
   * @param string
   */
  public function setVersionName($versionName)
  {
    $this->versionName = $versionName;
  }
  /**
   * @return string
   */
  public function getVersionName()
  {
    return $this->versionName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApplicationReport::class, 'Google_Service_AndroidManagement_ApplicationReport');
