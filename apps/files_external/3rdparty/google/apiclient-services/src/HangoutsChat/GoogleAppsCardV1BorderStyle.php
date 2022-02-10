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

class GoogleAppsCardV1BorderStyle extends \Google\Model
{
  /**
   * @var int
   */
  public $cornerRadius;
  protected $strokeColorType = Color::class;
  protected $strokeColorDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param int
   */
  public function setCornerRadius($cornerRadius)
  {
    $this->cornerRadius = $cornerRadius;
  }
  /**
   * @return int
   */
  public function getCornerRadius()
  {
    return $this->cornerRadius;
  }
  /**
   * @param Color
   */
  public function setStrokeColor(Color $strokeColor)
  {
    $this->strokeColor = $strokeColor;
  }
  /**
   * @return Color
   */
  public function getStrokeColor()
  {
    return $this->strokeColor;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCardV1BorderStyle::class, 'Google_Service_HangoutsChat_GoogleAppsCardV1BorderStyle');
