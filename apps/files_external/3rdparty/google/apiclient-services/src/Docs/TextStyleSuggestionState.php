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

class TextStyleSuggestionState extends \Google\Model
{
  /**
   * @var bool
   */
  public $backgroundColorSuggested;
  /**
   * @var bool
   */
  public $baselineOffsetSuggested;
  /**
   * @var bool
   */
  public $boldSuggested;
  /**
   * @var bool
   */
  public $fontSizeSuggested;
  /**
   * @var bool
   */
  public $foregroundColorSuggested;
  /**
   * @var bool
   */
  public $italicSuggested;
  /**
   * @var bool
   */
  public $linkSuggested;
  /**
   * @var bool
   */
  public $smallCapsSuggested;
  /**
   * @var bool
   */
  public $strikethroughSuggested;
  /**
   * @var bool
   */
  public $underlineSuggested;
  /**
   * @var bool
   */
  public $weightedFontFamilySuggested;

  /**
   * @param bool
   */
  public function setBackgroundColorSuggested($backgroundColorSuggested)
  {
    $this->backgroundColorSuggested = $backgroundColorSuggested;
  }
  /**
   * @return bool
   */
  public function getBackgroundColorSuggested()
  {
    return $this->backgroundColorSuggested;
  }
  /**
   * @param bool
   */
  public function setBaselineOffsetSuggested($baselineOffsetSuggested)
  {
    $this->baselineOffsetSuggested = $baselineOffsetSuggested;
  }
  /**
   * @return bool
   */
  public function getBaselineOffsetSuggested()
  {
    return $this->baselineOffsetSuggested;
  }
  /**
   * @param bool
   */
  public function setBoldSuggested($boldSuggested)
  {
    $this->boldSuggested = $boldSuggested;
  }
  /**
   * @return bool
   */
  public function getBoldSuggested()
  {
    return $this->boldSuggested;
  }
  /**
   * @param bool
   */
  public function setFontSizeSuggested($fontSizeSuggested)
  {
    $this->fontSizeSuggested = $fontSizeSuggested;
  }
  /**
   * @return bool
   */
  public function getFontSizeSuggested()
  {
    return $this->fontSizeSuggested;
  }
  /**
   * @param bool
   */
  public function setForegroundColorSuggested($foregroundColorSuggested)
  {
    $this->foregroundColorSuggested = $foregroundColorSuggested;
  }
  /**
   * @return bool
   */
  public function getForegroundColorSuggested()
  {
    return $this->foregroundColorSuggested;
  }
  /**
   * @param bool
   */
  public function setItalicSuggested($italicSuggested)
  {
    $this->italicSuggested = $italicSuggested;
  }
  /**
   * @return bool
   */
  public function getItalicSuggested()
  {
    return $this->italicSuggested;
  }
  /**
   * @param bool
   */
  public function setLinkSuggested($linkSuggested)
  {
    $this->linkSuggested = $linkSuggested;
  }
  /**
   * @return bool
   */
  public function getLinkSuggested()
  {
    return $this->linkSuggested;
  }
  /**
   * @param bool
   */
  public function setSmallCapsSuggested($smallCapsSuggested)
  {
    $this->smallCapsSuggested = $smallCapsSuggested;
  }
  /**
   * @return bool
   */
  public function getSmallCapsSuggested()
  {
    return $this->smallCapsSuggested;
  }
  /**
   * @param bool
   */
  public function setStrikethroughSuggested($strikethroughSuggested)
  {
    $this->strikethroughSuggested = $strikethroughSuggested;
  }
  /**
   * @return bool
   */
  public function getStrikethroughSuggested()
  {
    return $this->strikethroughSuggested;
  }
  /**
   * @param bool
   */
  public function setUnderlineSuggested($underlineSuggested)
  {
    $this->underlineSuggested = $underlineSuggested;
  }
  /**
   * @return bool
   */
  public function getUnderlineSuggested()
  {
    return $this->underlineSuggested;
  }
  /**
   * @param bool
   */
  public function setWeightedFontFamilySuggested($weightedFontFamilySuggested)
  {
    $this->weightedFontFamilySuggested = $weightedFontFamilySuggested;
  }
  /**
   * @return bool
   */
  public function getWeightedFontFamilySuggested()
  {
    return $this->weightedFontFamilySuggested;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TextStyleSuggestionState::class, 'Google_Service_Docs_TextStyleSuggestionState');
