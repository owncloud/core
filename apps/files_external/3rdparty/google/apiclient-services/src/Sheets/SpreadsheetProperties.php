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

class SpreadsheetProperties extends \Google\Model
{
  public $autoRecalc;
  protected $defaultFormatType = CellFormat::class;
  protected $defaultFormatDataType = '';
  protected $iterativeCalculationSettingsType = IterativeCalculationSettings::class;
  protected $iterativeCalculationSettingsDataType = '';
  public $locale;
  protected $spreadsheetThemeType = SpreadsheetTheme::class;
  protected $spreadsheetThemeDataType = '';
  public $timeZone;
  public $title;

  public function setAutoRecalc($autoRecalc)
  {
    $this->autoRecalc = $autoRecalc;
  }
  public function getAutoRecalc()
  {
    return $this->autoRecalc;
  }
  /**
   * @param CellFormat
   */
  public function setDefaultFormat(CellFormat $defaultFormat)
  {
    $this->defaultFormat = $defaultFormat;
  }
  /**
   * @return CellFormat
   */
  public function getDefaultFormat()
  {
    return $this->defaultFormat;
  }
  /**
   * @param IterativeCalculationSettings
   */
  public function setIterativeCalculationSettings(IterativeCalculationSettings $iterativeCalculationSettings)
  {
    $this->iterativeCalculationSettings = $iterativeCalculationSettings;
  }
  /**
   * @return IterativeCalculationSettings
   */
  public function getIterativeCalculationSettings()
  {
    return $this->iterativeCalculationSettings;
  }
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param SpreadsheetTheme
   */
  public function setSpreadsheetTheme(SpreadsheetTheme $spreadsheetTheme)
  {
    $this->spreadsheetTheme = $spreadsheetTheme;
  }
  /**
   * @return SpreadsheetTheme
   */
  public function getSpreadsheetTheme()
  {
    return $this->spreadsheetTheme;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpreadsheetProperties::class, 'Google_Service_Sheets_SpreadsheetProperties');
