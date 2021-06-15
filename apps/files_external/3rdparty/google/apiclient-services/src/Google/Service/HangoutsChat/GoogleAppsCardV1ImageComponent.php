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

class Google_Service_HangoutsChat_GoogleAppsCardV1ImageComponent extends Google_Model
{
  public $altText;
  protected $borderStyleType = 'Google_Service_HangoutsChat_GoogleAppsCardV1BorderStyle';
  protected $borderStyleDataType = '';
  protected $cropStyleType = 'Google_Service_HangoutsChat_GoogleAppsCardV1ImageCropStyle';
  protected $cropStyleDataType = '';
  public $imageUri;

  public function setAltText($altText)
  {
    $this->altText = $altText;
  }
  public function getAltText()
  {
    return $this->altText;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1BorderStyle
   */
  public function setBorderStyle(Google_Service_HangoutsChat_GoogleAppsCardV1BorderStyle $borderStyle)
  {
    $this->borderStyle = $borderStyle;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1BorderStyle
   */
  public function getBorderStyle()
  {
    return $this->borderStyle;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1ImageCropStyle
   */
  public function setCropStyle(Google_Service_HangoutsChat_GoogleAppsCardV1ImageCropStyle $cropStyle)
  {
    $this->cropStyle = $cropStyle;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1ImageCropStyle
   */
  public function getCropStyle()
  {
    return $this->cropStyle;
  }
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  public function getImageUri()
  {
    return $this->imageUri;
  }
}
