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

class Google_Service_CloudTalentSolution_SearchJobsResponse extends Google_Collection
{
  protected $collection_key = 'matchingJobs';
  public $broadenedQueryJobsCount;
  public $estimatedTotalSize;
  protected $histogramResultsType = 'Google_Service_CloudTalentSolution_HistogramResults';
  protected $histogramResultsDataType = '';
  protected $locationFiltersType = 'Google_Service_CloudTalentSolution_Location';
  protected $locationFiltersDataType = 'array';
  protected $matchingJobsType = 'Google_Service_CloudTalentSolution_MatchingJob';
  protected $matchingJobsDataType = 'array';
  protected $metadataType = 'Google_Service_CloudTalentSolution_ResponseMetadata';
  protected $metadataDataType = '';
  public $nextPageToken;
  protected $spellCorrectionType = 'Google_Service_CloudTalentSolution_SpellingCorrection';
  protected $spellCorrectionDataType = '';
  public $totalSize;

  public function setBroadenedQueryJobsCount($broadenedQueryJobsCount)
  {
    $this->broadenedQueryJobsCount = $broadenedQueryJobsCount;
  }
  public function getBroadenedQueryJobsCount()
  {
    return $this->broadenedQueryJobsCount;
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
   * @param Google_Service_CloudTalentSolution_HistogramResults
   */
  public function setHistogramResults(Google_Service_CloudTalentSolution_HistogramResults $histogramResults)
  {
    $this->histogramResults = $histogramResults;
  }
  /**
   * @return Google_Service_CloudTalentSolution_HistogramResults
   */
  public function getHistogramResults()
  {
    return $this->histogramResults;
  }
  /**
   * @param Google_Service_CloudTalentSolution_Location
   */
  public function setLocationFilters($locationFilters)
  {
    $this->locationFilters = $locationFilters;
  }
  /**
   * @return Google_Service_CloudTalentSolution_Location
   */
  public function getLocationFilters()
  {
    return $this->locationFilters;
  }
  /**
   * @param Google_Service_CloudTalentSolution_MatchingJob
   */
  public function setMatchingJobs($matchingJobs)
  {
    $this->matchingJobs = $matchingJobs;
  }
  /**
   * @return Google_Service_CloudTalentSolution_MatchingJob
   */
  public function getMatchingJobs()
  {
    return $this->matchingJobs;
  }
  /**
   * @param Google_Service_CloudTalentSolution_ResponseMetadata
   */
  public function setMetadata(Google_Service_CloudTalentSolution_ResponseMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_CloudTalentSolution_ResponseMetadata
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
  /**
   * @param Google_Service_CloudTalentSolution_SpellingCorrection
   */
  public function setSpellCorrection(Google_Service_CloudTalentSolution_SpellingCorrection $spellCorrection)
  {
    $this->spellCorrection = $spellCorrection;
  }
  /**
   * @return Google_Service_CloudTalentSolution_SpellingCorrection
   */
  public function getSpellCorrection()
  {
    return $this->spellCorrection;
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
