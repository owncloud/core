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

class GoogleSecuritySafebrowsingV4FetchThreatListUpdatesRequest extends \Google\Collection
{
  protected $collection_key = 'listUpdateRequests';
  protected $clientType = GoogleSecuritySafebrowsingV4ClientInfo::class;
  protected $clientDataType = '';
  protected $listUpdateRequestsType = GoogleSecuritySafebrowsingV4FetchThreatListUpdatesRequestListUpdateRequest::class;
  protected $listUpdateRequestsDataType = 'array';

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
  /**
   * @param GoogleSecuritySafebrowsingV4FetchThreatListUpdatesRequestListUpdateRequest[]
   */
  public function setListUpdateRequests($listUpdateRequests)
  {
    $this->listUpdateRequests = $listUpdateRequests;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4FetchThreatListUpdatesRequestListUpdateRequest[]
   */
  public function getListUpdateRequests()
  {
    return $this->listUpdateRequests;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSecuritySafebrowsingV4FetchThreatListUpdatesRequest::class, 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4FetchThreatListUpdatesRequest');
