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

namespace Google\Service\Transcoder;

class AnimationFade extends \Google\Model
{
  public $endTimeOffset;
  public $fadeType;
  public $startTimeOffset;
  protected $xyType = NormalizedCoordinate::class;
  protected $xyDataType = '';

  public function setEndTimeOffset($endTimeOffset)
  {
    $this->endTimeOffset = $endTimeOffset;
  }
  public function getEndTimeOffset()
  {
    return $this->endTimeOffset;
  }
  public function setFadeType($fadeType)
  {
    $this->fadeType = $fadeType;
  }
  public function getFadeType()
  {
    return $this->fadeType;
  }
  public function setStartTimeOffset($startTimeOffset)
  {
    $this->startTimeOffset = $startTimeOffset;
  }
  public function getStartTimeOffset()
  {
    return $this->startTimeOffset;
  }
  /**
   * @param NormalizedCoordinate
   */
  public function setXy(NormalizedCoordinate $xy)
  {
    $this->xy = $xy;
  }
  /**
   * @return NormalizedCoordinate
   */
  public function getXy()
  {
    return $this->xy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AnimationFade::class, 'Google_Service_Transcoder_AnimationFade');
