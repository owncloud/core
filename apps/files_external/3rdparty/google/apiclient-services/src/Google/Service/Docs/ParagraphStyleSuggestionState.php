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

class Google_Service_Docs_ParagraphStyleSuggestionState extends Google_Model
{
  public $alignmentSuggested;
  public $avoidWidowAndOrphanSuggested;
  public $borderBetweenSuggested;
  public $borderBottomSuggested;
  public $borderLeftSuggested;
  public $borderRightSuggested;
  public $borderTopSuggested;
  public $directionSuggested;
  public $headingIdSuggested;
  public $indentEndSuggested;
  public $indentFirstLineSuggested;
  public $indentStartSuggested;
  public $keepLinesTogetherSuggested;
  public $keepWithNextSuggested;
  public $lineSpacingSuggested;
  public $namedStyleTypeSuggested;
  protected $shadingSuggestionStateType = 'Google_Service_Docs_ShadingSuggestionState';
  protected $shadingSuggestionStateDataType = '';
  public $spaceAboveSuggested;
  public $spaceBelowSuggested;
  public $spacingModeSuggested;

  public function setAlignmentSuggested($alignmentSuggested)
  {
    $this->alignmentSuggested = $alignmentSuggested;
  }
  public function getAlignmentSuggested()
  {
    return $this->alignmentSuggested;
  }
  public function setAvoidWidowAndOrphanSuggested($avoidWidowAndOrphanSuggested)
  {
    $this->avoidWidowAndOrphanSuggested = $avoidWidowAndOrphanSuggested;
  }
  public function getAvoidWidowAndOrphanSuggested()
  {
    return $this->avoidWidowAndOrphanSuggested;
  }
  public function setBorderBetweenSuggested($borderBetweenSuggested)
  {
    $this->borderBetweenSuggested = $borderBetweenSuggested;
  }
  public function getBorderBetweenSuggested()
  {
    return $this->borderBetweenSuggested;
  }
  public function setBorderBottomSuggested($borderBottomSuggested)
  {
    $this->borderBottomSuggested = $borderBottomSuggested;
  }
  public function getBorderBottomSuggested()
  {
    return $this->borderBottomSuggested;
  }
  public function setBorderLeftSuggested($borderLeftSuggested)
  {
    $this->borderLeftSuggested = $borderLeftSuggested;
  }
  public function getBorderLeftSuggested()
  {
    return $this->borderLeftSuggested;
  }
  public function setBorderRightSuggested($borderRightSuggested)
  {
    $this->borderRightSuggested = $borderRightSuggested;
  }
  public function getBorderRightSuggested()
  {
    return $this->borderRightSuggested;
  }
  public function setBorderTopSuggested($borderTopSuggested)
  {
    $this->borderTopSuggested = $borderTopSuggested;
  }
  public function getBorderTopSuggested()
  {
    return $this->borderTopSuggested;
  }
  public function setDirectionSuggested($directionSuggested)
  {
    $this->directionSuggested = $directionSuggested;
  }
  public function getDirectionSuggested()
  {
    return $this->directionSuggested;
  }
  public function setHeadingIdSuggested($headingIdSuggested)
  {
    $this->headingIdSuggested = $headingIdSuggested;
  }
  public function getHeadingIdSuggested()
  {
    return $this->headingIdSuggested;
  }
  public function setIndentEndSuggested($indentEndSuggested)
  {
    $this->indentEndSuggested = $indentEndSuggested;
  }
  public function getIndentEndSuggested()
  {
    return $this->indentEndSuggested;
  }
  public function setIndentFirstLineSuggested($indentFirstLineSuggested)
  {
    $this->indentFirstLineSuggested = $indentFirstLineSuggested;
  }
  public function getIndentFirstLineSuggested()
  {
    return $this->indentFirstLineSuggested;
  }
  public function setIndentStartSuggested($indentStartSuggested)
  {
    $this->indentStartSuggested = $indentStartSuggested;
  }
  public function getIndentStartSuggested()
  {
    return $this->indentStartSuggested;
  }
  public function setKeepLinesTogetherSuggested($keepLinesTogetherSuggested)
  {
    $this->keepLinesTogetherSuggested = $keepLinesTogetherSuggested;
  }
  public function getKeepLinesTogetherSuggested()
  {
    return $this->keepLinesTogetherSuggested;
  }
  public function setKeepWithNextSuggested($keepWithNextSuggested)
  {
    $this->keepWithNextSuggested = $keepWithNextSuggested;
  }
  public function getKeepWithNextSuggested()
  {
    return $this->keepWithNextSuggested;
  }
  public function setLineSpacingSuggested($lineSpacingSuggested)
  {
    $this->lineSpacingSuggested = $lineSpacingSuggested;
  }
  public function getLineSpacingSuggested()
  {
    return $this->lineSpacingSuggested;
  }
  public function setNamedStyleTypeSuggested($namedStyleTypeSuggested)
  {
    $this->namedStyleTypeSuggested = $namedStyleTypeSuggested;
  }
  public function getNamedStyleTypeSuggested()
  {
    return $this->namedStyleTypeSuggested;
  }
  /**
   * @param Google_Service_Docs_ShadingSuggestionState
   */
  public function setShadingSuggestionState(Google_Service_Docs_ShadingSuggestionState $shadingSuggestionState)
  {
    $this->shadingSuggestionState = $shadingSuggestionState;
  }
  /**
   * @return Google_Service_Docs_ShadingSuggestionState
   */
  public function getShadingSuggestionState()
  {
    return $this->shadingSuggestionState;
  }
  public function setSpaceAboveSuggested($spaceAboveSuggested)
  {
    $this->spaceAboveSuggested = $spaceAboveSuggested;
  }
  public function getSpaceAboveSuggested()
  {
    return $this->spaceAboveSuggested;
  }
  public function setSpaceBelowSuggested($spaceBelowSuggested)
  {
    $this->spaceBelowSuggested = $spaceBelowSuggested;
  }
  public function getSpaceBelowSuggested()
  {
    return $this->spaceBelowSuggested;
  }
  public function setSpacingModeSuggested($spacingModeSuggested)
  {
    $this->spacingModeSuggested = $spacingModeSuggested;
  }
  public function getSpacingModeSuggested()
  {
    return $this->spacingModeSuggested;
  }
}
