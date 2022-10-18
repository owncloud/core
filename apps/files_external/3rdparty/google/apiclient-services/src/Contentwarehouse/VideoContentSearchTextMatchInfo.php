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

class VideoContentSearchTextMatchInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $durationToPredictedTimeMs;
  /**
   * @var float
   */
  public $matchScore;
  /**
   * @var int
   */
  public $matchedAsrStartPos;
  /**
   * @var string
   */
  public $matchedAsrText;
  /**
   * @var string
   */
  public $matchedAsrTimeMs;
  /**
   * @var float
   */
  public $matchedAsrTimeRatio;
  /**
   * @var int
   */
  public $matchedAsrTokenCount;
  /**
   * @var float
   */
  public $matchedDescriptionItemIndexRatio;
  /**
   * @var string
   */
  public $matchedDescriptionText;
  /**
   * @var int
   */
  public $matchedDescriptionTokenCount;

  /**
   * @param string
   */
  public function setDurationToPredictedTimeMs($durationToPredictedTimeMs)
  {
    $this->durationToPredictedTimeMs = $durationToPredictedTimeMs;
  }
  /**
   * @return string
   */
  public function getDurationToPredictedTimeMs()
  {
    return $this->durationToPredictedTimeMs;
  }
  /**
   * @param float
   */
  public function setMatchScore($matchScore)
  {
    $this->matchScore = $matchScore;
  }
  /**
   * @return float
   */
  public function getMatchScore()
  {
    return $this->matchScore;
  }
  /**
   * @param int
   */
  public function setMatchedAsrStartPos($matchedAsrStartPos)
  {
    $this->matchedAsrStartPos = $matchedAsrStartPos;
  }
  /**
   * @return int
   */
  public function getMatchedAsrStartPos()
  {
    return $this->matchedAsrStartPos;
  }
  /**
   * @param string
   */
  public function setMatchedAsrText($matchedAsrText)
  {
    $this->matchedAsrText = $matchedAsrText;
  }
  /**
   * @return string
   */
  public function getMatchedAsrText()
  {
    return $this->matchedAsrText;
  }
  /**
   * @param string
   */
  public function setMatchedAsrTimeMs($matchedAsrTimeMs)
  {
    $this->matchedAsrTimeMs = $matchedAsrTimeMs;
  }
  /**
   * @return string
   */
  public function getMatchedAsrTimeMs()
  {
    return $this->matchedAsrTimeMs;
  }
  /**
   * @param float
   */
  public function setMatchedAsrTimeRatio($matchedAsrTimeRatio)
  {
    $this->matchedAsrTimeRatio = $matchedAsrTimeRatio;
  }
  /**
   * @return float
   */
  public function getMatchedAsrTimeRatio()
  {
    return $this->matchedAsrTimeRatio;
  }
  /**
   * @param int
   */
  public function setMatchedAsrTokenCount($matchedAsrTokenCount)
  {
    $this->matchedAsrTokenCount = $matchedAsrTokenCount;
  }
  /**
   * @return int
   */
  public function getMatchedAsrTokenCount()
  {
    return $this->matchedAsrTokenCount;
  }
  /**
   * @param float
   */
  public function setMatchedDescriptionItemIndexRatio($matchedDescriptionItemIndexRatio)
  {
    $this->matchedDescriptionItemIndexRatio = $matchedDescriptionItemIndexRatio;
  }
  /**
   * @return float
   */
  public function getMatchedDescriptionItemIndexRatio()
  {
    return $this->matchedDescriptionItemIndexRatio;
  }
  /**
   * @param string
   */
  public function setMatchedDescriptionText($matchedDescriptionText)
  {
    $this->matchedDescriptionText = $matchedDescriptionText;
  }
  /**
   * @return string
   */
  public function getMatchedDescriptionText()
  {
    return $this->matchedDescriptionText;
  }
  /**
   * @param int
   */
  public function setMatchedDescriptionTokenCount($matchedDescriptionTokenCount)
  {
    $this->matchedDescriptionTokenCount = $matchedDescriptionTokenCount;
  }
  /**
   * @return int
   */
  public function getMatchedDescriptionTokenCount()
  {
    return $this->matchedDescriptionTokenCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchTextMatchInfo::class, 'Google_Service_Contentwarehouse_VideoContentSearchTextMatchInfo');
