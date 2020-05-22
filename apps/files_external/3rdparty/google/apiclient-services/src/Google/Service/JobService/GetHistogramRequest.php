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

class Google_Service_JobService_GetHistogramRequest extends Google_Collection
{
  protected $collection_key = 'searchTypes';
  public $allowBroadening;
  protected $filtersType = 'Google_Service_JobService_JobFilters';
  protected $filtersDataType = '';
  protected $queryType = 'Google_Service_JobService_JobQuery';
  protected $queryDataType = '';
  protected $requestMetadataType = 'Google_Service_JobService_RequestMetadata';
  protected $requestMetadataDataType = '';
  public $searchTypes;

  public function setAllowBroadening($allowBroadening)
  {
    $this->allowBroadening = $allowBroadening;
  }
  public function getAllowBroadening()
  {
    return $this->allowBroadening;
  }
  /**
   * @param Google_Service_JobService_JobFilters
   */
  public function setFilters(Google_Service_JobService_JobFilters $filters)
  {
    $this->filters = $filters;
  }
  /**
   * @return Google_Service_JobService_JobFilters
   */
  public function getFilters()
  {
    return $this->filters;
  }
  /**
   * @param Google_Service_JobService_JobQuery
   */
  public function setQuery(Google_Service_JobService_JobQuery $query)
  {
    $this->query = $query;
  }
  /**
   * @return Google_Service_JobService_JobQuery
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param Google_Service_JobService_RequestMetadata
   */
  public function setRequestMetadata(Google_Service_JobService_RequestMetadata $requestMetadata)
  {
    $this->requestMetadata = $requestMetadata;
  }
  /**
   * @return Google_Service_JobService_RequestMetadata
   */
  public function getRequestMetadata()
  {
    return $this->requestMetadata;
  }
  public function setSearchTypes($searchTypes)
  {
    $this->searchTypes = $searchTypes;
  }
  public function getSearchTypes()
  {
    return $this->searchTypes;
  }
}
