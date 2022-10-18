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

namespace Google\Service\Contentwarehouse;

class GoogleCloudContentwarehouseV1DocumentQuery extends \Google\Collection
{
  protected $collection_key = 'timeFilters';
  /**
   * @var string
   */
  public $customPropertyFilter;
  /**
   * @var string[]
   */
  public $documentCreatorFilter;
  /**
   * @var string[]
   */
  public $documentSchemaNames;
  protected $fileTypeFilterType = GoogleCloudContentwarehouseV1FileTypeFilter::class;
  protected $fileTypeFilterDataType = '';
  /**
   * @var string
   */
  public $folderNameFilter;
  /**
   * @var bool
   */
  public $isNlQuery;
  protected $propertyFilterType = GoogleCloudContentwarehouseV1PropertyFilter::class;
  protected $propertyFilterDataType = 'array';
  /**
   * @var string
   */
  public $query;
  /**
   * @var string[]
   */
  public $queryContext;
  protected $timeFiltersType = GoogleCloudContentwarehouseV1TimeFilter::class;
  protected $timeFiltersDataType = 'array';

  /**
   * @param string
   */
  public function setCustomPropertyFilter($customPropertyFilter)
  {
    $this->customPropertyFilter = $customPropertyFilter;
  }
  /**
   * @return string
   */
  public function getCustomPropertyFilter()
  {
    return $this->customPropertyFilter;
  }
  /**
   * @param string[]
   */
  public function setDocumentCreatorFilter($documentCreatorFilter)
  {
    $this->documentCreatorFilter = $documentCreatorFilter;
  }
  /**
   * @return string[]
   */
  public function getDocumentCreatorFilter()
  {
    return $this->documentCreatorFilter;
  }
  /**
   * @param string[]
   */
  public function setDocumentSchemaNames($documentSchemaNames)
  {
    $this->documentSchemaNames = $documentSchemaNames;
  }
  /**
   * @return string[]
   */
  public function getDocumentSchemaNames()
  {
    return $this->documentSchemaNames;
  }
  /**
   * @param GoogleCloudContentwarehouseV1FileTypeFilter
   */
  public function setFileTypeFilter(GoogleCloudContentwarehouseV1FileTypeFilter $fileTypeFilter)
  {
    $this->fileTypeFilter = $fileTypeFilter;
  }
  /**
   * @return GoogleCloudContentwarehouseV1FileTypeFilter
   */
  public function getFileTypeFilter()
  {
    return $this->fileTypeFilter;
  }
  /**
   * @param string
   */
  public function setFolderNameFilter($folderNameFilter)
  {
    $this->folderNameFilter = $folderNameFilter;
  }
  /**
   * @return string
   */
  public function getFolderNameFilter()
  {
    return $this->folderNameFilter;
  }
  /**
   * @param bool
   */
  public function setIsNlQuery($isNlQuery)
  {
    $this->isNlQuery = $isNlQuery;
  }
  /**
   * @return bool
   */
  public function getIsNlQuery()
  {
    return $this->isNlQuery;
  }
  /**
   * @param GoogleCloudContentwarehouseV1PropertyFilter[]
   */
  public function setPropertyFilter($propertyFilter)
  {
    $this->propertyFilter = $propertyFilter;
  }
  /**
   * @return GoogleCloudContentwarehouseV1PropertyFilter[]
   */
  public function getPropertyFilter()
  {
    return $this->propertyFilter;
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
   * @param string[]
   */
  public function setQueryContext($queryContext)
  {
    $this->queryContext = $queryContext;
  }
  /**
   * @return string[]
   */
  public function getQueryContext()
  {
    return $this->queryContext;
  }
  /**
   * @param GoogleCloudContentwarehouseV1TimeFilter[]
   */
  public function setTimeFilters($timeFilters)
  {
    $this->timeFilters = $timeFilters;
  }
  /**
   * @return GoogleCloudContentwarehouseV1TimeFilter[]
   */
  public function getTimeFilters()
  {
    return $this->timeFilters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1DocumentQuery::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1DocumentQuery');
