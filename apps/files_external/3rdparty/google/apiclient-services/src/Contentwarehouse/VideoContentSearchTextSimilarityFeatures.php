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

class VideoContentSearchTextSimilarityFeatures extends \Google\Collection
{
  protected $collection_key = 'wordAlignment';
  /**
   * @var string
   */
  public $hypothesisText;
  /**
   * @var string
   */
  public $hypothesisTextTime;
  /**
   * @var string
   */
  public $referenceText;
  /**
   * @var string
   */
  public $scoringMethodName;
  /**
   * @var float
   */
  public $similarityScore;
  /**
   * @var int
   */
  public $tokenMatchCount;
  /**
   * @var float
   */
  public $tokenMatchPercent;
  protected $wordAlignmentType = VideoContentSearchTokenAlignment::class;
  protected $wordAlignmentDataType = 'array';

  /**
   * @param string
   */
  public function setHypothesisText($hypothesisText)
  {
    $this->hypothesisText = $hypothesisText;
  }
  /**
   * @return string
   */
  public function getHypothesisText()
  {
    return $this->hypothesisText;
  }
  /**
   * @param string
   */
  public function setHypothesisTextTime($hypothesisTextTime)
  {
    $this->hypothesisTextTime = $hypothesisTextTime;
  }
  /**
   * @return string
   */
  public function getHypothesisTextTime()
  {
    return $this->hypothesisTextTime;
  }
  /**
   * @param string
   */
  public function setReferenceText($referenceText)
  {
    $this->referenceText = $referenceText;
  }
  /**
   * @return string
   */
  public function getReferenceText()
  {
    return $this->referenceText;
  }
  /**
   * @param string
   */
  public function setScoringMethodName($scoringMethodName)
  {
    $this->scoringMethodName = $scoringMethodName;
  }
  /**
   * @return string
   */
  public function getScoringMethodName()
  {
    return $this->scoringMethodName;
  }
  /**
   * @param float
   */
  public function setSimilarityScore($similarityScore)
  {
    $this->similarityScore = $similarityScore;
  }
  /**
   * @return float
   */
  public function getSimilarityScore()
  {
    return $this->similarityScore;
  }
  /**
   * @param int
   */
  public function setTokenMatchCount($tokenMatchCount)
  {
    $this->tokenMatchCount = $tokenMatchCount;
  }
  /**
   * @return int
   */
  public function getTokenMatchCount()
  {
    return $this->tokenMatchCount;
  }
  /**
   * @param float
   */
  public function setTokenMatchPercent($tokenMatchPercent)
  {
    $this->tokenMatchPercent = $tokenMatchPercent;
  }
  /**
   * @return float
   */
  public function getTokenMatchPercent()
  {
    return $this->tokenMatchPercent;
  }
  /**
   * @param VideoContentSearchTokenAlignment[]
   */
  public function setWordAlignment($wordAlignment)
  {
    $this->wordAlignment = $wordAlignment;
  }
  /**
   * @return VideoContentSearchTokenAlignment[]
   */
  public function getWordAlignment()
  {
    return $this->wordAlignment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchTextSimilarityFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchTextSimilarityFeatures');
