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

class RepositoryWebrefAnnotationStatsPerType extends \Google\Model
{
  /**
   * @var float
   */
  public $avgOpenWorld;
  /**
   * @var float
   */
  public $avgOpenWorldCap;
  /**
   * @var float
   */
  public $avgOpenWorldUncap;
  /**
   * @var string
   */
  public $numRangesWithCandidates;
  /**
   * @var string
   */
  public $numRangesWithCandidatesCap;
  /**
   * @var string
   */
  public $numRangesWithCandidatesUncap;
  /**
   * @var string
   */
  public $tokenType;

  /**
   * @param float
   */
  public function setAvgOpenWorld($avgOpenWorld)
  {
    $this->avgOpenWorld = $avgOpenWorld;
  }
  /**
   * @return float
   */
  public function getAvgOpenWorld()
  {
    return $this->avgOpenWorld;
  }
  /**
   * @param float
   */
  public function setAvgOpenWorldCap($avgOpenWorldCap)
  {
    $this->avgOpenWorldCap = $avgOpenWorldCap;
  }
  /**
   * @return float
   */
  public function getAvgOpenWorldCap()
  {
    return $this->avgOpenWorldCap;
  }
  /**
   * @param float
   */
  public function setAvgOpenWorldUncap($avgOpenWorldUncap)
  {
    $this->avgOpenWorldUncap = $avgOpenWorldUncap;
  }
  /**
   * @return float
   */
  public function getAvgOpenWorldUncap()
  {
    return $this->avgOpenWorldUncap;
  }
  /**
   * @param string
   */
  public function setNumRangesWithCandidates($numRangesWithCandidates)
  {
    $this->numRangesWithCandidates = $numRangesWithCandidates;
  }
  /**
   * @return string
   */
  public function getNumRangesWithCandidates()
  {
    return $this->numRangesWithCandidates;
  }
  /**
   * @param string
   */
  public function setNumRangesWithCandidatesCap($numRangesWithCandidatesCap)
  {
    $this->numRangesWithCandidatesCap = $numRangesWithCandidatesCap;
  }
  /**
   * @return string
   */
  public function getNumRangesWithCandidatesCap()
  {
    return $this->numRangesWithCandidatesCap;
  }
  /**
   * @param string
   */
  public function setNumRangesWithCandidatesUncap($numRangesWithCandidatesUncap)
  {
    $this->numRangesWithCandidatesUncap = $numRangesWithCandidatesUncap;
  }
  /**
   * @return string
   */
  public function getNumRangesWithCandidatesUncap()
  {
    return $this->numRangesWithCandidatesUncap;
  }
  /**
   * @param string
   */
  public function setTokenType($tokenType)
  {
    $this->tokenType = $tokenType;
  }
  /**
   * @return string
   */
  public function getTokenType()
  {
    return $this->tokenType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefAnnotationStatsPerType::class, 'Google_Service_Contentwarehouse_RepositoryWebrefAnnotationStatsPerType');
