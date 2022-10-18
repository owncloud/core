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

class VideoContentSearchListTrainingDataAnchorFeatures extends \Google\Model
{
  /**
   * @var int
   */
  public $descriptionAnchorTimeMs;
  /**
   * @var string
   */
  public $descriptionAnchorTimeToMatchedTimeMs;
  /**
   * @var int
   */
  public $editDistance;
  /**
   * @var float
   */
  public $editDistanceRatio;
  /**
   * @var string
   */
  public $matchedDescriptionText;
  /**
   * @var string
   */
  public $matchedSpanText;

  /**
   * @param int
   */
  public function setDescriptionAnchorTimeMs($descriptionAnchorTimeMs)
  {
    $this->descriptionAnchorTimeMs = $descriptionAnchorTimeMs;
  }
  /**
   * @return int
   */
  public function getDescriptionAnchorTimeMs()
  {
    return $this->descriptionAnchorTimeMs;
  }
  /**
   * @param string
   */
  public function setDescriptionAnchorTimeToMatchedTimeMs($descriptionAnchorTimeToMatchedTimeMs)
  {
    $this->descriptionAnchorTimeToMatchedTimeMs = $descriptionAnchorTimeToMatchedTimeMs;
  }
  /**
   * @return string
   */
  public function getDescriptionAnchorTimeToMatchedTimeMs()
  {
    return $this->descriptionAnchorTimeToMatchedTimeMs;
  }
  /**
   * @param int
   */
  public function setEditDistance($editDistance)
  {
    $this->editDistance = $editDistance;
  }
  /**
   * @return int
   */
  public function getEditDistance()
  {
    return $this->editDistance;
  }
  /**
   * @param float
   */
  public function setEditDistanceRatio($editDistanceRatio)
  {
    $this->editDistanceRatio = $editDistanceRatio;
  }
  /**
   * @return float
   */
  public function getEditDistanceRatio()
  {
    return $this->editDistanceRatio;
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
   * @param string
   */
  public function setMatchedSpanText($matchedSpanText)
  {
    $this->matchedSpanText = $matchedSpanText;
  }
  /**
   * @return string
   */
  public function getMatchedSpanText()
  {
    return $this->matchedSpanText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchListTrainingDataAnchorFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchListTrainingDataAnchorFeatures');
