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

class Google_Service_HangoutsChat_GoogleAppsCardV1Button extends Google_Model
{
  public $altText;
  protected $colorType = 'Google_Service_HangoutsChat_Color';
  protected $colorDataType = '';
  public $disabled;
  protected $iconType = 'Google_Service_HangoutsChat_GoogleAppsCardV1Icon';
  protected $iconDataType = '';
  protected $onClickType = 'Google_Service_HangoutsChat_GoogleAppsCardV1OnClick';
  protected $onClickDataType = '';
  public $text;

  public function setAltText($altText)
  {
    $this->altText = $altText;
  }
  public function getAltText()
  {
    return $this->altText;
  }
  /**
   * @param Google_Service_HangoutsChat_Color
   */
  public function setColor(Google_Service_HangoutsChat_Color $color)
  {
    $this->color = $color;
  }
  /**
   * @return Google_Service_HangoutsChat_Color
   */
  public function getColor()
  {
    return $this->color;
  }
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  public function getDisabled()
  {
    return $this->disabled;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1Icon
   */
  public function setIcon(Google_Service_HangoutsChat_GoogleAppsCardV1Icon $icon)
  {
    $this->icon = $icon;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1Icon
   */
  public function getIcon()
  {
    return $this->icon;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1OnClick
   */
  public function setOnClick(Google_Service_HangoutsChat_GoogleAppsCardV1OnClick $onClick)
  {
    $this->onClick = $onClick;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1OnClick
   */
  public function getOnClick()
  {
    return $this->onClick;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}
