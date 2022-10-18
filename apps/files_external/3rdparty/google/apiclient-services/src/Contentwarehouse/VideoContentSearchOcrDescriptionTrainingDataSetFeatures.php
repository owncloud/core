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

class VideoContentSearchOcrDescriptionTrainingDataSetFeatures extends \Google\Model
{
  /**
   * @var int
   */
  public $maxEditDistance;
  /**
   * @var float
   */
  public $maxEditDistanceRatio;
  /**
   * @var int
   */
  public $medianEditDistance;

  /**
   * @param int
   */
  public function setMaxEditDistance($maxEditDistance)
  {
    $this->maxEditDistance = $maxEditDistance;
  }
  /**
   * @return int
   */
  public function getMaxEditDistance()
  {
    return $this->maxEditDistance;
  }
  /**
   * @param float
   */
  public function setMaxEditDistanceRatio($maxEditDistanceRatio)
  {
    $this->maxEditDistanceRatio = $maxEditDistanceRatio;
  }
  /**
   * @return float
   */
  public function getMaxEditDistanceRatio()
  {
    return $this->maxEditDistanceRatio;
  }
  /**
   * @param int
   */
  public function setMedianEditDistance($medianEditDistance)
  {
    $this->medianEditDistance = $medianEditDistance;
  }
  /**
   * @return int
   */
  public function getMedianEditDistance()
  {
    return $this->medianEditDistance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchOcrDescriptionTrainingDataSetFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchOcrDescriptionTrainingDataSetFeatures');
