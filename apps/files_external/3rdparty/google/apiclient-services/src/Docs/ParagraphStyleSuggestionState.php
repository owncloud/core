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

class ParagraphStyleSuggestionState extends \Google\Model
{
  /**
   * @var bool
   */
  public $alignmentSuggested;
  /**
   * @var bool
   */
  public $avoidWidowAndOrphanSuggested;
  /**
   * @var bool
   */
  public $borderBetweenSuggested;
  /**
   * @var bool
   */
  public $borderBottomSuggested;
  /**
   * @var bool
   */
  public $borderLeftSuggested;
  /**
   * @var bool
   */
  public $borderRightSuggested;
  /**
   * @var bool
   */
  public $borderTopSuggested;
  /**
   * @var bool
   */
  public $directionSuggested;
  /**
   * @var bool
   */
  public $headingIdSuggested;
  /**
   * @var bool
   */
  public $indentEndSuggested;
  /**
   * @var bool
   */
  public $indentFirstLineSuggested;
  /**
   * @var bool
   */
  public $indentStartSuggested;
  /**
   * @var bool
   */
  public $keepLinesTogetherSuggested;
  /**
   * @var bool
   */
  public $keepWithNextSuggested;
  /**
   * @var bool
   */
  public $lineSpacingSuggested;
  /**
   * @var bool
   */
  public $namedStyleTypeSuggested;
  /**
   * @var bool
   */
  public $pageBreakBeforeSuggested;
  protected $shadingSuggestionStateType = ShadingSuggestionState::class;
  protected $shadingSuggestionStateDataType = '';
  /**
   * @var bool
   */
  public $spaceAboveSuggested;
  /**
   * @var bool
   */
  public $spaceBelowSuggested;
  /**
   * @var bool
   */
  public $spacingModeSuggested;

  /**
   * @param bool
   */
  public function setAlignmentSuggested($alignmentSuggested)
  {
    $this->alignmentSuggested = $alignmentSuggested;
  }
  /**
   * @return bool
   */
  public function getAlignmentSuggested()
  {
    return $this->alignmentSuggested;
  }
  /**
   * @param bool
   */
  public function setAvoidWidowAndOrphanSuggested($avoidWidowAndOrphanSuggested)
  {
    $this->avoidWidowAndOrphanSuggested = $avoidWidowAndOrphanSuggested;
  }
  /**
   * @return bool
   */
  public function getAvoidWidowAndOrphanSuggested()
  {
    return $this->avoidWidowAndOrphanSuggested;
  }
  /**
   * @param bool
   */
  public function setBorderBetweenSuggested($borderBetweenSuggested)
  {
    $this->borderBetweenSuggested = $borderBetweenSuggested;
  }
  /**
   * @return bool
   */
  public function getBorderBetweenSuggested()
  {
    return $this->borderBetweenSuggested;
  }
  /**
   * @param bool
   */
  public function setBorderBottomSuggested($borderBottomSuggested)
  {
    $this->borderBottomSuggested = $borderBottomSuggested;
  }
  /**
   * @return bool
   */
  public function getBorderBottomSuggested()
  {
    return $this->borderBottomSuggested;
  }
  /**
   * @param bool
   */
  public function setBorderLeftSuggested($borderLeftSuggested)
  {
    $this->borderLeftSuggested = $borderLeftSuggested;
  }
  /**
   * @return bool
   */
  public function getBorderLeftSuggested()
  {
    return $this->borderLeftSuggested;
  }
  /**
   * @param bool
   */
  public function setBorderRightSuggested($borderRightSuggested)
  {
    $this->borderRightSuggested = $borderRightSuggested;
  }
  /**
   * @return bool
   */
  public function getBorderRightSuggested()
  {
    return $this->borderRightSuggested;
  }
  /**
   * @param bool
   */
  public function setBorderTopSuggested($borderTopSuggested)
  {
    $this->borderTopSuggested = $borderTopSuggested;
  }
  /**
   * @return bool
   */
  public function getBorderTopSuggested()
  {
    return $this->borderTopSuggested;
  }
  /**
   * @param bool
   */
  public function setDirectionSuggested($directionSuggested)
  {
    $this->directionSuggested = $directionSuggested;
  }
  /**
   * @return bool
   */
  public function getDirectionSuggested()
  {
    return $this->directionSuggested;
  }
  /**
   * @param bool
   */
  public function setHeadingIdSuggested($headingIdSuggested)
  {
    $this->headingIdSuggested = $headingIdSuggested;
  }
  /**
   * @return bool
   */
  public function getHeadingIdSuggested()
  {
    return $this->headingIdSuggested;
  }
  /**
   * @param bool
   */
  public function setIndentEndSuggested($indentEndSuggested)
  {
    $this->indentEndSuggested = $indentEndSuggested;
  }
  /**
   * @return bool
   */
  public function getIndentEndSuggested()
  {
    return $this->indentEndSuggested;
  }
  /**
   * @param bool
   */
  public function setIndentFirstLineSuggested($indentFirstLineSuggested)
  {
    $this->indentFirstLineSuggested = $indentFirstLineSuggested;
  }
  /**
   * @return bool
   */
  public function getIndentFirstLineSuggested()
  {
    return $this->indentFirstLineSuggested;
  }
  /**
   * @param bool
   */
  public function setIndentStartSuggested($indentStartSuggested)
  {
    $this->indentStartSuggested = $indentStartSuggested;
  }
  /**
   * @return bool
   */
  public function getIndentStartSuggested()
  {
    return $this->indentStartSuggested;
  }
  /**
   * @param bool
   */
  public function setKeepLinesTogetherSuggested($keepLinesTogetherSuggested)
  {
    $this->keepLinesTogetherSuggested = $keepLinesTogetherSuggested;
  }
  /**
   * @return bool
   */
  public function getKeepLinesTogetherSuggested()
  {
    return $this->keepLinesTogetherSuggested;
  }
  /**
   * @param bool
   */
  public function setKeepWithNextSuggested($keepWithNextSuggested)
  {
    $this->keepWithNextSuggested = $keepWithNextSuggested;
  }
  /**
   * @return bool
   */
  public function getKeepWithNextSuggested()
  {
    return $this->keepWithNextSuggested;
  }
  /**
   * @param bool
   */
  public function setLineSpacingSuggested($lineSpacingSuggested)
  {
    $this->lineSpacingSuggested = $lineSpacingSuggested;
  }
  /**
   * @return bool
   */
  public function getLineSpacingSuggested()
  {
    return $this->lineSpacingSuggested;
  }
  /**
   * @param bool
   */
  public function setNamedStyleTypeSuggested($namedStyleTypeSuggested)
  {
    $this->namedStyleTypeSuggested = $namedStyleTypeSuggested;
  }
  /**
   * @return bool
   */
  public function getNamedStyleTypeSuggested()
  {
    return $this->namedStyleTypeSuggested;
  }
  /**
   * @param bool
   */
  public function setPageBreakBeforeSuggested($pageBreakBeforeSuggested)
  {
    $this->pageBreakBeforeSuggested = $pageBreakBeforeSuggested;
  }
  /**
   * @return bool
   */
  public function getPageBreakBeforeSuggested()
  {
    return $this->pageBreakBeforeSuggested;
  }
  /**
   * @param ShadingSuggestionState
   */
  public function setShadingSuggestionState(ShadingSuggestionState $shadingSuggestionState)
  {
    $this->shadingSuggestionState = $shadingSuggestionState;
  }
  /**
   * @return ShadingSuggestionState
   */
  public function getShadingSuggestionState()
  {
    return $this->shadingSuggestionState;
  }
  /**
   * @param bool
   */
  public function setSpaceAboveSuggested($spaceAboveSuggested)
  {
    $this->spaceAboveSuggested = $spaceAboveSuggested;
  }
  /**
   * @return bool
   */
  public function getSpaceAboveSuggested()
  {
    return $this->spaceAboveSuggested;
  }
  /**
   * @param bool
   */
  public function setSpaceBelowSuggested($spaceBelowSuggested)
  {
    $this->spaceBelowSuggested = $spaceBelowSuggested;
  }
  /**
   * @return bool
   */
  public function getSpaceBelowSuggested()
  {
    return $this->spaceBelowSuggested;
  }
  /**
   * @param bool
   */
  public function setSpacingModeSuggested($spacingModeSuggested)
  {
    $this->spacingModeSuggested = $spacingModeSuggested;
  }
  /**
   * @return bool
   */
  public function getSpacingModeSuggested()
  {
    return $this->spacingModeSuggested;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ParagraphStyleSuggestionState::class, 'Google_Service_Docs_ParagraphStyleSuggestionState');
