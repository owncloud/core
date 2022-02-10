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

namespace Google\Service\Dfareporting;

class ObaIcon extends \Google\Model
{
  /**
   * @var string
   */
  public $iconClickThroughUrl;
  /**
   * @var string
   */
  public $iconClickTrackingUrl;
  /**
   * @var string
   */
  public $iconViewTrackingUrl;
  /**
   * @var string
   */
  public $program;
  /**
   * @var string
   */
  public $resourceUrl;
  protected $sizeType = Size::class;
  protected $sizeDataType = '';
  /**
   * @var string
   */
  public $xPosition;
  /**
   * @var string
   */
  public $yPosition;

  /**
   * @param string
   */
  public function setIconClickThroughUrl($iconClickThroughUrl)
  {
    $this->iconClickThroughUrl = $iconClickThroughUrl;
  }
  /**
   * @return string
   */
  public function getIconClickThroughUrl()
  {
    return $this->iconClickThroughUrl;
  }
  /**
   * @param string
   */
  public function setIconClickTrackingUrl($iconClickTrackingUrl)
  {
    $this->iconClickTrackingUrl = $iconClickTrackingUrl;
  }
  /**
   * @return string
   */
  public function getIconClickTrackingUrl()
  {
    return $this->iconClickTrackingUrl;
  }
  /**
   * @param string
   */
  public function setIconViewTrackingUrl($iconViewTrackingUrl)
  {
    $this->iconViewTrackingUrl = $iconViewTrackingUrl;
  }
  /**
   * @return string
   */
  public function getIconViewTrackingUrl()
  {
    return $this->iconViewTrackingUrl;
  }
  /**
   * @param string
   */
  public function setProgram($program)
  {
    $this->program = $program;
  }
  /**
   * @return string
   */
  public function getProgram()
  {
    return $this->program;
  }
  /**
   * @param string
   */
  public function setResourceUrl($resourceUrl)
  {
    $this->resourceUrl = $resourceUrl;
  }
  /**
   * @return string
   */
  public function getResourceUrl()
  {
    return $this->resourceUrl;
  }
  /**
   * @param Size
   */
  public function setSize(Size $size)
  {
    $this->size = $size;
  }
  /**
   * @return Size
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string
   */
  public function setXPosition($xPosition)
  {
    $this->xPosition = $xPosition;
  }
  /**
   * @return string
   */
  public function getXPosition()
  {
    return $this->xPosition;
  }
  /**
   * @param string
   */
  public function setYPosition($yPosition)
  {
    $this->yPosition = $yPosition;
  }
  /**
   * @return string
   */
  public function getYPosition()
  {
    return $this->yPosition;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ObaIcon::class, 'Google_Service_Dfareporting_ObaIcon');
