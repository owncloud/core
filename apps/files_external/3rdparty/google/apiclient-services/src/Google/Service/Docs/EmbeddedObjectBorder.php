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

class Google_Service_Docs_EmbeddedObjectBorder extends Google_Model
{
  protected $colorType = 'Google_Service_Docs_OptionalColor';
  protected $colorDataType = '';
  public $dashStyle;
  public $propertyState;
  protected $widthType = 'Google_Service_Docs_Dimension';
  protected $widthDataType = '';

  /**
   * @param Google_Service_Docs_OptionalColor
   */
  public function setColor(Google_Service_Docs_OptionalColor $color)
  {
    $this->color = $color;
  }
  /**
   * @return Google_Service_Docs_OptionalColor
   */
  public function getColor()
  {
    return $this->color;
  }
  public function setDashStyle($dashStyle)
  {
    $this->dashStyle = $dashStyle;
  }
  public function getDashStyle()
  {
    return $this->dashStyle;
  }
  public function setPropertyState($propertyState)
  {
    $this->propertyState = $propertyState;
  }
  public function getPropertyState()
  {
    return $this->propertyState;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setWidth(Google_Service_Docs_Dimension $width)
  {
    $this->width = $width;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getWidth()
  {
    return $this->width;
  }
}
