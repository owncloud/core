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

class GoogleSecuritySafebrowsingV4FetchThreatListUpdatesResponseListUpdateResponse extends \Google\Collection
{
  protected $collection_key = 'removals';
  protected $additionsType = GoogleSecuritySafebrowsingV4ThreatEntrySet::class;
  protected $additionsDataType = 'array';
  protected $checksumType = GoogleSecuritySafebrowsingV4Checksum::class;
  protected $checksumDataType = '';
  /**
   * @var string
   */
  public $newClientState;
  /**
   * @var string
   */
  public $platformType;
  protected $removalsType = GoogleSecuritySafebrowsingV4ThreatEntrySet::class;
  protected $removalsDataType = 'array';
  /**
   * @var string
   */
  public $responseType;
  /**
   * @var string
   */
  public $threatEntryType;
  /**
   * @var string
   */
  public $threatType;

  /**
   * @param GoogleSecuritySafebrowsingV4ThreatEntrySet[]
   */
  public function setAdditions($additions)
  {
    $this->additions = $additions;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ThreatEntrySet[]
   */
  public function getAdditions()
  {
    return $this->additions;
  }
  /**
   * @param GoogleSecuritySafebrowsingV4Checksum
   */
  public function setChecksum(GoogleSecuritySafebrowsingV4Checksum $checksum)
  {
    $this->checksum = $checksum;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4Checksum
   */
  public function getChecksum()
  {
    return $this->checksum;
  }
  /**
   * @param string
   */
  public function setNewClientState($newClientState)
  {
    $this->newClientState = $newClientState;
  }
  /**
   * @return string
   */
  public function getNewClientState()
  {
    return $this->newClientState;
  }
  /**
   * @param string
   */
  public function setPlatformType($platformType)
  {
    $this->platformType = $platformType;
  }
  /**
   * @return string
   */
  public function getPlatformType()
  {
    return $this->platformType;
  }
  /**
   * @param GoogleSecuritySafebrowsingV4ThreatEntrySet[]
   */
  public function setRemovals($removals)
  {
    $this->removals = $removals;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ThreatEntrySet[]
   */
  public function getRemovals()
  {
    return $this->removals;
  }
  /**
   * @param string
   */
  public function setResponseType($responseType)
  {
    $this->responseType = $responseType;
  }
  /**
   * @return string
   */
  public function getResponseType()
  {
    return $this->responseType;
  }
  /**
   * @param string
   */
  public function setThreatEntryType($threatEntryType)
  {
    $this->threatEntryType = $threatEntryType;
  }
  /**
   * @return string
   */
  public function getThreatEntryType()
  {
    return $this->threatEntryType;
  }
  /**
   * @param string
   */
  public function setThreatType($threatType)
  {
    $this->threatType = $threatType;
  }
  /**
   * @return string
   */
  public function getThreatType()
  {
    return $this->threatType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSecuritySafebrowsingV4FetchThreatListUpdatesResponseListUpdateResponse::class, 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4FetchThreatListUpdatesResponseListUpdateResponse');
