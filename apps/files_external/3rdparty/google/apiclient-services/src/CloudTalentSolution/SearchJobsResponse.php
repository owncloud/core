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

class SearchJobsResponse extends \Google\Collection
{
  protected $collection_key = 'matchingJobs';
  /**
   * @var int
   */
  public $broadenedQueryJobsCount;
  protected $histogramQueryResultsType = HistogramQueryResult::class;
  protected $histogramQueryResultsDataType = 'array';
  protected $locationFiltersType = Location::class;
  protected $locationFiltersDataType = 'array';
  protected $matchingJobsType = MatchingJob::class;
  protected $matchingJobsDataType = 'array';
  protected $metadataType = ResponseMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $nextPageToken;
  protected $spellCorrectionType = SpellingCorrection::class;
  protected $spellCorrectionDataType = '';
  /**
   * @var int
   */
  public $totalSize;

  /**
   * @param int
   */
  public function setBroadenedQueryJobsCount($broadenedQueryJobsCount)
  {
    $this->broadenedQueryJobsCount = $broadenedQueryJobsCount;
  }
  /**
   * @return int
   */
  public function getBroadenedQueryJobsCount()
  {
    return $this->broadenedQueryJobsCount;
  }
  /**
   * @param HistogramQueryResult[]
   */
  public function setHistogramQueryResults($histogramQueryResults)
  {
    $this->histogramQueryResults = $histogramQueryResults;
  }
  /**
   * @return HistogramQueryResult[]
   */
  public function getHistogramQueryResults()
  {
    return $this->histogramQueryResults;
  }
  /**
   * @param Location[]
   */
  public function setLocationFilters($locationFilters)
  {
    $this->locationFilters = $locationFilters;
  }
  /**
   * @return Location[]
   */
  public function getLocationFilters()
  {
    return $this->locationFilters;
  }
  /**
   * @param MatchingJob[]
   */
  public function setMatchingJobs($matchingJobs)
  {
    $this->matchingJobs = $matchingJobs;
  }
  /**
   * @return MatchingJob[]
   */
  public function getMatchingJobs()
  {
    return $this->matchingJobs;
  }
  /**
   * @param ResponseMetadata
   */
  public function setMetadata(ResponseMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return ResponseMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param SpellingCorrection
   */
  public function setSpellCorrection(SpellingCorrection $spellCorrection)
  {
    $this->spellCorrection = $spellCorrection;
  }
  /**
   * @return SpellingCorrection
   */
  public function getSpellCorrection()
  {
    return $this->spellCorrection;
  }
  /**
   * @param int
   */
  public function setTotalSize($totalSize)
  {
    $this->totalSize = $totalSize;
  }
  /**
   * @return int
   */
  public function getTotalSize()
  {
    return $this->totalSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchJobsResponse::class, 'Google_Service_CloudTalentSolution_SearchJobsResponse');
