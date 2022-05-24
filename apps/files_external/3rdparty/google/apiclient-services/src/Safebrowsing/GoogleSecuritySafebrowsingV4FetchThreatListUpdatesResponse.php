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

class GoogleSecuritySafebrowsingV4FetchThreatListUpdatesResponse extends \Google\Collection
{
  protected $collection_key = 'listUpdateResponses';
  protected $listUpdateResponsesType = GoogleSecuritySafebrowsingV4FetchThreatListUpdatesResponseListUpdateResponse::class;
  protected $listUpdateResponsesDataType = 'array';
  /**
   * @var string
   */
  public $minimumWaitDuration;

  /**
   * @param GoogleSecuritySafebrowsingV4FetchThreatListUpdatesResponseListUpdateResponse[]
   */
  public function setListUpdateResponses($listUpdateResponses)
  {
    $this->listUpdateResponses = $listUpdateResponses;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4FetchThreatListUpdatesResponseListUpdateResponse[]
   */
  public function getListUpdateResponses()
  {
    return $this->listUpdateResponses;
  }
  /**
   * @param string
   */
  public function setMinimumWaitDuration($minimumWaitDuration)
  {
    $this->minimumWaitDuration = $minimumWaitDuration;
  }
  /**
   * @return string
   */
  public function getMinimumWaitDuration()
  {
    return $this->minimumWaitDuration;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSecuritySafebrowsingV4FetchThreatListUpdatesResponse::class, 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4FetchThreatListUpdatesResponse');
