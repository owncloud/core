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

namespace Google\Service\Sheets;

class SpreadsheetTheme extends \Google\Collection
{
  protected $collection_key = 'themeColors';
  /**
   * @var string
   */
  public $primaryFontFamily;
  protected $themeColorsType = ThemeColorPair::class;
  protected $themeColorsDataType = 'array';

  /**
   * @param string
   */
  public function setPrimaryFontFamily($primaryFontFamily)
  {
    $this->primaryFontFamily = $primaryFontFamily;
  }
  /**
   * @return string
   */
  public function getPrimaryFontFamily()
  {
    return $this->primaryFontFamily;
  }
  /**
   * @param ThemeColorPair[]
   */
  public function setThemeColors($themeColors)
  {
    $this->themeColors = $themeColors;
  }
  /**
   * @return ThemeColorPair[]
   */
  public function getThemeColors()
  {
    return $this->themeColors;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpreadsheetTheme::class, 'Google_Service_Sheets_SpreadsheetTheme');
