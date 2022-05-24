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

namespace Google\Service\Docs;

class TextStyle extends \Google\Model
{
  protected $backgroundColorType = OptionalColor::class;
  protected $backgroundColorDataType = '';
  /**
   * @var string
   */
  public $baselineOffset;
  /**
   * @var bool
   */
  public $bold;
  protected $fontSizeType = Dimension::class;
  protected $fontSizeDataType = '';
  protected $foregroundColorType = OptionalColor::class;
  protected $foregroundColorDataType = '';
  /**
   * @var bool
   */
  public $italic;
  protected $linkType = Link::class;
  protected $linkDataType = '';
  /**
   * @var bool
   */
  public $smallCaps;
  /**
   * @var bool
   */
  public $strikethrough;
  /**
   * @var bool
   */
  public $underline;
  protected $weightedFontFamilyType = WeightedFontFamily::class;
  protected $weightedFontFamilyDataType = '';

  /**
   * @param OptionalColor
   */
  public function setBackgroundColor(OptionalColor $backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return OptionalColor
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param string
   */
  public function setBaselineOffset($baselineOffset)
  {
    $this->baselineOffset = $baselineOffset;
  }
  /**
   * @return string
   */
  public function getBaselineOffset()
  {
    return $this->baselineOffset;
  }
  /**
   * @param bool
   */
  public function setBold($bold)
  {
    $this->bold = $bold;
  }
  /**
   * @return bool
   */
  public function getBold()
  {
    return $this->bold;
  }
  /**
   * @param Dimension
   */
  public function setFontSize(Dimension $fontSize)
  {
    $this->fontSize = $fontSize;
  }
  /**
   * @return Dimension
   */
  public function getFontSize()
  {
    return $this->fontSize;
  }
  /**
   * @param OptionalColor
   */
  public function setForegroundColor(OptionalColor $foregroundColor)
  {
    $this->foregroundColor = $foregroundColor;
  }
  /**
   * @return OptionalColor
   */
  public function getForegroundColor()
  {
    return $this->foregroundColor;
  }
  /**
   * @param bool
   */
  public function setItalic($italic)
  {
    $this->italic = $italic;
  }
  /**
   * @return bool
   */
  public function getItalic()
  {
    return $this->italic;
  }
  /**
   * @param Link
   */
  public function setLink(Link $link)
  {
    $this->link = $link;
  }
  /**
   * @return Link
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param bool
   */
  public function setSmallCaps($smallCaps)
  {
    $this->smallCaps = $smallCaps;
  }
  /**
   * @return bool
   */
  public function getSmallCaps()
  {
    return $this->smallCaps;
  }
  /**
   * @param bool
   */
  public function setStrikethrough($strikethrough)
  {
    $this->strikethrough = $strikethrough;
  }
  /**
   * @return bool
   */
  public function getStrikethrough()
  {
    return $this->strikethrough;
  }
  /**
   * @param bool
   */
  public function setUnderline($underline)
  {
    $this->underline = $underline;
  }
  /**
   * @return bool
   */
  public function getUnderline()
  {
    return $this->underline;
  }
  /**
   * @param WeightedFontFamily
   */
  public function setWeightedFontFamily(WeightedFontFamily $weightedFontFamily)
  {
    $this->weightedFontFamily = $weightedFontFamily;
  }
  /**
   * @return WeightedFontFamily
   */
  public function getWeightedFontFamily()
  {
    return $this->weightedFontFamily;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TextStyle::class, 'Google_Service_Docs_TextStyle');
