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

class Google_Service_Docs_NestingLevel extends Google_Model
{
  public $bulletAlignment;
  public $glyphFormat;
  public $glyphSymbol;
  public $glyphType;
  protected $indentFirstLineType = 'Google_Service_Docs_Dimension';
  protected $indentFirstLineDataType = '';
  protected $indentStartType = 'Google_Service_Docs_Dimension';
  protected $indentStartDataType = '';
  public $startNumber;
  protected $textStyleType = 'Google_Service_Docs_TextStyle';
  protected $textStyleDataType = '';

  public function setBulletAlignment($bulletAlignment)
  {
    $this->bulletAlignment = $bulletAlignment;
  }
  public function getBulletAlignment()
  {
    return $this->bulletAlignment;
  }
  public function setGlyphFormat($glyphFormat)
  {
    $this->glyphFormat = $glyphFormat;
  }
  public function getGlyphFormat()
  {
    return $this->glyphFormat;
  }
  public function setGlyphSymbol($glyphSymbol)
  {
    $this->glyphSymbol = $glyphSymbol;
  }
  public function getGlyphSymbol()
  {
    return $this->glyphSymbol;
  }
  public function setGlyphType($glyphType)
  {
    $this->glyphType = $glyphType;
  }
  public function getGlyphType()
  {
    return $this->glyphType;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setIndentFirstLine(Google_Service_Docs_Dimension $indentFirstLine)
  {
    $this->indentFirstLine = $indentFirstLine;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getIndentFirstLine()
  {
    return $this->indentFirstLine;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setIndentStart(Google_Service_Docs_Dimension $indentStart)
  {
    $this->indentStart = $indentStart;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getIndentStart()
  {
    return $this->indentStart;
  }
  public function setStartNumber($startNumber)
  {
    $this->startNumber = $startNumber;
  }
  public function getStartNumber()
  {
    return $this->startNumber;
  }
  /**
   * @param Google_Service_Docs_TextStyle
   */
  public function setTextStyle(Google_Service_Docs_TextStyle $textStyle)
  {
    $this->textStyle = $textStyle;
  }
  /**
   * @return Google_Service_Docs_TextStyle
   */
  public function getTextStyle()
  {
    return $this->textStyle;
  }
}
