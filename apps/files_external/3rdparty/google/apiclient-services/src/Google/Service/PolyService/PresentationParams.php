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

class Google_Service_PolyService_PresentationParams extends Google_Model
{
  public $backgroundColor;
  public $colorSpace;
  protected $orientingRotationType = 'Google_Service_PolyService_Quaternion';
  protected $orientingRotationDataType = '';

  public function setBackgroundColor($backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  public function setColorSpace($colorSpace)
  {
    $this->colorSpace = $colorSpace;
  }
  public function getColorSpace()
  {
    return $this->colorSpace;
  }
  /**
   * @param Google_Service_PolyService_Quaternion
   */
  public function setOrientingRotation(Google_Service_PolyService_Quaternion $orientingRotation)
  {
    $this->orientingRotation = $orientingRotation;
  }
  /**
   * @return Google_Service_PolyService_Quaternion
   */
  public function getOrientingRotation()
  {
    return $this->orientingRotation;
  }
}
