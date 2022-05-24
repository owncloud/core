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

namespace Google\Service\PlayableLocations;

class GoogleMapsPlayablelocationsV3LogImpressionsRequest extends \Google\Collection
{
  protected $collection_key = 'impressions';
  protected $clientInfoType = GoogleMapsUnityClientInfo::class;
  protected $clientInfoDataType = '';
  protected $impressionsType = GoogleMapsPlayablelocationsV3Impression::class;
  protected $impressionsDataType = 'array';
  public $requestId;

  /**
   * @param GoogleMapsUnityClientInfo
   */
  public function setClientInfo(GoogleMapsUnityClientInfo $clientInfo)
  {
    $this->clientInfo = $clientInfo;
  }
  /**
   * @return GoogleMapsUnityClientInfo
   */
  public function getClientInfo()
  {
    return $this->clientInfo;
  }
  /**
   * @param GoogleMapsPlayablelocationsV3Impression[]
   */
  public function setImpressions($impressions)
  {
    $this->impressions = $impressions;
  }
  /**
   * @return GoogleMapsPlayablelocationsV3Impression[]
   */
  public function getImpressions()
  {
    return $this->impressions;
  }
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  public function getRequestId()
  {
    return $this->requestId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleMapsPlayablelocationsV3LogImpressionsRequest::class, 'Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3LogImpressionsRequest');
