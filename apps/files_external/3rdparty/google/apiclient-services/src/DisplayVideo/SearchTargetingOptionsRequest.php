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

namespace Google\Service\DisplayVideo;

class SearchTargetingOptionsRequest extends \Google\Model
{
  public $advertiserId;
  protected $businessChainSearchTermsType = BusinessChainSearchTerms::class;
  protected $businessChainSearchTermsDataType = '';
  protected $geoRegionSearchTermsType = GeoRegionSearchTerms::class;
  protected $geoRegionSearchTermsDataType = '';
  public $pageSize;
  public $pageToken;
  protected $poiSearchTermsType = PoiSearchTerms::class;
  protected $poiSearchTermsDataType = '';

  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param BusinessChainSearchTerms
   */
  public function setBusinessChainSearchTerms(BusinessChainSearchTerms $businessChainSearchTerms)
  {
    $this->businessChainSearchTerms = $businessChainSearchTerms;
  }
  /**
   * @return BusinessChainSearchTerms
   */
  public function getBusinessChainSearchTerms()
  {
    return $this->businessChainSearchTerms;
  }
  /**
   * @param GeoRegionSearchTerms
   */
  public function setGeoRegionSearchTerms(GeoRegionSearchTerms $geoRegionSearchTerms)
  {
    $this->geoRegionSearchTerms = $geoRegionSearchTerms;
  }
  /**
   * @return GeoRegionSearchTerms
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
  /**
   * @param PoiSearchTerms
   */
  public function setPoiSearchTerms(PoiSearchTerms $poiSearchTerms)
  {
    $this->poiSearchTerms = $poiSearchTerms;
  }
  /**
   * @return PoiSearchTerms
   */
  public function getPoiSearchTerms()
  {
    return $this->poiSearchTerms;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchTargetingOptionsRequest::class, 'Google_Service_DisplayVideo_SearchTargetingOptionsRequest');
