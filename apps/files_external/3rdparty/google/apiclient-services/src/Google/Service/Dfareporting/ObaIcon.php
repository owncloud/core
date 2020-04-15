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

class Google_Service_Dfareporting_ObaIcon extends Google_Model
{
  public $iconClickThroughUrl;
  public $iconClickTrackingUrl;
  public $iconViewTrackingUrl;
  public $program;
  public $resourceUrl;
  protected $sizeType = 'Google_Service_Dfareporting_Size';
  protected $sizeDataType = '';
  public $xPosition;
  public $yPosition;

  public function setIconClickThroughUrl($iconClickThroughUrl)
  {
    $this->iconClickThroughUrl = $iconClickThroughUrl;
  }
  public function getIconClickThroughUrl()
  {
    return $this->iconClickThroughUrl;
  }
  public function setIconClickTrackingUrl($iconClickTrackingUrl)
  {
    $this->iconClickTrackingUrl = $iconClickTrackingUrl;
  }
  public function getIconClickTrackingUrl()
  {
    return $this->iconClickTrackingUrl;
  }
  public function setIconViewTrackingUrl($iconViewTrackingUrl)
  {
    $this->iconViewTrackingUrl = $iconViewTrackingUrl;
  }
  public function getIconViewTrackingUrl()
  {
    return $this->iconViewTrackingUrl;
  }
  public function setProgram($program)
  {
    $this->program = $program;
  }
  public function getProgram()
  {
    return $this->program;
  }
  public function setResourceUrl($resourceUrl)
  {
    $this->resourceUrl = $resourceUrl;
  }
  public function getResourceUrl()
  {
    return $this->resourceUrl;
  }
  /**
   * @param Google_Service_Dfareporting_Size
   */
  public function setSize(Google_Service_Dfareporting_Size $size)
  {
    $this->size = $size;
  }
  /**
   * @return Google_Service_Dfareporting_Size
   */
  public function getSize()
  {
    return $this->size;
  }
  public function setXPosition($xPosition)
  {
    $this->xPosition = $xPosition;
  }
  public function getXPosition()
  {
    return $this->xPosition;
  }
  public function setYPosition($yPosition)
  {
    $this->yPosition = $yPosition;
  }
  public function getYPosition()
  {
    return $this->yPosition;
  }
}
