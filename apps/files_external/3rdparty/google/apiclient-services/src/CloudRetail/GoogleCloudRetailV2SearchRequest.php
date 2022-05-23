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
  /**
   * @var string
   */
  public $branch;
  /**
   * @var string
   */
  public $canonicalFilter;
  protected $dynamicFacetSpecType = GoogleCloudRetailV2SearchRequestDynamicFacetSpec::class;
  protected $dynamicFacetSpecDataType = '';
  protected $facetSpecsType = GoogleCloudRetailV2SearchRequestFacetSpec::class;
  protected $facetSpecsDataType = 'array';
  /**
   * @var string
   */
  public $filter;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var int
   */
  public $offset;
  /**
   * @var string
   */
  public $orderBy;
  /**
   * @var string[]
   */
  public $pageCategories;
  /**
   * @var int
   */
  public $pageSize;
  /**
   * @var string
   */
  public $pageToken;
  protected $personalizationSpecType = GoogleCloudRetailV2SearchRequestPersonalizationSpec::class;
  protected $personalizationSpecDataType = '';
  /**
   * @var string
   */
  public $query;
  protected $queryExpansionSpecType = GoogleCloudRetailV2SearchRequestQueryExpansionSpec::class;
  protected $queryExpansionSpecDataType = '';
  /**
   * @var string
   */
  public $searchMode;
  protected $spellCorrectionSpecType = GoogleCloudRetailV2SearchRequestSpellCorrectionSpec::class;
  protected $spellCorrectionSpecDataType = '';
  protected $userInfoType = GoogleCloudRetailV2UserInfo::class;
  protected $userInfoDataType = '';
  /**
   * @var string[]
   */
  public $variantRollupKeys;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setBranch($branch)
  {
    $this->branch = $branch;
  }
  /**
   * @return string
   */
  public function getBranch()
  {
    return $this->branch;
  }
  /**
   * @param string
   */
  public function setCanonicalFilter($canonicalFilter)
  {
    $this->canonicalFilter = $canonicalFilter;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return string
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param int
   */
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return int
   */
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param string
   */
  public function setOrderBy($orderBy)
  {
    $this->orderBy = $orderBy;
  }
  /**
   * @return string
   */
  public function getOrderBy()
  {
    return $this->orderBy;
  }
  /**
   * @param string[]
   */
  public function setPageCategories($pageCategories)
  {
    $this->pageCategories = $pageCategories;
  }
  /**
   * @return string[]
   */
  public function getPageCategories()
  {
    return $this->pageCategories;
  }
  /**
   * @param int
   */
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  /**
   * @return int
   */
  public function getPageSize()
  {
    return $this->pageSize;
  }
  /**
   * @param string
   */
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  /**
   * @return string
   */
  public function getPageToken()
  {
    return $this->pageToken;
  }
  /**
   * @param GoogleCloudRetailV2SearchRequestPersonalizationSpec
   */
  public function setPersonalizationSpec(GoogleCloudRetailV2SearchRequestPersonalizationSpec $personalizationSpec)
  {
    $this->personalizationSpec = $personalizationSpec;
  }
  /**
   * @return GoogleCloudRetailV2SearchRequestPersonalizationSpec
   */
  public function getPersonalizationSpec()
  {
    return $this->personalizationSpec;
  }
  /**
   * @param string
   */
  public function setQuery($query)
  {
    $this->query = $query;
  }
  /**
   * @return string
   */
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
   * @param string
   */
  public function setSearchMode($searchMode)
  {
    $this->searchMode = $searchMode;
  }
  /**
   * @return string
   */
  public function getSearchMode()
  {
    return $this->searchMode;
  }
  /**
   * @param GoogleCloudRetailV2SearchRequestSpellCorrectionSpec
   */
  public function setSpellCorrectionSpec(GoogleCloudRetailV2SearchRequestSpellCorrectionSpec $spellCorrectionSpec)
  {
    $this->spellCorrectionSpec = $spellCorrectionSpec;
  }
  /**
   * @return GoogleCloudRetailV2SearchRequestSpellCorrectionSpec
   */
  public function getSpellCorrectionSpec()
  {
    return $this->spellCorrectionSpec;
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
  /**
   * @param string[]
   */
  public function setVariantRollupKeys($variantRollupKeys)
  {
    $this->variantRollupKeys = $variantRollupKeys;
  }
  /**
   * @return string[]
   */
  public function getVariantRollupKeys()
  {
    return $this->variantRollupKeys;
  }
  /**
   * @param string
   */
  public function setVisitorId($visitorId)
  {
    $this->visitorId = $visitorId;
  }
  /**
   * @return string
   */
  public function getVisitorId()
  {
    return $this->visitorId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2SearchRequest::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2SearchRequest');
