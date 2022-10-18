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

class VideoContentSearchOcrAsrFeature extends \Google\Model
{
  /**
   * @var int
   */
  public $minCharEditDistance;
  /**
   * @var string
   */
  public $minCharEditDistanceAsrText;
  /**
   * @var float
   */
  public $minCharEditDistancePercent;
  /**
   * @var string
   */
  public $ocrTextNormalizedForCharMatch;
  /**
   * @var int
   */
  public $ocrTextNormalizedForCharMatchLength;
  /**
   * @var float
   */
  public $pretriggerScore;
  /**
   * @var string
   */
  public $wordOverlapAsrText;
  /**
   * @var int
   */
  public $wordOverlapCount;
  /**
   * @var float
   */
  public $wordOverlapPercent;

  /**
   * @param int
   */
  public function setMinCharEditDistance($minCharEditDistance)
  {
    $this->minCharEditDistance = $minCharEditDistance;
  }
  /**
   * @return int
   */
  public function getMinCharEditDistance()
  {
    return $this->minCharEditDistance;
  }
  /**
   * @param string
   */
  public function setMinCharEditDistanceAsrText($minCharEditDistanceAsrText)
  {
    $this->minCharEditDistanceAsrText = $minCharEditDistanceAsrText;
  }
  /**
   * @return string
   */
  public function getMinCharEditDistanceAsrText()
  {
    return $this->minCharEditDistanceAsrText;
  }
  /**
   * @param float
   */
  public function setMinCharEditDistancePercent($minCharEditDistancePercent)
  {
    $this->minCharEditDistancePercent = $minCharEditDistancePercent;
  }
  /**
   * @return float
   */
  public function getMinCharEditDistancePercent()
  {
    return $this->minCharEditDistancePercent;
  }
  /**
   * @param string
   */
  public function setOcrTextNormalizedForCharMatch($ocrTextNormalizedForCharMatch)
  {
    $this->ocrTextNormalizedForCharMatch = $ocrTextNormalizedForCharMatch;
  }
  /**
   * @return string
   */
  public function getOcrTextNormalizedForCharMatch()
  {
    return $this->ocrTextNormalizedForCharMatch;
  }
  /**
   * @param int
   */
  public function setOcrTextNormalizedForCharMatchLength($ocrTextNormalizedForCharMatchLength)
  {
    $this->ocrTextNormalizedForCharMatchLength = $ocrTextNormalizedForCharMatchLength;
  }
  /**
   * @return int
   */
  public function getOcrTextNormalizedForCharMatchLength()
  {
    return $this->ocrTextNormalizedForCharMatchLength;
  }
  /**
   * @param float
   */
  public function setPretriggerScore($pretriggerScore)
  {
    $this->pretriggerScore = $pretriggerScore;
  }
  /**
   * @return float
   */
  public function getPretriggerScore()
  {
    return $this->pretriggerScore;
  }
  /**
   * @param string
   */
  public function setWordOverlapAsrText($wordOverlapAsrText)
  {
    $this->wordOverlapAsrText = $wordOverlapAsrText;
  }
  /**
   * @return string
   */
  public function getWordOverlapAsrText()
  {
    return $this->wordOverlapAsrText;
  }
  /**
   * @param int
   */
  public function setWordOverlapCount($wordOverlapCount)
  {
    $this->wordOverlapCount = $wordOverlapCount;
  }
  /**
   * @return int
   */
  public function getWordOverlapCount()
  {
    return $this->wordOverlapCount;
  }
  /**
   * @param float
   */
  public function setWordOverlapPercent($wordOverlapPercent)
  {
    $this->wordOverlapPercent = $wordOverlapPercent;
  }
  /**
   * @return float
   */
  public function getWordOverlapPercent()
  {
    return $this->wordOverlapPercent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchOcrAsrFeature::class, 'Google_Service_Contentwarehouse_VideoContentSearchOcrAsrFeature');
