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

class GoogleCloudRetailV2SearchRequest extends \Google\Collection
{
  protected $collection_key = 'variantRollupKeys';
  protected $boostSpecType = GoogleCloudRetailV2SearchRequestBoostSpec::class;
  protected $boostSpecDataType = '';
  public $branch;
  public $canonicalFilter;
  protected $dynamicFacetSpecType = GoogleCloudRetailV2SearchRequestDynamicFacetSpec::class;
  protected $dynamicFacetSpecDataType = '';
  protected $facetSpecsType = GoogleCloudRetailV2SearchRequestFacetSpec::class;
  protected $facetSpecsDataType = 'array';
  public $filter;
  public $offset;
  public $orderBy;
  public $pageCategories;
  public $pageSize;
  public $pageToken;
  public $query;
  protected $queryExpansionSpecType = GoogleCloudRetailV2SearchRequestQueryExpansionSpec::class;
  protected $queryExpansionSpecDataType = '';
  protected $userInfoType = GoogleCloudRetailV2UserInfo::class;
  protected $userInfoDataType = '';
  public $variantRollupKeys;
  public $visitorId;

  /**
   * @param GoogleCloudRetailV2SearchRequestBoostSpec
   */
  public function setBoostSpec(GoogleCloudRetailV2SearchRequestBoostSpec $boostSpec)
  {
    $this->boostSpec = $boostSpec;
  }
  /**
   * @return GoogleCloudRetailV2SearchRequestBoostSpec
   */
  public function getBoostSpec()
  {
    return $this->boostSpec;
  }
  public function setBranch($branch)
  {
    $this->branch = $branch;
  }
  public function getBranch()
  {
    return $this->branch;
  }
  public function setCanonicalFilter($canonicalFilter)
  {
    $this->canonicalFilter = $canonicalFilter;
  }
  public function getCanonicalFilter()
  {
    return $this->canonicalFilter;
  }
  /**
   * @param GoogleCloudRetailV2SearchRequestDynamicFacetSpec
   */
  public function setDynamicFacetSpec(GoogleCloudRetailV2SearchRequestDynamicFacetSpec $dynamicFacetSpec)
  {
    $this->dynamicFacetSpec = $dynamicFacetSpec;
  }
  /**
   * @return GoogleCloudRetailV2SearchRequestDynamicFacetSpec
   */
  public function getDynamicFacetSpec()
  {
    return $this->dynamicFacetSpec;
  }
  /**
   * @param GoogleCloudRetailV2SearchRequestFacetSpec[]
   */
  public function setFacetSpecs($facetSpecs)
  {
    $this->facetSpecs = $facetSpecs;
  }
  /**
   * @return GoogleCloudRetailV2SearchRequestFacetSpec[]
   */
  public function getFacetSpecs()
  {
    return $this->facetSpecs;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  public function getOffset()
  {
    return $this->offset;
  }
  public function setOrderBy($orderBy)
  {
    $this->orderBy = $orderBy;
  }
  public function getOrderBy()
  {
    return $this->orderBy;
  }
  public function setPageCategories($pageCategories)
  {
    $this->pageCategories = $pageCategories;
  }
  public function getPageCategories()
  {
    return $this->pageCategories;
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
  public function setQuery($query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param GoogleCloudRetailV2SearchRequestQueryExpansionSpec
   */
  public function setQueryExpansionSpec(GoogleCloudRetailV2SearchRequestQueryExpansionSpec $queryExpansionSpec)
  {
    $this->queryExpansionSpec = $queryExpansionSpec;
  }
  /**
   * @return GoogleCloudRetailV2SearchRequestQueryExpansionSpec
   */
  public function getQueryExpansionSpec()
  {
    return $this->queryExpansionSpec;
  }
  /**
   * @param GoogleCloudRetailV2UserInfo
   */
  public function setUserInfo(GoogleCloudRetailV2UserInfo $userInfo)
  {
    $this->userInfo = $userInfo;
  }
  /**
   * @return GoogleCloudRetailV2UserInfo
   */
  public function getUserInfo()
  {
    return $this->userInfo;
  }
  public function setVariantRollupKeys($variantRollupKeys)
  {
    $this->variantRollupKeys = $variantRollupKeys;
  }
  public function getVariantRollupKeys()
  {
    return $this->variantRollupKeys;
  }
  public function setVisitorId($visitorId)
  {
    $this->visitorId = $visitorId;
  }
  public function getVisitorId()
  {
    return $this->visitorId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2SearchRequest::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2SearchRequest');
