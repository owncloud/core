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

class TextFormat extends \Google\Model
{
  /**
   * @var bool
   */
  public $bold;
  /**
   * @var string
   */
  public $fontFamily;
  /**
   * @var int
   */
  public $fontSize;
  protected $foregroundColorType = Color::class;
  protected $foregroundColorDataType = '';
  protected $foregroundColorStyleType = ColorStyle::class;
  protected $foregroundColorStyleDataType = '';
  /**
   * @var bool
   */
  public $italic;
  protected $linkType = Link::class;
  protected $linkDataType = '';
  /**
   * @var bool
   */
  public $strikethrough;
  /**
   * @var bool
   */
  public $underline;

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
   * @param string
   */
  public function setFontFamily($fontFamily)
  {
    $this->fontFamily = $fontFamily;
  }
  /**
   * @return string
   */
  public function getFontFamily()
  {
    return $this->fontFamily;
  }
  /**
   * @param int
   */
  public function setFontSize($fontSize)
  {
    $this->fontSize = $fontSize;
  }
  /**
   * @return int
   */
  public function getFontSize()
  {
    return $this->fontSize;
  }
  /**
   * @param Color
   */
  public function setForegroundColor(Color $foregroundColor)
  {
    $this->foregroundColor = $foregroundColor;
  }
  /**
   * @return Color
   */
  public function getForegroundColor()
  {
    return $this->foregroundColor;
  }
  /**
   * @param ColorStyle
   */
  public function setForegroundColorStyle(ColorStyle $foregroundColorStyle)
  {
    $this->foregroundColorStyle = $foregroundColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getForegroundColorStyle()
  {
    return $this->foregroundColorStyle;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TextFormat::class, 'Google_Service_Sheets_TextFormat');
