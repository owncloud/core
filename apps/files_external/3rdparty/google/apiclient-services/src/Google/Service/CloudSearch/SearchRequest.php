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

class Google_Service_CloudSearch_SearchRequest extends Google_Collection
{
  protected $collection_key = 'facetOptions';
  protected $contextAttributesType = 'Google_Service_CloudSearch_ContextAttribute';
  protected $contextAttributesDataType = 'array';
  protected $dataSourceRestrictionsType = 'Google_Service_CloudSearch_DataSourceRestriction';
  protected $dataSourceRestrictionsDataType = 'array';
  protected $facetOptionsType = 'Google_Service_CloudSearch_FacetOptions';
  protected $facetOptionsDataType = 'array';
  public $pageSize;
  public $query;
  protected $queryInterpretationOptionsType = 'Google_Service_CloudSearch_QueryInterpretationOptions';
  protected $queryInterpretationOptionsDataType = '';
  protected $requestOptionsType = 'Google_Service_CloudSearch_RequestOptions';
  protected $requestOptionsDataType = '';
  protected $sortOptionsType = 'Google_Service_CloudSearch_SortOptions';
  protected $sortOptionsDataType = '';
  public $start;

  /**
   * @param Google_Service_CloudSearch_ContextAttribute[]
   */
  public function setContextAttributes($contextAttributes)
  {
    $this->contextAttributes = $contextAttributes;
  }
  /**
   * @return Google_Service_CloudSearch_ContextAttribute[]
   */
  public function getContextAttributes()
  {
    return $this->contextAttributes;
  }
  /**
   * @param Google_Service_CloudSearch_DataSourceRestriction[]
   */
  public function setDataSourceRestrictions($dataSourceRestrictions)
  {
    $this->dataSourceRestrictions = $dataSourceRestrictions;
  }
  /**
   * @return Google_Service_CloudSearch_DataSourceRestriction[]
   */
  public function getDataSourceRestrictions()
  {
    return $this->dataSourceRestrictions;
  }
  /**
   * @param Google_Service_CloudSearch_FacetOptions[]
   */
  public function setFacetOptions($facetOptions)
  {
    $this->facetOptions = $facetOptions;
  }
  /**
   * @return Google_Service_CloudSearch_FacetOptions[]
   */
  public function getFacetOptions()
  {
    return $this->facetOptions;
  }
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  public function getPageSize()
  {
    return $this->pageSize;
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
   * @param Google_Service_CloudSearch_QueryInterpretationOptions
   */
  public function setQueryInterpretationOptions(Google_Service_CloudSearch_QueryInterpretationOptions $queryInterpretationOptions)
  {
    $this->queryInterpretationOptions = $queryInterpretationOptions;
  }
  /**
   * @return Google_Service_CloudSearch_QueryInterpretationOptions
   */
  public function getQueryInterpretationOptions()
  {
    return $this->queryInterpretationOptions;
  }
  /**
   * @param Google_Service_CloudSearch_RequestOptions
   */
  public function setRequestOptions(Google_Service_CloudSearch_RequestOptions $requestOptions)
  {
    $this->requestOptions = $requestOptions;
  }
  /**
   * @return Google_Service_CloudSearch_RequestOptions
   */
  public function getRequestOptions()
  {
    return $this->requestOptions;
  }
  /**
   * @param Google_Service_CloudSearch_SortOptions
   */
  public function setSortOptions(Google_Service_CloudSearch_SortOptions $sortOptions)
  {
    $this->sortOptions = $sortOptions;
  }
  /**
   * @return Google_Service_CloudSearch_SortOptions
   */
  public function getSortOptions()
  {
    return $this->sortOptions;
  }
  public function setStart($start)
  {
    $this->start = $start;
  }
  public function getStart()
  {
    return $this->start;
  }
}
