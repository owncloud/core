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

namespace Google\Service\Slides;

class ParagraphStyle extends \Google\Model
{
  /**
   * @var string
   */
  public $alignment;
  /**
   * @var string
   */
  public $direction;
  protected $indentEndType = Dimension::class;
  protected $indentEndDataType = '';
  protected $indentFirstLineType = Dimension::class;
  protected $indentFirstLineDataType = '';
  protected $indentStartType = Dimension::class;
  protected $indentStartDataType = '';
  /**
   * @var float
   */
  public $lineSpacing;
  protected $spaceAboveType = Dimension::class;
  protected $spaceAboveDataType = '';
  protected $spaceBelowType = Dimension::class;
  protected $spaceBelowDataType = '';
  /**
   * @var string
   */
  public $spacingMode;

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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ParagraphStyle::class, 'Google_Service_Slides_ParagraphStyle');
