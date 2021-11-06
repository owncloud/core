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

namespace Google\Service\CloudTalentSolution;

class SearchJobsRequest extends \Google\Collection
{
  protected $collection_key = 'histogramQueries';
  protected $customRankingInfoType = CustomRankingInfo::class;
  protected $customRankingInfoDataType = '';
  public $disableKeywordMatch;
  public $diversificationLevel;
  public $enableBroadening;
  protected $histogramQueriesType = HistogramQuery::class;
  protected $histogramQueriesDataType = 'array';
  protected $jobQueryType = JobQuery::class;
  protected $jobQueryDataType = '';
  public $jobView;
  public $keywordMatchMode;
  public $maxPageSize;
  public $offset;
  public $orderBy;
  public $pageToken;
  protected $requestMetadataType = RequestMetadata::class;
  protected $requestMetadataDataType = '';
  public $searchMode;

  /**
   * @param CustomRankingInfo
   */
  public function setCustomRankingInfo(CustomRankingInfo $customRankingInfo)
  {
    $this->customRankingInfo = $customRankingInfo;
  }
  /**
   * @return CustomRankingInfo
   */
  public function getCustomRankingInfo()
  {
    return $this->customRankingInfo;
  }
  public function setDisableKeywordMatch($disableKeywordMatch)
  {
    $this->disableKeywordMatch = $disableKeywordMatch;
  }
  public function getDisableKeywordMatch()
  {
    return $this->disableKeywordMatch;
  }
  public function setDiversificationLevel($diversificationLevel)
  {
    $this->diversificationLevel = $diversificationLevel;
  }
  public function getDiversificationLevel()
  {
    return $this->diversificationLevel;
  }
  public function setEnableBroadening($enableBroadening)
  {
    $this->enableBroadening = $enableBroadening;
  }
  public function getEnableBroadening()
  {
    return $this->enableBroadening;
  }
  /**
   * @param HistogramQuery[]
   */
  public function setHistogramQueries($histogramQueries)
  {
    $this->histogramQueries = $histogramQueries;
  }
  /**
   * @return HistogramQuery[]
   */
  public function getHistogramQueries()
  {
    return $this->histogramQueries;
  }
  /**
   * @param JobQuery
   */
  public function setJobQuery(JobQuery $jobQuery)
  {
    $this->jobQuery = $jobQuery;
  }
  /**
   * @return JobQuery
   */
  public function getJobQuery()
  {
    return $this->jobQuery;
  }
  public function setJobView($jobView)
  {
    $this->jobView = $jobView;
  }
  public function getJobView()
  {
    return $this->jobView;
  }
  public function setKeywordMatchMode($keywordMatchMode)
  {
    $this->keywordMatchMode = $keywordMatchMode;
  }
  public function getKeywordMatchMode()
  {
    return $this->keywordMatchMode;
  }
  public function setMaxPageSize($maxPageSize)
  {
    $this->maxPageSize = $maxPageSize;
  }
  public function getMaxPageSize()
  {
    return $this->maxPageSize;
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
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  public function getPageToken()
  {
    return $this->pageToken;
  }
  /**
   * @param RequestMetadata
   */
  public function setRequestMetadata(RequestMetadata $requestMetadata)
  {
    $this->requestMetadata = $requestMetadata;
  }
  /**
   * @return RequestMetadata
   */
  public function getRequestMetadata()
  {
    return $this->requestMetadata;
  }
  public function setSearchMode($searchMode)
  {
    $this->searchMode = $searchMode;
  }
  public function getSearchMode()
  {
    return $this->searchMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchJobsRequest::class, 'Google_Service_CloudTalentSolution_SearchJobsRequest');
