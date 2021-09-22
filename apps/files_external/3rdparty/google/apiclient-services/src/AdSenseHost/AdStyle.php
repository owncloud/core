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

namespace Google\Service\AdSenseHost;

class AdStyle extends \Google\Model
{
  protected $colorsType = AdStyleColors::class;
  protected $colorsDataType = '';
  public $corners;
  protected $fontType = AdStyleFont::class;
  protected $fontDataType = '';
  public $kind;

  /**
   * @param AdStyleColors
   */
  public function setColors(AdStyleColors $colors)
  {
    $this->colors = $colors;
  }
  /**
   * @return AdStyleColors
   */
  public function getColors()
  {
    return $this->colors;
  }
  public function setCorners($corners)
  {
    $this->corners = $corners;
  }
  public function getCorners()
  {
    return $this->corners;
  }
  /**
   * @param AdStyleFont
   */
  public function setFont(AdStyleFont $font)
  {
    $this->font = $font;
  }
  /**
   * @return AdStyleFont
   */
  public function getFont()
  {
    return $this->font;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdStyle::class, 'Google_Service_AdSenseHost_AdStyle');
