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

class Google_Service_AndroidPublisher_TrackRelease extends Google_Collection
{
  protected $collection_key = 'versionCodes';
  protected $countryTargetingType = 'Google_Service_AndroidPublisher_CountryTargeting';
  protected $countryTargetingDataType = '';
  public $inAppUpdatePriority;
  public $name;
  protected $releaseNotesType = 'Google_Service_AndroidPublisher_LocalizedText';
  protected $releaseNotesDataType = 'array';
  public $status;
  public $userFraction;
  public $versionCodes;

  /**
   * @param Google_Service_AndroidPublisher_CountryTargeting
   */
  public function setCountryTargeting(Google_Service_AndroidPublisher_CountryTargeting $countryTargeting)
  {
    $this->countryTargeting = $countryTargeting;
  }
  /**
   * @return Google_Service_AndroidPublisher_CountryTargeting
   */
  public function getCountryTargeting()
  {
    return $this->countryTargeting;
  }
  public function setInAppUpdatePriority($inAppUpdatePriority)
  {
    $this->inAppUpdatePriority = $inAppUpdatePriority;
  }
  public function getInAppUpdatePriority()
  {
    return $this->inAppUpdatePriority;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_AndroidPublisher_LocalizedText
   */
  public function setReleaseNotes($releaseNotes)
  {
    $this->releaseNotes = $releaseNotes;
  }
  /**
   * @return Google_Service_AndroidPublisher_LocalizedText
   */
  public function getReleaseNotes()
  {
    return $this->releaseNotes;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setUserFraction($userFraction)
  {
    $this->userFraction = $userFraction;
  }
  public function getUserFraction()
  {
    return $this->userFraction;
  }
  public function setVersionCodes($versionCodes)
  {
    $this->versionCodes = $versionCodes;
  }
  public function getVersionCodes()
  {
    return $this->versionCodes;
  }
}
