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

class GoogleSecuritySafebrowsingV4ThreatMatch extends \Google\Model
{
  public $cacheDuration;
  public $platformType;
  protected $threatDataType = '';
  protected $threatEntryMetadataType = GoogleSecuritySafebrowsingV4ThreatEntryMetadata::class;
  protected $threatEntryMetadataDataType = '';
  public $threatEntryType;
  public $threatType;

  public function setCacheDuration($cacheDuration)
  {
    $this->cacheDuration = $cacheDuration;
  }
  public function getCacheDuration()
  {
    return $this->cacheDuration;
  }
  public function setPlatformType($platformType)
  {
    $this->platformType = $platformType;
  }
  public function getPlatformType()
  {
    return $this->platformType;
  }
  /**
   * @param GoogleSecuritySafebrowsingV4ThreatEntry
   */
  public function setThreat(GoogleSecuritySafebrowsingV4ThreatEntry $threat)
  {
    $this->threat = $threat;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ThreatEntry
   */
  public function getThreat()
  {
    return $this->threat;
  }
  /**
   * @param GoogleSecuritySafebrowsingV4ThreatEntryMetadata
   */
  public function setThreatEntryMetadata(GoogleSecuritySafebrowsingV4ThreatEntryMetadata $threatEntryMetadata)
  {
    $this->threatEntryMetadata = $threatEntryMetadata;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ThreatEntryMetadata
   */
  public function getThreatEntryMetadata()
  {
    return $this->threatEntryMetadata;
  }
  public function setThreatEntryType($threatEntryType)
  {
    $this->threatEntryType = $threatEntryType;
  }
  public function getThreatEntryType()
  {
    return $this->threatEntryType;
  }
  public function setThreatType($threatType)
  {
    $this->threatType = $threatType;
  }
  public function getThreatType()
  {
    return $this->threatType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSecuritySafebrowsingV4ThreatMatch::class, 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatMatch');
