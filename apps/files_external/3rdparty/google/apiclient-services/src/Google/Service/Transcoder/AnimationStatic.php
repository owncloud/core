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

class Google_Service_Transcoder_AnimationStatic extends Google_Model
{
  public $startTimeOffset;
  protected $xyType = 'Google_Service_Transcoder_NormalizedCoordinate';
  protected $xyDataType = '';

  public function setStartTimeOffset($startTimeOffset)
  {
    $this->startTimeOffset = $startTimeOffset;
  }
  public function getStartTimeOffset()
  {
    return $this->startTimeOffset;
  }
  /**
   * @param Google_Service_Transcoder_NormalizedCoordinate
   */
  public function setXy(Google_Service_Transcoder_NormalizedCoordinate $xy)
  {
    $this->xy = $xy;
  }
  /**
   * @return Google_Service_Transcoder_NormalizedCoordinate
   */
  public function getXy()
  {
    return $this->xy;
  }
}
