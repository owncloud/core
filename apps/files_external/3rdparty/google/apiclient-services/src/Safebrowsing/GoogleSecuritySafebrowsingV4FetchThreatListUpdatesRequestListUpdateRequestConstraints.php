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

namespace Google\Service\Safebrowsing;

class GoogleSecuritySafebrowsingV4FetchThreatListUpdatesRequestListUpdateRequestConstraints extends \Google\Collection
{
  protected $collection_key = 'supportedCompressions';
  /**
   * @var string
   */
  public $deviceLocation;
  /**
   * @var string
   */
  public $language;
  /**
   * @var int
   */
  public $maxDatabaseEntries;
  /**
   * @var int
   */
  public $maxUpdateEntries;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string[]
   */
  public $supportedCompressions;

  /**
   * @param string
   */
  public function setDeviceLocation($deviceLocation)
  {
    $this->deviceLocation = $deviceLocation;
  }
  /**
   * @return string
   */
  public function getDeviceLocation()
  {
    return $this->deviceLocation;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param int
   */
  public function setMaxDatabaseEntries($maxDatabaseEntries)
  {
    $this->maxDatabaseEntries = $maxDatabaseEntries;
  }
  /**
   * @return int
   */
  public function getMaxDatabaseEntries()
  {
    return $this->maxDatabaseEntries;
  }
  /**
   * @param int
   */
  public function setMaxUpdateEntries($maxUpdateEntries)
  {
    $this->maxUpdateEntries = $maxUpdateEntries;
  }
  /**
   * @return int
   */
  public function getMaxUpdateEntries()
  {
    return $this->maxUpdateEntries;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string[]
   */
  public function setSupportedCompressions($supportedCompressions)
  {
    $this->supportedCompressions = $supportedCompressions;
  }
  /**
   * @return string[]
   */
  public function getSupportedCompressions()
  {
    return $this->supportedCompressions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSecuritySafebrowsingV4FetchThreatListUpdatesRequestListUpdateRequestConstraints::class, 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4FetchThreatListUpdatesRequestListUpdateRequestConstraints');
