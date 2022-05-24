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

class NestingLevel extends \Google\Model
{
  /**
   * @var string
   */
  public $bulletAlignment;
  /**
   * @var string
   */
  public $glyphFormat;
  /**
   * @var string
   */
  public $glyphSymbol;
  /**
   * @var string
   */
  public $glyphType;
  protected $indentFirstLineType = Dimension::class;
  protected $indentFirstLineDataType = '';
  protected $indentStartType = Dimension::class;
  protected $indentStartDataType = '';
  /**
   * @var int
   */
  public $startNumber;
  protected $textStyleType = TextStyle::class;
  protected $textStyleDataType = '';

  /**
   * @param string
   */
  public function setBulletAlignment($bulletAlignment)
  {
    $this->bulletAlignment = $bulletAlignment;
  }
  /**
   * @return string
   */
  public function getBulletAlignment()
  {
    return $this->bulletAlignment;
  }
  /**
   * @param string
   */
  public function setGlyphFormat($glyphFormat)
  {
    $this->glyphFormat = $glyphFormat;
  }
  /**
   * @return string
   */
  public function getGlyphFormat()
  {
    return $this->glyphFormat;
  }
  /**
   * @param string
   */
  public function setGlyphSymbol($glyphSymbol)
  {
    $this->glyphSymbol = $glyphSymbol;
  }
  /**
   * @return string
   */
  public function getGlyphSymbol()
  {
    return $this->glyphSymbol;
  }
  /**
   * @param string
   */
  public function setGlyphType($glyphType)
  {
    $this->glyphType = $glyphType;
  }
  /**
   * @return string
   */
  public function getGlyphType()
  {
    return $this->glyphType;
  }
  /**
   * @param Dimension
   */
  public function setIndentFirstLine(Dimension $indentFirstLine)
  {
    $this->indentFirstLine = $indentFirstLine;
  }
  /**
   * @return Dimension
   */
  public function getIndentFirstLine()
  {
    return $this->indentFirstLine;
  }
  /**
   * @param Dimension
   */
  public function setIndentStart(Dimension $indentStart)
  {
    $this->indentStart = $indentStart;
  }
  /**
   * @return Dimension
   */
  public function getIndentStart()
  {
    return $this->indentStart;
  }
  /**
   * @param int
   */
  public function setStartNumber($startNumber)
  {
    $this->startNumber = $startNumber;
  }
  /**
   * @return int
   */
  public function getStartNumber()
  {
    return $this->startNumber;
  }
  /**
   * @param TextStyle
   */
  public function setTextStyle(TextStyle $textStyle)
  {
    $this->textStyle = $textStyle;
  }
  /**
   * @return TextStyle
   */
  public function getTextStyle()
  {
    return $this->textStyle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NestingLevel::class, 'Google_Service_Docs_NestingLevel');
