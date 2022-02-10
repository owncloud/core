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

class NestingLevelSuggestionState extends \Google\Model
{
  /**
   * @var bool
   */
  public $bulletAlignmentSuggested;
  /**
   * @var bool
   */
  public $glyphFormatSuggested;
  /**
   * @var bool
   */
  public $glyphSymbolSuggested;
  /**
   * @var bool
   */
  public $glyphTypeSuggested;
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
  public $startNumberSuggested;
  protected $textStyleSuggestionStateType = TextStyleSuggestionState::class;
  protected $textStyleSuggestionStateDataType = '';

  /**
   * @param bool
   */
  public function setBulletAlignmentSuggested($bulletAlignmentSuggested)
  {
    $this->bulletAlignmentSuggested = $bulletAlignmentSuggested;
  }
  /**
   * @return bool
   */
  public function getBulletAlignmentSuggested()
  {
    return $this->bulletAlignmentSuggested;
  }
  /**
   * @param bool
   */
  public function setGlyphFormatSuggested($glyphFormatSuggested)
  {
    $this->glyphFormatSuggested = $glyphFormatSuggested;
  }
  /**
   * @return bool
   */
  public function getGlyphFormatSuggested()
  {
    return $this->glyphFormatSuggested;
  }
  /**
   * @param bool
   */
  public function setGlyphSymbolSuggested($glyphSymbolSuggested)
  {
    $this->glyphSymbolSuggested = $glyphSymbolSuggested;
  }
  /**
   * @return bool
   */
  public function getGlyphSymbolSuggested()
  {
    return $this->glyphSymbolSuggested;
  }
  /**
   * @param bool
   */
  public function setGlyphTypeSuggested($glyphTypeSuggested)
  {
    $this->glyphTypeSuggested = $glyphTypeSuggested;
  }
  /**
   * @return bool
   */
  public function getGlyphTypeSuggested()
  {
    return $this->glyphTypeSuggested;
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
  public function setStartNumberSuggested($startNumberSuggested)
  {
    $this->startNumberSuggested = $startNumberSuggested;
  }
  /**
   * @return bool
   */
  public function getStartNumberSuggested()
  {
    return $this->startNumberSuggested;
  }
  /**
   * @param TextStyleSuggestionState
   */
  public function setTextStyleSuggestionState(TextStyleSuggestionState $textStyleSuggestionState)
  {
    $this->textStyleSuggestionState = $textStyleSuggestionState;
  }
  /**
   * @return TextStyleSuggestionState
   */
  public function getTextStyleSuggestionState()
  {
    return $this->textStyleSuggestionState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NestingLevelSuggestionState::class, 'Google_Service_Docs_NestingLevelSuggestionState');
