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

class Google_Service_CloudTalentSolution_SearchJobsRequest extends Google_Collection
{
  protected $collection_key = 'histogramQueries';
  protected $customRankingInfoType = 'Google_Service_CloudTalentSolution_CustomRankingInfo';
  protected $customRankingInfoDataType = '';
  public $disableKeywordMatch;
  public $diversificationLevel;
  public $enableBroadening;
  protected $histogramQueriesType = 'Google_Service_CloudTalentSolution_HistogramQuery';
  protected $histogramQueriesDataType = 'array';
  protected $jobQueryType = 'Google_Service_CloudTalentSolution_JobQuery';
  protected $jobQueryDataType = '';
  public $jobView;
  public $maxPageSize;
  public $offset;
  public $orderBy;
  public $pageToken;
  protected $requestMetadataType = 'Google_Service_CloudTalentSolution_RequestMetadata';
  protected $requestMetadataDataType = '';
  public $searchMode;

  /**
   * @param Google_Service_CloudTalentSolution_CustomRankingInfo
   */
  public function setCustomRankingInfo(Google_Service_CloudTalentSolution_CustomRankingInfo $customRankingInfo)
  {
    $this->customRankingInfo = $customRankingInfo;
  }
  /**
   * @return Google_Service_CloudTalentSolution_CustomRankingInfo
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
   * @param Google_Service_CloudTalentSolution_HistogramQuery[]
   */
  public function setHistogramQueries($histogramQueries)
  {
    $this->histogramQueries = $histogramQueries;
  }
  /**
   * @return Google_Service_CloudTalentSolution_HistogramQuery[]
   */
  public function getHistogramQueries()
  {
    return $this->histogramQueries;
  }
  /**
   * @param Google_Service_CloudTalentSolution_JobQuery
   */
  public function setJobQuery(Google_Service_CloudTalentSolution_JobQuery $jobQuery)
  {
    $this->jobQuery = $jobQuery;
  }
  /**
   * @return Google_Service_CloudTalentSolution_JobQuery
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
   * @param Google_Service_CloudTalentSolution_RequestMetadata
   */
  public function setRequestMetadata(Google_Service_CloudTalentSolution_RequestMetadata $requestMetadata)
  {
    $this->requestMetadata = $requestMetadata;
  }
  /**
   * @return Google_Service_CloudTalentSolution_RequestMetadata
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
