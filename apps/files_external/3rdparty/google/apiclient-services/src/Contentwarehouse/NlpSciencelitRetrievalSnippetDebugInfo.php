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

class NlpSciencelitRetrievalSnippetDebugInfo extends \Google\Collection
{
  protected $collection_key = 'goldHighlightSentenceIndices';
  /**
   * @var int[]
   */
  public $goldHighlightSentenceIndices;
  /**
   * @var float[]
   */
  public $highlightIdxToOverlap;
  /**
   * @var float[]
   */
  public $highlightIdxToSentenceOverlap;
  /**
   * @var bool
   */
  public $isGold;
  /**
   * @var int
   */
  public $offsetWithinSection;
  /**
   * @var int
   */
  public $sectionIndex;
  /**
   * @var float
   */
  public $sectionIrScore;
  /**
   * @var float
   */
  public $snippetBleuScore;

  /**
   * @param int[]
   */
  public function setGoldHighlightSentenceIndices($goldHighlightSentenceIndices)
  {
    $this->goldHighlightSentenceIndices = $goldHighlightSentenceIndices;
  }
  /**
   * @return int[]
   */
  public function getGoldHighlightSentenceIndices()
  {
    return $this->goldHighlightSentenceIndices;
  }
  /**
   * @param float[]
   */
  public function setHighlightIdxToOverlap($highlightIdxToOverlap)
  {
    $this->highlightIdxToOverlap = $highlightIdxToOverlap;
  }
  /**
   * @return float[]
   */
  public function getHighlightIdxToOverlap()
  {
    return $this->highlightIdxToOverlap;
  }
  /**
   * @param float[]
   */
  public function setHighlightIdxToSentenceOverlap($highlightIdxToSentenceOverlap)
  {
    $this->highlightIdxToSentenceOverlap = $highlightIdxToSentenceOverlap;
  }
  /**
   * @return float[]
   */
  public function getHighlightIdxToSentenceOverlap()
  {
    return $this->highlightIdxToSentenceOverlap;
  }
  /**
   * @param bool
   */
  public function setIsGold($isGold)
  {
    $this->isGold = $isGold;
  }
  /**
   * @return bool
   */
  public function getIsGold()
  {
    return $this->isGold;
  }
  /**
   * @param int
   */
  public function setOffsetWithinSection($offsetWithinSection)
  {
    $this->offsetWithinSection = $offsetWithinSection;
  }
  /**
   * @return int
   */
  public function getOffsetWithinSection()
  {
    return $this->offsetWithinSection;
  }
  /**
   * @param int
   */
  public function setSectionIndex($sectionIndex)
  {
    $this->sectionIndex = $sectionIndex;
  }
  /**
   * @return int
   */
  public function getSectionIndex()
  {
    return $this->sectionIndex;
  }
  /**
   * @param float
   */
  public function setSectionIrScore($sectionIrScore)
  {
    $this->sectionIrScore = $sectionIrScore;
  }
  /**
   * @return float
   */
  public function getSectionIrScore()
  {
    return $this->sectionIrScore;
  }
  /**
   * @param float
   */
  public function setSnippetBleuScore($snippetBleuScore)
  {
    $this->snippetBleuScore = $snippetBleuScore;
  }
  /**
   * @return float
   */
  public function getSnippetBleuScore()
  {
    return $this->snippetBleuScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSciencelitRetrievalSnippetDebugInfo::class, 'Google_Service_Contentwarehouse_NlpSciencelitRetrievalSnippetDebugInfo');
