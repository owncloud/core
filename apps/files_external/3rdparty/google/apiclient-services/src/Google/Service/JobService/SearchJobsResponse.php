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

class Google_Service_JobService_SearchJobsResponse extends Google_Collection
{
  protected $collection_key = 'matchingJobs';
  protected $appliedCommuteFilterType = 'Google_Service_JobService_CommutePreference';
  protected $appliedCommuteFilterDataType = '';
  protected $appliedJobLocationFiltersType = 'Google_Service_JobService_JobLocation';
  protected $appliedJobLocationFiltersDataType = 'array';
  public $estimatedTotalSize;
  protected $histogramResultsType = 'Google_Service_JobService_HistogramResults';
  protected $histogramResultsDataType = '';
  public $jobView;
  protected $matchingJobsType = 'Google_Service_JobService_MatchingJob';
  protected $matchingJobsDataType = 'array';
  protected $metadataType = 'Google_Service_JobService_ResponseMetadata';
  protected $metadataDataType = '';
  public $nextPageToken;
  public $numJobsFromBroadenedQuery;
  protected $spellResultType = 'Google_Service_JobService_SpellingCorrection';
  protected $spellResultDataType = '';
  public $totalSize;

  /**
   * @param Google_Service_JobService_CommutePreference
   */
  public function setAppliedCommuteFilter(Google_Service_JobService_CommutePreference $appliedCommuteFilter)
  {
    $this->appliedCommuteFilter = $appliedCommuteFilter;
  }
  /**
   * @return Google_Service_JobService_CommutePreference
   */
  public function getAppliedCommuteFilter()
  {
    return $this->appliedCommuteFilter;
  }
  /**
   * @param Google_Service_JobService_JobLocation
   */
  public function setAppliedJobLocationFilters($appliedJobLocationFilters)
  {
    $this->appliedJobLocationFilters = $appliedJobLocationFilters;
  }
  /**
   * @return Google_Service_JobService_JobLocation
   */
  public function getAppliedJobLocationFilters()
  {
    return $this->appliedJobLocationFilters;
  }
  public function setEstimatedTotalSize($estimatedTotalSize)
  {
    $this->estimatedTotalSize = $estimatedTotalSize;
  }
  public function getEstimatedTotalSize()
  {
    return $this->estimatedTotalSize;
  }
  /**
   * @param Google_Service_JobService_HistogramResults
   */
  public function setHistogramResults(Google_Service_JobService_HistogramResults $histogramResults)
  {
    $this->histogramResults = $histogramResults;
  }
  /**
   * @return Google_Service_JobService_HistogramResults
   */
  public function getHistogramResults()
  {
    return $this->histogramResults;
  }
  public function setJobView($jobView)
  {
    $this->jobView = $jobView;
  }
  public function getJobView()
  {
    return $this->jobView;
  }
  /**
   * @param Google_Service_JobService_MatchingJob
   */
  public function setMatchingJobs($matchingJobs)
  {
    $this->matchingJobs = $matchingJobs;
  }
  /**
   * @return Google_Service_JobService_MatchingJob
   */
  public function getMatchingJobs()
  {
    return $this->matchingJobs;
  }
  /**
   * @param Google_Service_JobService_ResponseMetadata
   */
  public function setMetadata(Google_Service_JobService_ResponseMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_JobService_ResponseMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setNumJobsFromBroadenedQuery($numJobsFromBroadenedQuery)
  {
    $this->numJobsFromBroadenedQuery = $numJobsFromBroadenedQuery;
  }
  public function getNumJobsFromBroadenedQuery()
  {
    return $this->numJobsFromBroadenedQuery;
  }
  /**
   * @param Google_Service_JobService_SpellingCorrection
   */
  public function setSpellResult(Google_Service_JobService_SpellingCorrection $spellResult)
  {
    $this->spellResult = $spellResult;
  }
  /**
   * @return Google_Service_JobService_SpellingCorrection
   */
  public function getSpellResult()
  {
    return $this->spellResult;
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
