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

class Google_Service_Sheets_SpreadsheetTheme extends Google_Collection
{
  protected $collection_key = 'themeColors';
  public $primaryFontFamily;
  protected $themeColorsType = 'Google_Service_Sheets_ThemeColorPair';
  protected $themeColorsDataType = 'array';

  public function setPrimaryFontFamily($primaryFontFamily)
  {
    $this->primaryFontFamily = $primaryFontFamily;
  }
  public function getPrimaryFontFamily()
  {
    return $this->primaryFontFamily;
  }
  /**
   * @param Google_Service_Sheets_ThemeColorPair
   */
  public function setThemeColors($themeColors)
  {
    $this->themeColors = $themeColors;
  }
  /**
   * @return Google_Service_Sheets_ThemeColorPair
   */
  public function getThemeColors()
  {
    return $this->themeColors;
  }
}
