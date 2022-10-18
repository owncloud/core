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

class VideoContentSearchOcrDescriptionTrainingDataAnchorFeatures extends \Google\Model
{
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
   * @var int
   */
  public $matchedFrameTimeMs;
  /**
   * @var string
   */
  public $matchedOcrText;

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
   * @param int
   */
  public function setMatchedFrameTimeMs($matchedFrameTimeMs)
  {
    $this->matchedFrameTimeMs = $matchedFrameTimeMs;
  }
  /**
   * @return int
   */
  public function getMatchedFrameTimeMs()
  {
    return $this->matchedFrameTimeMs;
  }
  /**
   * @param string
   */
  public function setMatchedOcrText($matchedOcrText)
  {
    $this->matchedOcrText = $matchedOcrText;
  }
  /**
   * @return string
   */
  public function getMatchedOcrText()
  {
    return $this->matchedOcrText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchOcrDescriptionTrainingDataAnchorFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchOcrDescriptionTrainingDataAnchorFeatures');
