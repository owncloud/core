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

class GoogleSecuritySafebrowsingV4FindFullHashesRequest extends \Google\Collection
{
  protected $collection_key = 'clientStates';
  protected $apiClientType = GoogleSecuritySafebrowsingV4ClientInfo::class;
  protected $apiClientDataType = '';
  protected $clientType = GoogleSecuritySafebrowsingV4ClientInfo::class;
  protected $clientDataType = '';
  public $clientStates;
  protected $threatInfoType = GoogleSecuritySafebrowsingV4ThreatInfo::class;
  protected $threatInfoDataType = '';

  /**
   * @param GoogleSecuritySafebrowsingV4ClientInfo
   */
  public function setApiClient(GoogleSecuritySafebrowsingV4ClientInfo $apiClient)
  {
    $this->apiClient = $apiClient;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ClientInfo
   */
  public function getApiClient()
  {
    return $this->apiClient;
  }
  /**
   * @param GoogleSecuritySafebrowsingV4ClientInfo
   */
  public function setClient(GoogleSecuritySafebrowsingV4ClientInfo $client)
  {
    $this->client = $client;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ClientInfo
   */
  public function getClient()
  {
    return $this->client;
  }
  public function setClientStates($clientStates)
  {
    $this->clientStates = $clientStates;
  }
  public function getClientStates()
  {
    return $this->clientStates;
  }
  /**
   * @param GoogleSecuritySafebrowsingV4ThreatInfo
   */
  public function setThreatInfo(GoogleSecuritySafebrowsingV4ThreatInfo $threatInfo)
  {
    $this->threatInfo = $threatInfo;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ThreatInfo
   */
  public function getThreatInfo()
  {
    return $this->threatInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSecuritySafebrowsingV4FindFullHashesRequest::class, 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4FindFullHashesRequest');
