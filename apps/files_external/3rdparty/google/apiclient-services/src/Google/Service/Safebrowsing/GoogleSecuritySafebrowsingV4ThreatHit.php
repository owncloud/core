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

class Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatHit extends Google_Collection
{
  protected $collection_key = 'resources';
  protected $clientInfoType = 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ClientInfo';
  protected $clientInfoDataType = '';
  protected $entryType = 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatEntry';
  protected $entryDataType = '';
  public $platformType;
  protected $resourcesType = 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatHitThreatSource';
  protected $resourcesDataType = 'array';
  public $threatType;
  protected $userInfoType = 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatHitUserInfo';
  protected $userInfoDataType = '';

  /**
   * @param Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ClientInfo
   */
  public function setClientInfo(Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ClientInfo $clientInfo)
  {
    $this->clientInfo = $clientInfo;
  }
  /**
   * @return Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ClientInfo
   */
  public function getClientInfo()
  {
    return $this->clientInfo;
  }
  /**
   * @param Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatEntry
   */
  public function setEntry(Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatEntry $entry)
  {
    $this->entry = $entry;
  }
  /**
   * @return Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatEntry
   */
  public function getEntry()
  {
    return $this->entry;
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
   * @param Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatHitThreatSource[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatHitThreatSource[]
   */
  public function getResources()
  {
    return $this->resources;
  }
  public function setThreatType($threatType)
  {
    $this->threatType = $threatType;
  }
  public function getThreatType()
  {
    return $this->threatType;
  }
  /**
   * @param Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatHitUserInfo
   */
  public function setUserInfo(Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatHitUserInfo $userInfo)
  {
    $this->userInfo = $userInfo;
  }
  /**
   * @return Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ThreatHitUserInfo
   */
  public function getUserInfo()
  {
    return $this->userInfo;
  }
}
