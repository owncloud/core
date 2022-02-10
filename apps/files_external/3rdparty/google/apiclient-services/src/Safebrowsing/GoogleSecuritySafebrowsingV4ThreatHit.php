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

class GoogleSecuritySafebrowsingV4ThreatHit extends \Google\Collection
{
  protected $collection_key = 'resources';
  protected $clientInfoType = GoogleSecuritySafebrowsingV4ClientInfo::class;
  protected $clientInfoDataType = '';
  protected $entryType = GoogleSecuritySafebrowsingV4ThreatEntry::class;
  protected $entryDataType = '';
  /**
   * @var string
   */
  public $platformType;
  protected $resourcesType = GoogleSecuritySafebrowsingV4ThreatHitThreatSource::class;
  protected $resourcesDataType = 'array';
  /**
   * @var string
   */
  public $threatType;
  protected $userInfoType = GoogleSecuritySafebrowsingV4ThreatHitUserInfo::class;
  protected $userInfoDataType = '';

  /**
   * @param GoogleSecuritySafebrowsingV4ClientInfo
   */
  public function setClientInfo(GoogleSecuritySafebrowsingV4ClientInfo $clientInfo)
  {
    $this->clientInfo = $clientInfo;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ClientInfo
   */
  public function getClientInfo()
  {
    return $this->clientInfo;
  }
  /**
   * @param GoogleSecuritySafebrowsingV4ThreatEntry
   */
  public function setEntry(GoogleSecuritySafebrowsingV4ThreatEntry $entry)
  {
    $this->entry = $entry;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ThreatEntry
   */
  public function getEntry()
  {
    return $this->entry;
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
   * @param GoogleSecuritySafebrowsingV4ThreatHitThreatSource[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ThreatHitThreatSource[]
   */
  public function getResources()
  {
    return $this->resources;
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
  /**
   * @param GoogleSecuritySafebrowsingV4ThreatHitUserInfo
   */
  public function setUserInfo(GoogleSecuritySafebrowsingV4ThreatHitUserInfo $userInfo)
  {
    $this->userInfo = $userInfo;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ThreatHitUserInfo
   */
  public function getUserInfo()
  {
    return $this->userInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSecuritySafebrowsingV4ThreatHit::class, 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatHit');
