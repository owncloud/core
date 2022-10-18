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

class ImageRepositoryAnimatedImagePerdocData extends \Google\Model
{
  protected $aggregatedPornScoresType = ImageSafesearchContentBrainPornAnnotation::class;
  protected $aggregatedPornScoresDataType = '';
  /**
   * @var int
   */
  public $durationMs;

  /**
   * @param ImageSafesearchContentBrainPornAnnotation
   */
  public function setAggregatedPornScores(ImageSafesearchContentBrainPornAnnotation $aggregatedPornScores)
  {
    $this->aggregatedPornScores = $aggregatedPornScores;
  }
  /**
   * @return ImageSafesearchContentBrainPornAnnotation
   */
  public function getAggregatedPornScores()
  {
    return $this->aggregatedPornScores;
  }
  /**
   * @param int
   */
  public function setDurationMs($durationMs)
  {
    $this->durationMs = $durationMs;
  }
  /**
   * @return int
   */
  public function getDurationMs()
  {
    return $this->durationMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRepositoryAnimatedImagePerdocData::class, 'Google_Service_Contentwarehouse_ImageRepositoryAnimatedImagePerdocData');
