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

class Google_Service_Docs_ParagraphStyle extends Google_Collection
{
  protected $collection_key = 'tabStops';
  public $alignment;
  public $avoidWidowAndOrphan;
  protected $borderBetweenType = 'Google_Service_Docs_ParagraphBorder';
  protected $borderBetweenDataType = '';
  protected $borderBottomType = 'Google_Service_Docs_ParagraphBorder';
  protected $borderBottomDataType = '';
  protected $borderLeftType = 'Google_Service_Docs_ParagraphBorder';
  protected $borderLeftDataType = '';
  protected $borderRightType = 'Google_Service_Docs_ParagraphBorder';
  protected $borderRightDataType = '';
  protected $borderTopType = 'Google_Service_Docs_ParagraphBorder';
  protected $borderTopDataType = '';
  public $direction;
  public $headingId;
  protected $indentEndType = 'Google_Service_Docs_Dimension';
  protected $indentEndDataType = '';
  protected $indentFirstLineType = 'Google_Service_Docs_Dimension';
  protected $indentFirstLineDataType = '';
  protected $indentStartType = 'Google_Service_Docs_Dimension';
  protected $indentStartDataType = '';
  public $keepLinesTogether;
  public $keepWithNext;
  public $lineSpacing;
  public $namedStyleType;
  protected $shadingType = 'Google_Service_Docs_Shading';
  protected $shadingDataType = '';
  protected $spaceAboveType = 'Google_Service_Docs_Dimension';
  protected $spaceAboveDataType = '';
  protected $spaceBelowType = 'Google_Service_Docs_Dimension';
  protected $spaceBelowDataType = '';
  public $spacingMode;
  protected $tabStopsType = 'Google_Service_Docs_TabStop';
  protected $tabStopsDataType = 'array';

  public function setAlignment($alignment)
  {
    $this->alignment = $alignment;
  }
  public function getAlignment()
  {
    return $this->alignment;
  }
  public function setAvoidWidowAndOrphan($avoidWidowAndOrphan)
  {
    $this->avoidWidowAndOrphan = $avoidWidowAndOrphan;
  }
  public function getAvoidWidowAndOrphan()
  {
    return $this->avoidWidowAndOrphan;
  }
  /**
   * @param Google_Service_Docs_ParagraphBorder
   */
  public function setBorderBetween(Google_Service_Docs_ParagraphBorder $borderBetween)
  {
    $this->borderBetween = $borderBetween;
  }
  /**
   * @return Google_Service_Docs_ParagraphBorder
   */
  public function getBorderBetween()
  {
    return $this->borderBetween;
  }
  /**
   * @param Google_Service_Docs_ParagraphBorder
   */
  public function setBorderBottom(Google_Service_Docs_ParagraphBorder $borderBottom)
  {
    $this->borderBottom = $borderBottom;
  }
  /**
   * @return Google_Service_Docs_ParagraphBorder
   */
  public function getBorderBottom()
  {
    return $this->borderBottom;
  }
  /**
   * @param Google_Service_Docs_ParagraphBorder
   */
  public function setBorderLeft(Google_Service_Docs_ParagraphBorder $borderLeft)
  {
    $this->borderLeft = $borderLeft;
  }
  /**
   * @return Google_Service_Docs_ParagraphBorder
   */
  public function getBorderLeft()
  {
    return $this->borderLeft;
  }
  /**
   * @param Google_Service_Docs_ParagraphBorder
   */
  public function setBorderRight(Google_Service_Docs_ParagraphBorder $borderRight)
  {
    $this->borderRight = $borderRight;
  }
  /**
   * @return Google_Service_Docs_ParagraphBorder
   */
  public function getBorderRight()
  {
    return $this->borderRight;
  }
  /**
   * @param Google_Service_Docs_ParagraphBorder
   */
  public function setBorderTop(Google_Service_Docs_ParagraphBorder $borderTop)
  {
    $this->borderTop = $borderTop;
  }
  /**
   * @return Google_Service_Docs_ParagraphBorder
   */
  public function getBorderTop()
  {
    return $this->borderTop;
  }
  public function setDirection($direction)
  {
    $this->direction = $direction;
  }
  public function getDirection()
  {
    return $this->direction;
  }
  public function setHeadingId($headingId)
  {
    $this->headingId = $headingId;
  }
  public function getHeadingId()
  {
    return $this->headingId;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setIndentEnd(Google_Service_Docs_Dimension $indentEnd)
  {
    $this->indentEnd = $indentEnd;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getIndentEnd()
  {
    return $this->indentEnd;
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
  public function setKeepLinesTogether($keepLinesTogether)
  {
    $this->keepLinesTogether = $keepLinesTogether;
  }
  public function getKeepLinesTogether()
  {
    return $this->keepLinesTogether;
  }
  public function setKeepWithNext($keepWithNext)
  {
    $this->keepWithNext = $keepWithNext;
  }
  public function getKeepWithNext()
  {
    return $this->keepWithNext;
  }
  public function setLineSpacing($lineSpacing)
  {
    $this->lineSpacing = $lineSpacing;
  }
  public function getLineSpacing()
  {
    return $this->lineSpacing;
  }
  public function setNamedStyleType($namedStyleType)
  {
    $this->namedStyleType = $namedStyleType;
  }
  public function getNamedStyleType()
  {
    return $this->namedStyleType;
  }
  /**
   * @param Google_Service_Docs_Shading
   */
  public function setShading(Google_Service_Docs_Shading $shading)
  {
    $this->shading = $shading;
  }
  /**
   * @return Google_Service_Docs_Shading
   */
  public function getShading()
  {
    return $this->shading;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setSpaceAbove(Google_Service_Docs_Dimension $spaceAbove)
  {
    $this->spaceAbove = $spaceAbove;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getSpaceAbove()
  {
    return $this->spaceAbove;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setSpaceBelow(Google_Service_Docs_Dimension $spaceBelow)
  {
    $this->spaceBelow = $spaceBelow;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getSpaceBelow()
  {
    return $this->spaceBelow;
  }
  public function setSpacingMode($spacingMode)
  {
    $this->spacingMode = $spacingMode;
  }
  public function getSpacingMode()
  {
    return $this->spacingMode;
  }
  /**
   * @param Google_Service_Docs_TabStop
   */
  public function setTabStops($tabStops)
  {
    $this->tabStops = $tabStops;
  }
  /**
   * @return Google_Service_Docs_TabStop
   */
  public function getTabStops()
  {
    return $this->tabStops;
  }
}
