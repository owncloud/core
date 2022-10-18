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

namespace Google\Service\CloudSearch;

class AppsDynamiteSharedDecoratedText extends \Google\Model
{
  /**
   * @var string
   */
  public $bottomLabel;
  protected $buttonType = AppsDynamiteSharedButton::class;
  protected $buttonDataType = '';
  protected $endIconType = AppsDynamiteSharedIcon::class;
  protected $endIconDataType = '';
  protected $iconType = AppsDynamiteSharedIcon::class;
  protected $iconDataType = '';
  protected $onClickType = AppsDynamiteSharedOnClick::class;
  protected $onClickDataType = '';
  protected $startIconType = AppsDynamiteSharedIcon::class;
  protected $startIconDataType = '';
  protected $switchControlType = AppsDynamiteSharedDecoratedTextSwitchControl::class;
  protected $switchControlDataType = '';
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $topLabel;
  /**
   * @var bool
   */
  public $wrapText;

  /**
   * @param string
   */
  public function setBottomLabel($bottomLabel)
  {
    $this->bottomLabel = $bottomLabel;
  }
  /**
   * @return string
   */
  public function getBottomLabel()
  {
    return $this->bottomLabel;
  }
  /**
   * @param AppsDynamiteSharedButton
   */
  public function setButton(AppsDynamiteSharedButton $button)
  {
    $this->button = $button;
  }
  /**
   * @return AppsDynamiteSharedButton
   */
  public function getButton()
  {
    return $this->button;
  }
  /**
   * @param AppsDynamiteSharedIcon
   */
  public function setEndIcon(AppsDynamiteSharedIcon $endIcon)
  {
    $this->endIcon = $endIcon;
  }
  /**
   * @return AppsDynamiteSharedIcon
   */
  public function getEndIcon()
  {
    return $this->endIcon;
  }
  /**
   * @param AppsDynamiteSharedIcon
   */
  public function setIcon(AppsDynamiteSharedIcon $icon)
  {
    $this->icon = $icon;
  }
  /**
   * @return AppsDynamiteSharedIcon
   */
  public function getIcon()
  {
    return $this->icon;
  }
  /**
   * @param AppsDynamiteSharedOnClick
   */
  public function setOnClick(AppsDynamiteSharedOnClick $onClick)
  {
    $this->onClick = $onClick;
  }
  /**
   * @return AppsDynamiteSharedOnClick
   */
  public function getOnClick()
  {
    return $this->onClick;
  }
  /**
   * @param AppsDynamiteSharedIcon
   */
  public function setStartIcon(AppsDynamiteSharedIcon $startIcon)
  {
    $this->startIcon = $startIcon;
  }
  /**
   * @return AppsDynamiteSharedIcon
   */
  public function getStartIcon()
  {
    return $this->startIcon;
  }
  /**
   * @param AppsDynamiteSharedDecoratedTextSwitchControl
   */
  public function setSwitchControl(AppsDynamiteSharedDecoratedTextSwitchControl $switchControl)
  {
    $this->switchControl = $switchControl;
  }
  /**
   * @return AppsDynamiteSharedDecoratedTextSwitchControl
   */
  public function getSwitchControl()
  {
    return $this->switchControl;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param string
   */
  public function setTopLabel($topLabel)
  {
    $this->topLabel = $topLabel;
  }
  /**
   * @return string
   */
  public function getTopLabel()
  {
    return $this->topLabel;
  }
  /**
   * @param bool
   */
  public function setWrapText($wrapText)
  {
    $this->wrapText = $wrapText;
  }
  /**
   * @return bool
   */
  public function getWrapText()
  {
    return $this->wrapText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedDecoratedText::class, 'Google_Service_CloudSearch_AppsDynamiteSharedDecoratedText');
