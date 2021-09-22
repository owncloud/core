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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2SearchResponse extends \Google\Collection
{
  protected $collection_key = 'results';
  public $attributionToken;
  public $correctedQuery;
  protected $facetsType = GoogleCloudRetailV2SearchResponseFacet::class;
  protected $facetsDataType = 'array';
  public $nextPageToken;
  protected $queryExpansionInfoType = GoogleCloudRetailV2SearchResponseQueryExpansionInfo::class;
  protected $queryExpansionInfoDataType = '';
  public $redirectUri;
  protected $resultsType = GoogleCloudRetailV2SearchResponseSearchResult::class;
  protected $resultsDataType = 'array';
  public $totalSize;

  public function setAttributionToken($attributionToken)
  {
    $this->attributionToken = $attributionToken;
  }
  public function getAttributionToken()
  {
    return $this->attributionToken;
  }
  public function setCorrectedQuery($correctedQuery)
  {
    $this->correctedQuery = $correctedQuery;
  }
  public function getCorrectedQuery()
  {
    return $this->correctedQuery;
  }
  /**
   * @param GoogleCloudRetailV2SearchResponseFacet[]
   */
  public function setFacets($facets)
  {
    $this->facets = $facets;
  }
  /**
   * @return GoogleCloudRetailV2SearchResponseFacet[]
   */
  public function getFacets()
  {
    return $this->facets;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param GoogleCloudRetailV2SearchResponseQueryExpansionInfo
   */
  public function setQueryExpansionInfo(GoogleCloudRetailV2SearchResponseQueryExpansionInfo $queryExpansionInfo)
  {
    $this->queryExpansionInfo = $queryExpansionInfo;
  }
  /**
   * @return GoogleCloudRetailV2SearchResponseQueryExpansionInfo
   */
  public function getQueryExpansionInfo()
  {
    return $this->queryExpansionInfo;
  }
  public function setRedirectUri($redirectUri)
  {
    $this->redirectUri = $redirectUri;
  }
  public function getRedirectUri()
  {
    return $this->redirectUri;
  }
  /**
   * @param GoogleCloudRetailV2SearchResponseSearchResult[]
   */
  public function setResults($results)
  {
    $this->results = $results;
  }
  /**
   * @return GoogleCloudRetailV2SearchResponseSearchResult[]
   */
  public function getResults()
  {
    return $this->results;
  }
  public function setTotalSize($totalSize)
  {
    $this->totalSize = $totalSize;
  }
  public function getTotalSize()
  {
    return $this->totalSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2SearchResponse::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2SearchResponse');
