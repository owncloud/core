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

class AppsDynamiteSharedButton extends \Google\Model
{
  /**
   * @var string
   */
  public $altText;
  protected $colorType = Color::class;
  protected $colorDataType = '';
  /**
   * @var bool
   */
  public $disabled;
  protected $iconType = AppsDynamiteSharedIcon::class;
  protected $iconDataType = '';
  protected $onClickType = AppsDynamiteSharedOnClick::class;
  protected $onClickDataType = '';
  /**
   * @var string
   */
  public $text;

  /**
   * @param string
   */
  public function setAltText($altText)
  {
    $this->altText = $altText;
  }
  /**
   * @return string
   */
  public function getAltText()
  {
    return $this->altText;
  }
  /**
   * @param Color
   */
  public function setColor(Color $color)
  {
    $this->color = $color;
  }
  /**
   * @return Color
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
  public function getDisabled()
  {
    return $this->disabled;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedButton::class, 'Google_Service_CloudSearch_AppsDynamiteSharedButton');
