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

namespace Google\Service\HangoutsChat;

class ImageButton extends \Google\Model
{
  /**
   * @var string
   */
  public $icon;
  /**
   * @var string
   */
  public $iconUrl;
  /**
   * @var string
   */
  public $name;
  protected $onClickType = OnClick::class;
  protected $onClickDataType = '';

  /**
   * @param string
   */
  public function setIcon($icon)
  {
    $this->icon = $icon;
  }
  /**
   * @return string
   */
  public function getIcon()
  {
    return $this->icon;
  }
  /**
   * @param string
   */
  public function setIconUrl($iconUrl)
  {
    $this->iconUrl = $iconUrl;
  }
  /**
   * @return string
   */
  public function getIconUrl()
  {
    return $this->iconUrl;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param OnClick
   */
  public function setOnClick(OnClick $onClick)
  {
    $this->onClick = $onClick;
  }
  /**
   * @return OnClick
   */
  public function getOnClick()
  {
    return $this->onClick;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageButton::class, 'Google_Service_HangoutsChat_ImageButton');
