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
  /**
   * @var bool
   */
  public $disableKeywordMatch;
  /**
   * @var string
   */
  public $diversificationLevel;
  /**
   * @var bool
   */
  public $enableBroadening;
  protected $histogramQueriesType = HistogramQuery::class;
  protected $histogramQueriesDataType = 'array';
  protected $jobQueryType = JobQuery::class;
  protected $jobQueryDataType = '';
  /**
   * @var string
   */
  public $jobView;
  /**
   * @var string
   */
  public $keywordMatchMode;
  /**
   * @var int
   */
  public $maxPageSize;
  /**
   * @var int
   */
  public $offset;
  /**
   * @var string
   */
  public $orderBy;
  /**
   * @var string
   */
  public $pageToken;
  protected $requestMetadataType = RequestMetadata::class;
  protected $requestMetadataDataType = '';
  /**
   * @var string
   */
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
  /**
   * @param bool
   */
  public function setDisableKeywordMatch($disableKeywordMatch)
  {
    $this->disableKeywordMatch = $disableKeywordMatch;
  }
  /**
   * @return bool
   */
  public function getDisableKeywordMatch()
  {
    return $this->disableKeywordMatch;
  }
  /**
   * @param string
   */
  public function setDiversificationLevel($diversificationLevel)
  {
    $this->diversificationLevel = $diversificationLevel;
  }
  /**
   * @return string
   */
  public function getDiversificationLevel()
  {
    return $this->diversificationLevel;
  }
  /**
   * @param bool
   */
  public function setEnableBroadening($enableBroadening)
  {
    $this->enableBroadening = $enableBroadening;
  }
  /**
   * @return bool
   */
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
  /**
   * @param string
   */
  public function setJobView($jobView)
  {
    $this->jobView = $jobView;
  }
  /**
   * @return string
   */
  public function getJobView()
  {
    return $this->jobView;
  }
  /**
   * @param string
   */
  public function setKeywordMatchMode($keywordMatchMode)
  {
    $this->keywordMatchMode = $keywordMatchMode;
  }
  /**
   * @return string
   */
  public function getKeywordMatchMode()
  {
    return $this->keywordMatchMode;
  }
  /**
   * @param int
   */
  public function setMaxPageSize($maxPageSize)
  {
    $this->maxPageSize = $maxPageSize;
  }
  /**
   * @return int
   */
  public function getMaxPageSize()
  {
    return $this->maxPageSize;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchJobsRequest::class, 'Google_Service_CloudTalentSolution_SearchJobsRequest');
