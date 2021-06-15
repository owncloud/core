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

class Google_Service_HangoutsChat_GoogleAppsCardV1DecoratedText extends Google_Model
{
  public $bottomLabel;
  protected $buttonType = 'Google_Service_HangoutsChat_GoogleAppsCardV1Button';
  protected $buttonDataType = '';
  protected $endIconType = 'Google_Service_HangoutsChat_GoogleAppsCardV1Icon';
  protected $endIconDataType = '';
  protected $iconType = 'Google_Service_HangoutsChat_GoogleAppsCardV1Icon';
  protected $iconDataType = '';
  protected $onClickType = 'Google_Service_HangoutsChat_GoogleAppsCardV1OnClick';
  protected $onClickDataType = '';
  protected $startIconType = 'Google_Service_HangoutsChat_GoogleAppsCardV1Icon';
  protected $startIconDataType = '';
  protected $switchControlType = 'Google_Service_HangoutsChat_GoogleAppsCardV1SwitchControl';
  protected $switchControlDataType = '';
  public $text;
  public $topLabel;
  public $wrapText;

  public function setBottomLabel($bottomLabel)
  {
    $this->bottomLabel = $bottomLabel;
  }
  public function getBottomLabel()
  {
    return $this->bottomLabel;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1Button
   */
  public function setButton(Google_Service_HangoutsChat_GoogleAppsCardV1Button $button)
  {
    $this->button = $button;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1Button
   */
  public function getButton()
  {
    return $this->button;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1Icon
   */
  public function setEndIcon(Google_Service_HangoutsChat_GoogleAppsCardV1Icon $endIcon)
  {
    $this->endIcon = $endIcon;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1Icon
   */
  public function getEndIcon()
  {
    return $this->endIcon;
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
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1Icon
   */
  public function setStartIcon(Google_Service_HangoutsChat_GoogleAppsCardV1Icon $startIcon)
  {
    $this->startIcon = $startIcon;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1Icon
   */
  public function getStartIcon()
  {
    return $this->startIcon;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1SwitchControl
   */
  public function setSwitchControl(Google_Service_HangoutsChat_GoogleAppsCardV1SwitchControl $switchControl)
  {
    $this->switchControl = $switchControl;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1SwitchControl
   */
  public function getSwitchControl()
  {
    return $this->switchControl;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
  public function setTopLabel($topLabel)
  {
    $this->topLabel = $topLabel;
  }
  public function getTopLabel()
  {
    return $this->topLabel;
  }
  public function setWrapText($wrapText)
  {
    $this->wrapText = $wrapText;
  }
  public function getWrapText()
  {
    return $this->wrapText;
  }
}
