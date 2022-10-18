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

class RepositoryWebrefReferencePageScores extends \Google\Model
{
  /**
   * @var float
   */
  public $bookScore;
  /**
   * @var float
   */
  public $explainedNormalizedTopicality;
  /**
   * @var float
   */
  public $firstScore;
  /**
   * @var bool
   */
  public $hasSpecialLinks;
  /**
   * @var float
   */
  public $medianMentionScore;
  /**
   * @var float
   */
  public $navboostCoverage;
  /**
   * @var float
   */
  public $referencePageScore;
  /**
   * @var float
   */
  public $referencePageSelectionScore;
  /**
   * @var bool
   */
  public $selected;
  /**
   * @var float
   */
  public $singleTopicness;
  /**
   * @var float
   */
  public $singleTopicnessV2;
  /**
   * @var float
   */
  public $titleCoverage;
  /**
   * @var float
   */
  public $totalSum;

  /**
   * @param float
   */
  public function setBookScore($bookScore)
  {
    $this->bookScore = $bookScore;
  }
  /**
   * @return float
   */
  public function getBookScore()
  {
    return $this->bookScore;
  }
  /**
   * @param float
   */
  public function setExplainedNormalizedTopicality($explainedNormalizedTopicality)
  {
    $this->explainedNormalizedTopicality = $explainedNormalizedTopicality;
  }
  /**
   * @return float
   */
  public function getExplainedNormalizedTopicality()
  {
    return $this->explainedNormalizedTopicality;
  }
  /**
   * @param float
   */
  public function setFirstScore($firstScore)
  {
    $this->firstScore = $firstScore;
  }
  /**
   * @return float
   */
  public function getFirstScore()
  {
    return $this->firstScore;
  }
  /**
   * @param bool
   */
  public function setHasSpecialLinks($hasSpecialLinks)
  {
    $this->hasSpecialLinks = $hasSpecialLinks;
  }
  /**
   * @return bool
   */
  public function getHasSpecialLinks()
  {
    return $this->hasSpecialLinks;
  }
  /**
   * @param float
   */
  public function setMedianMentionScore($medianMentionScore)
  {
    $this->medianMentionScore = $medianMentionScore;
  }
  /**
   * @return float
   */
  public function getMedianMentionScore()
  {
    return $this->medianMentionScore;
  }
  /**
   * @param float
   */
  public function setNavboostCoverage($navboostCoverage)
  {
    $this->navboostCoverage = $navboostCoverage;
  }
  /**
   * @return float
   */
  public function getNavboostCoverage()
  {
    return $this->navboostCoverage;
  }
  /**
   * @param float
   */
  public function setReferencePageScore($referencePageScore)
  {
    $this->referencePageScore = $referencePageScore;
  }
  /**
   * @return float
   */
  public function getReferencePageScore()
  {
    return $this->referencePageScore;
  }
  /**
   * @param float
   */
  public function setReferencePageSelectionScore($referencePageSelectionScore)
  {
    $this->referencePageSelectionScore = $referencePageSelectionScore;
  }
  /**
   * @return float
   */
  public function getReferencePageSelectionScore()
  {
    return $this->referencePageSelectionScore;
  }
  /**
   * @param bool
   */
  public function setSelected($selected)
  {
    $this->selected = $selected;
  }
  /**
   * @return bool
   */
  public function getSelected()
  {
    return $this->selected;
  }
  /**
   * @param float
   */
  public function setSingleTopicness($singleTopicness)
  {
    $this->singleTopicness = $singleTopicness;
  }
  /**
   * @return float
   */
  public function getSingleTopicness()
  {
    return $this->singleTopicness;
  }
  /**
   * @param float
   */
  public function setSingleTopicnessV2($singleTopicnessV2)
  {
    $this->singleTopicnessV2 = $singleTopicnessV2;
  }
  /**
   * @return float
   */
  public function getSingleTopicnessV2()
  {
    return $this->singleTopicnessV2;
  }
  /**
   * @param float
   */
  public function setTitleCoverage($titleCoverage)
  {
    $this->titleCoverage = $titleCoverage;
  }
  /**
   * @return float
   */
  public function getTitleCoverage()
  {
    return $this->titleCoverage;
  }
  /**
   * @param float
   */
  public function setTotalSum($totalSum)
  {
    $this->totalSum = $totalSum;
  }
  /**
   * @return float
   */
  public function getTotalSum()
  {
    return $this->totalSum;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefReferencePageScores::class, 'Google_Service_Contentwarehouse_RepositoryWebrefReferencePageScores');
