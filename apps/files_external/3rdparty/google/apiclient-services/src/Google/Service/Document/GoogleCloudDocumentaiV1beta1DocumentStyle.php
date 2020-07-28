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

class Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentStyle extends Google_Model
{
  protected $backgroundColorType = 'Google_Service_Document_GoogleTypeColor';
  protected $backgroundColorDataType = '';
  protected $colorType = 'Google_Service_Document_GoogleTypeColor';
  protected $colorDataType = '';
  protected $fontSizeType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentStyleFontSize';
  protected $fontSizeDataType = '';
  public $fontWeight;
  protected $textAnchorType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentTextAnchor';
  protected $textAnchorDataType = '';
  public $textDecoration;
  public $textStyle;

  /**
   * @param Google_Service_Document_GoogleTypeColor
   */
  public function setBackgroundColor(Google_Service_Document_GoogleTypeColor $backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return Google_Service_Document_GoogleTypeColor
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param Google_Service_Document_GoogleTypeColor
   */
  public function setColor(Google_Service_Document_GoogleTypeColor $color)
  {
    $this->color = $color;
  }
  /**
   * @return Google_Service_Document_GoogleTypeColor
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentStyleFontSize
   */
  public function setFontSize(Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentStyleFontSize $fontSize)
  {
    $this->fontSize = $fontSize;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentStyleFontSize
   */
  public function getFontSize()
  {
    return $this->fontSize;
  }
  public function setFontWeight($fontWeight)
  {
    $this->fontWeight = $fontWeight;
  }
  public function getFontWeight()
  {
    return $this->fontWeight;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentTextAnchor
   */
  public function setTextAnchor(Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentTextAnchor $textAnchor)
  {
    $this->textAnchor = $textAnchor;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentTextAnchor
   */
  public function getTextAnchor()
  {
    return $this->textAnchor;
  }
  public function setTextDecoration($textDecoration)
  {
    $this->textDecoration = $textDecoration;
  }
  public function getTextDecoration()
  {
    return $this->textDecoration;
  }
  public function setTextStyle($textStyle)
  {
    $this->textStyle = $textStyle;
  }
  public function getTextStyle()
  {
    return $this->textStyle;
  }
}
