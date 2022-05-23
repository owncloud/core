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

class ParagraphStyle extends \Google\Collection
{
  protected $collection_key = 'tabStops';
  /**
   * @var string
   */
  public $alignment;
  /**
   * @var bool
   */
  public $avoidWidowAndOrphan;
  protected $borderBetweenType = ParagraphBorder::class;
  protected $borderBetweenDataType = '';
  protected $borderBottomType = ParagraphBorder::class;
  protected $borderBottomDataType = '';
  protected $borderLeftType = ParagraphBorder::class;
  protected $borderLeftDataType = '';
  protected $borderRightType = ParagraphBorder::class;
  protected $borderRightDataType = '';
  protected $borderTopType = ParagraphBorder::class;
  protected $borderTopDataType = '';
  /**
   * @var string
   */
  public $direction;
  /**
   * @var string
   */
  public $headingId;
  protected $indentEndType = Dimension::class;
  protected $indentEndDataType = '';
  protected $indentFirstLineType = Dimension::class;
  protected $indentFirstLineDataType = '';
  protected $indentStartType = Dimension::class;
  protected $indentStartDataType = '';
  /**
   * @var bool
   */
  public $keepLinesTogether;
  /**
   * @var bool
   */
  public $keepWithNext;
  /**
   * @var float
   */
  public $lineSpacing;
  /**
   * @var string
   */
  public $namedStyleType;
  /**
   * @var bool
   */
  public $pageBreakBefore;
  protected $shadingType = Shading::class;
  protected $shadingDataType = '';
  protected $spaceAboveType = Dimension::class;
  protected $spaceAboveDataType = '';
  protected $spaceBelowType = Dimension::class;
  protected $spaceBelowDataType = '';
  /**
   * @var string
   */
  public $spacingMode;
  protected $tabStopsType = TabStop::class;
  protected $tabStopsDataType = 'array';

  /**
   * @param string
   */
  public function setAlignment($alignment)
  {
    $this->alignment = $alignment;
  }
  /**
   * @return string
   */
  public function getAlignment()
  {
    return $this->alignment;
  }
  /**
   * @param bool
   */
  public function setAvoidWidowAndOrphan($avoidWidowAndOrphan)
  {
    $this->avoidWidowAndOrphan = $avoidWidowAndOrphan;
  }
  /**
   * @return bool
   */
  public function getAvoidWidowAndOrphan()
  {
    return $this->avoidWidowAndOrphan;
  }
  /**
   * @param ParagraphBorder
   */
  public function setBorderBetween(ParagraphBorder $borderBetween)
  {
    $this->borderBetween = $borderBetween;
  }
  /**
   * @return ParagraphBorder
   */
  public function getBorderBetween()
  {
    return $this->borderBetween;
  }
  /**
   * @param ParagraphBorder
   */
  public function setBorderBottom(ParagraphBorder $borderBottom)
  {
    $this->borderBottom = $borderBottom;
  }
  /**
   * @return ParagraphBorder
   */
  public function getBorderBottom()
  {
    return $this->borderBottom;
  }
  /**
   * @param ParagraphBorder
   */
  public function setBorderLeft(ParagraphBorder $borderLeft)
  {
    $this->borderLeft = $borderLeft;
  }
  /**
   * @return ParagraphBorder
   */
  public function getBorderLeft()
  {
    return $this->borderLeft;
  }
  /**
   * @param ParagraphBorder
   */
  public function setBorderRight(ParagraphBorder $borderRight)
  {
    $this->borderRight = $borderRight;
  }
  /**
   * @return ParagraphBorder
   */
  public function getBorderRight()
  {
    return $this->borderRight;
  }
  /**
   * @param ParagraphBorder
   */
  public function setBorderTop(ParagraphBorder $borderTop)
  {
    $this->borderTop = $borderTop;
  }
  /**
   * @return ParagraphBorder
   */
  public function getBorderTop()
  {
    return $this->borderTop;
  }
  /**
   * @param string
   */
  public function setDirection($direction)
  {
    $this->direction = $direction;
  }
  /**
   * @return string
   */
  public function getDirection()
  {
    return $this->direction;
  }
  /**
   * @param string
   */
  public function setHeadingId($headingId)
  {
    $this->headingId = $headingId;
  }
  /**
   * @return string
   */
  public function getHeadingId()
  {
    return $this->headingId;
  }
  /**
   * @param Dimension
   */
  public function setIndentEnd(Dimension $indentEnd)
  {
    $this->indentEnd = $indentEnd;
  }
  /**
   * @return Dimension
   */
  public function getIndentEnd()
  {
    return $this->indentEnd;
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
   * @param bool
   */
  public function setKeepLinesTogether($keepLinesTogether)
  {
    $this->keepLinesTogether = $keepLinesTogether;
  }
  /**
   * @return bool
   */
  public function getKeepLinesTogether()
  {
    return $this->keepLinesTogether;
  }
  /**
   * @param bool
   */
  public function setKeepWithNext($keepWithNext)
  {
    $this->keepWithNext = $keepWithNext;
  }
  /**
   * @return bool
   */
  public function getKeepWithNext()
  {
    return $this->keepWithNext;
  }
  /**
   * @param float
   */
  public function setLineSpacing($lineSpacing)
  {
    $this->lineSpacing = $lineSpacing;
  }
  /**
   * @return float
   */
  public function getLineSpacing()
  {
    return $this->lineSpacing;
  }
  /**
   * @param string
   */
  public function setNamedStyleType($namedStyleType)
  {
    $this->namedStyleType = $namedStyleType;
  }
  /**
   * @return string
   */
  public function getNamedStyleType()
  {
    return $this->namedStyleType;
  }
  /**
   * @param bool
   */
  public function setPageBreakBefore($pageBreakBefore)
  {
    $this->pageBreakBefore = $pageBreakBefore;
  }
  /**
   * @return bool
   */
  public function getPageBreakBefore()
  {
    return $this->pageBreakBefore;
  }
  /**
   * @param Shading
   */
  public function setShading(Shading $shading)
  {
    $this->shading = $shading;
  }
  /**
   * @return Shading
   */
  public function getShading()
  {
    return $this->shading;
  }
  /**
   * @param Dimension
   */
  public function setSpaceAbove(Dimension $spaceAbove)
  {
    $this->spaceAbove = $spaceAbove;
  }
  /**
   * @return Dimension
   */
  public function getSpaceAbove()
  {
    return $this->spaceAbove;
  }
  /**
   * @param Dimension
   */
  public function setSpaceBelow(Dimension $spaceBelow)
  {
    $this->spaceBelow = $spaceBelow;
  }
  /**
   * @return Dimension
   */
  public function getSpaceBelow()
  {
    return $this->spaceBelow;
  }
  /**
   * @param string
   */
  public function setSpacingMode($spacingMode)
  {
    $this->spacingMode = $spacingMode;
  }
  /**
   * @return string
   */
  public function getSpacingMode()
  {
    return $this->spacingMode;
  }
  /**
   * @param TabStop[]
   */
  public function setTabStops($tabStops)
  {
    $this->tabStops = $tabStops;
  }
  /**
   * @return TabStop[]
   */
  public function getTabStops()
  {
    return $this->tabStops;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ParagraphStyle::class, 'Google_Service_Docs_ParagraphStyle');
