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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaListSearchAds360LinksResponse extends \Google\Collection
{
  protected $collection_key = 'searchAds360Links';
  /**
   * @var string
   */
  public $nextPageToken;
  protected $searchAds360LinksType = GoogleAnalyticsAdminV1alphaSearchAds360Link::class;
  protected $searchAds360LinksDataType = 'array';

  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaSearchAds360Link[]
   */
  public function setSearchAds360Links($searchAds360Links)
  {
    $this->searchAds360Links = $searchAds360Links;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaSearchAds360Link[]
   */
  public function getSearchAds360Links()
  {
    return $this->searchAds360Links;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaListSearchAds360LinksResponse::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListSearchAds360LinksResponse');
