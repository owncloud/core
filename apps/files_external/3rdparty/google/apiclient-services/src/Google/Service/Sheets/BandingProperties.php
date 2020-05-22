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

class Google_Service_Sheets_BandingProperties extends Google_Model
{
  protected $firstBandColorType = 'Google_Service_Sheets_Color';
  protected $firstBandColorDataType = '';
  protected $firstBandColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $firstBandColorStyleDataType = '';
  protected $footerColorType = 'Google_Service_Sheets_Color';
  protected $footerColorDataType = '';
  protected $footerColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $footerColorStyleDataType = '';
  protected $headerColorType = 'Google_Service_Sheets_Color';
  protected $headerColorDataType = '';
  protected $headerColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $headerColorStyleDataType = '';
  protected $secondBandColorType = 'Google_Service_Sheets_Color';
  protected $secondBandColorDataType = '';
  protected $secondBandColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $secondBandColorStyleDataType = '';

  /**
   * @param Google_Service_Sheets_Color
   */
  public function setFirstBandColor(Google_Service_Sheets_Color $firstBandColor)
  {
    $this->firstBandColor = $firstBandColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getFirstBandColor()
  {
    return $this->firstBandColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setFirstBandColorStyle(Google_Service_Sheets_ColorStyle $firstBandColorStyle)
  {
    $this->firstBandColorStyle = $firstBandColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getFirstBandColorStyle()
  {
    return $this->firstBandColorStyle;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setFooterColor(Google_Service_Sheets_Color $footerColor)
  {
    $this->footerColor = $footerColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getFooterColor()
  {
    return $this->footerColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setFooterColorStyle(Google_Service_Sheets_ColorStyle $footerColorStyle)
  {
    $this->footerColorStyle = $footerColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getFooterColorStyle()
  {
    return $this->footerColorStyle;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setHeaderColor(Google_Service_Sheets_Color $headerColor)
  {
    $this->headerColor = $headerColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getHeaderColor()
  {
    return $this->headerColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setHeaderColorStyle(Google_Service_Sheets_ColorStyle $headerColorStyle)
  {
    $this->headerColorStyle = $headerColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getHeaderColorStyle()
  {
    return $this->headerColorStyle;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setSecondBandColor(Google_Service_Sheets_Color $secondBandColor)
  {
    $this->secondBandColor = $secondBandColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getSecondBandColor()
  {
    return $this->secondBandColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setSecondBandColorStyle(Google_Service_Sheets_ColorStyle $secondBandColorStyle)
  {
    $this->secondBandColorStyle = $secondBandColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getSecondBandColorStyle()
  {
    return $this->secondBandColorStyle;
  }
}
