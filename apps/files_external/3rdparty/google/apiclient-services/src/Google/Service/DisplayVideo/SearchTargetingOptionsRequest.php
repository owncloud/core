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

class Google_Service_DisplayVideo_SearchTargetingOptionsRequest extends Google_Model
{
  public $advertiserId;
  protected $geoRegionSearchTermsType = 'Google_Service_DisplayVideo_GeoRegionSearchTerms';
  protected $geoRegionSearchTermsDataType = '';
  public $pageSize;
  public $pageToken;

  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param Google_Service_DisplayVideo_GeoRegionSearchTerms
   */
  public function setGeoRegionSearchTerms(Google_Service_DisplayVideo_GeoRegionSearchTerms $geoRegionSearchTerms)
  {
    $this->geoRegionSearchTerms = $geoRegionSearchTerms;
  }
  /**
   * @return Google_Service_DisplayVideo_GeoRegionSearchTerms
   */
  public function getGeoRegionSearchTerms()
  {
    return $this->geoRegionSearchTerms;
  }
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  public function getPageSize()
  {
    return $this->pageSize;
  }
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  public function getPageToken()
  {
    return $this->pageToken;
  }
}
