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

namespace Google\Service\Contentwarehouse;

class GoodocFontSizeStats extends \Google\Model
{
  /**
   * @var int
   */
  public $fontId;
  /**
   * @var int
   */
  public $fontSize;
  /**
   * @var int
   */
  public $medianHeight;
  /**
   * @var int
   */
  public $medianLineHeight;
  /**
   * @var int
   */
  public $medianLineSpace;
  /**
   * @var int
   */
  public $medianLineSpan;
  /**
   * @var int
   */
  public $medianWidth;
  /**
   * @var int
   */
  public $numLineSpaces;
  /**
   * @var int
   */
  public $numLines;
  /**
   * @var int
   */
  public $numSymbols;

  /**
   * @param int
   */
  public function setFontId($fontId)
  {
    $this->fontId = $fontId;
  }
  /**
   * @return int
   */
  public function getFontId()
  {
    return $this->fontId;
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
   * @param int
   */
  public function setMedianHeight($medianHeight)
  {
    $this->medianHeight = $medianHeight;
  }
  /**
   * @return int
   */
  public function getMedianHeight()
  {
    return $this->medianHeight;
  }
  /**
   * @param int
   */
  public function setMedianLineHeight($medianLineHeight)
  {
    $this->medianLineHeight = $medianLineHeight;
  }
  /**
   * @return int
   */
  public function getMedianLineHeight()
  {
    return $this->medianLineHeight;
  }
  /**
   * @param int
   */
  public function setMedianLineSpace($medianLineSpace)
  {
    $this->medianLineSpace = $medianLineSpace;
  }
  /**
   * @return int
   */
  public function getMedianLineSpace()
  {
    return $this->medianLineSpace;
  }
  /**
   * @param int
   */
  public function setMedianLineSpan($medianLineSpan)
  {
    $this->medianLineSpan = $medianLineSpan;
  }
  /**
   * @return int
   */
  public function getMedianLineSpan()
  {
    return $this->medianLineSpan;
  }
  /**
   * @param int
   */
  public function setMedianWidth($medianWidth)
  {
    $this->medianWidth = $medianWidth;
  }
  /**
   * @return int
   */
  public function getMedianWidth()
  {
    return $this->medianWidth;
  }
  /**
   * @param int
   */
  public function setNumLineSpaces($numLineSpaces)
  {
    $this->numLineSpaces = $numLineSpaces;
  }
  /**
   * @return int
   */
  public function getNumLineSpaces()
  {
    return $this->numLineSpaces;
  }
  /**
   * @param int
   */
  public function setNumLines($numLines)
  {
    $this->numLines = $numLines;
  }
  /**
   * @return int
   */
  public function getNumLines()
  {
    return $this->numLines;
  }
  /**
   * @param int
   */
  public function setNumSymbols($numSymbols)
  {
    $this->numSymbols = $numSymbols;
  }
  /**
   * @return int
   */
  public function getNumSymbols()
  {
    return $this->numSymbols;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocFontSizeStats::class, 'Google_Service_Contentwarehouse_GoodocFontSizeStats');
