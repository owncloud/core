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

namespace Google\Service\CloudSearch;

class SearchRequest extends \Google\Collection
{
  protected $collection_key = 'facetOptions';
  protected $contextAttributesType = ContextAttribute::class;
  protected $contextAttributesDataType = 'array';
  protected $dataSourceRestrictionsType = DataSourceRestriction::class;
  protected $dataSourceRestrictionsDataType = 'array';
  protected $facetOptionsType = FacetOptions::class;
  protected $facetOptionsDataType = 'array';
  /**
   * @var int
   */
  public $pageSize;
  /**
   * @var string
   */
  public $query;
  protected $queryInterpretationOptionsType = QueryInterpretationOptions::class;
  protected $queryInterpretationOptionsDataType = '';
  protected $requestOptionsType = RequestOptions::class;
  protected $requestOptionsDataType = '';
  protected $sortOptionsType = SortOptions::class;
  protected $sortOptionsDataType = '';
  /**
   * @var int
   */
  public $start;

  /**
   * @param ContextAttribute[]
   */
  public function setContextAttributes($contextAttributes)
  {
    $this->contextAttributes = $contextAttributes;
  }
  /**
   * @return ContextAttribute[]
   */
  public function getContextAttributes()
  {
    return $this->contextAttributes;
  }
  /**
   * @param DataSourceRestriction[]
   */
  public function setDataSourceRestrictions($dataSourceRestrictions)
  {
    $this->dataSourceRestrictions = $dataSourceRestrictions;
  }
  /**
   * @return DataSourceRestriction[]
   */
  public function getDataSourceRestrictions()
  {
    return $this->dataSourceRestrictions;
  }
  /**
   * @param FacetOptions[]
   */
  public function setFacetOptions($facetOptions)
  {
    $this->facetOptions = $facetOptions;
  }
  /**
   * @return FacetOptions[]
   */
  public function getFacetOptions()
  {
    return $this->facetOptions;
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
   * @param QueryInterpretationOptions
   */
  public function setQueryInterpretationOptions(QueryInterpretationOptions $queryInterpretationOptions)
  {
    $this->queryInterpretationOptions = $queryInterpretationOptions;
  }
  /**
   * @return QueryInterpretationOptions
   */
  public function getQueryInterpretationOptions()
  {
    return $this->queryInterpretationOptions;
  }
  /**
   * @param RequestOptions
   */
  public function setRequestOptions(RequestOptions $requestOptions)
  {
    $this->requestOptions = $requestOptions;
  }
  /**
   * @return RequestOptions
   */
  public function getRequestOptions()
  {
    return $this->requestOptions;
  }
  /**
   * @param SortOptions
   */
  public function setSortOptions(SortOptions $sortOptions)
  {
    $this->sortOptions = $sortOptions;
  }
  /**
   * @return SortOptions
   */
  public function getSortOptions()
  {
    return $this->sortOptions;
  }
  /**
   * @param int
   */
  public function setStart($start)
  {
    $this->start = $start;
  }
  /**
   * @return int
   */
  public function getStart()
  {
    return $this->start;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchRequest::class, 'Google_Service_CloudSearch_SearchRequest');
