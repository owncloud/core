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

class VideoContentSearchSimilarityMatchInfo extends \Google\Model
{
  /**
   * @var int
   */
  public $instructionStartMs;
  /**
   * @var string
   */
  public $instructionText;
  /**
   * @var string
   */
  public $referenceText;
  /**
   * @var int
   */
  public $referenceTextTimeMs;
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
  public $stepIndex;
  /**
   * @var string
   */
  public $tokenSequence;
  /**
   * @var int
   */
  public $tokenSequenceLength;
  /**
   * @var int
   */
  public $tokenStartPos;

  /**
   * @param int
   */
  public function setInstructionStartMs($instructionStartMs)
  {
    $this->instructionStartMs = $instructionStartMs;
  }
  /**
   * @return int
   */
  public function getInstructionStartMs()
  {
    return $this->instructionStartMs;
  }
  /**
   * @param string
   */
  public function setInstructionText($instructionText)
  {
    $this->instructionText = $instructionText;
  }
  /**
   * @return string
   */
  public function getInstructionText()
  {
    return $this->instructionText;
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
   * @param int
   */
  public function setReferenceTextTimeMs($referenceTextTimeMs)
  {
    $this->referenceTextTimeMs = $referenceTextTimeMs;
  }
  /**
   * @return int
   */
  public function getReferenceTextTimeMs()
  {
    return $this->referenceTextTimeMs;
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
  public function setStepIndex($stepIndex)
  {
    $this->stepIndex = $stepIndex;
  }
  /**
   * @return int
   */
  public function getStepIndex()
  {
    return $this->stepIndex;
  }
  /**
   * @param string
   */
  public function setTokenSequence($tokenSequence)
  {
    $this->tokenSequence = $tokenSequence;
  }
  /**
   * @return string
   */
  public function getTokenSequence()
  {
    return $this->tokenSequence;
  }
  /**
   * @param int
   */
  public function setTokenSequenceLength($tokenSequenceLength)
  {
    $this->tokenSequenceLength = $tokenSequenceLength;
  }
  /**
   * @return int
   */
  public function getTokenSequenceLength()
  {
    return $this->tokenSequenceLength;
  }
  /**
   * @param int
   */
  public function setTokenStartPos($tokenStartPos)
  {
    $this->tokenStartPos = $tokenStartPos;
  }
  /**
   * @return int
   */
  public function getTokenStartPos()
  {
    return $this->tokenStartPos;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchSimilarityMatchInfo::class, 'Google_Service_Contentwarehouse_VideoContentSearchSimilarityMatchInfo');
