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

class GoodocCharLabel extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "baseLine" => "BaseLine",
        "characterHeight" => "CharacterHeight",
        "color" => "Color",
        "confidence" => "Confidence",
        "fontId" => "FontId",
        "fontSize" => "FontSize",
        "fontSizeFloat" => "FontSizeFloat",
        "fontType" => "FontType",
        "hasUncertainHeight" => "HasUncertainHeight",
        "horizontalScale" => "HorizontalScale",
        "isBold" => "IsBold",
        "isItalic" => "IsItalic",
        "isSmallCaps" => "IsSmallCaps",
        "isStrikeout" => "IsStrikeout",
        "isSubscript" => "IsSubscript",
        "isSuperscript" => "IsSuperscript",
        "isSuspicious" => "IsSuspicious",
        "isUnderlined" => "IsUnderlined",
        "notOcrablePerQA" => "NotOcrablePerQA",
        "penalty" => "Penalty",
        "serifProbability" => "SerifProbability",
  ];
  /**
   * @var int
   */
  public $baseLine;
  /**
   * @var int
   */
  public $characterHeight;
  /**
   * @var int
   */
  public $color;
  /**
   * @var int
   */
  public $confidence;
  /**
   * @var int
   */
  public $fontId;
  /**
   * @var int
   */
  public $fontSize;
  /**
   * @var float
   */
  public $fontSizeFloat;
  /**
   * @var int
   */
  public $fontType;
  /**
   * @var bool
   */
  public $hasUncertainHeight;
  /**
   * @var int
   */
  public $horizontalScale;
  /**
   * @var bool
   */
  public $isBold;
  /**
   * @var bool
   */
  public $isItalic;
  /**
   * @var bool
   */
  public $isSmallCaps;
  /**
   * @var bool
   */
  public $isStrikeout;
  /**
   * @var bool
   */
  public $isSubscript;
  /**
   * @var bool
   */
  public $isSuperscript;
  /**
   * @var bool
   */
  public $isSuspicious;
  /**
   * @var bool
   */
  public $isUnderlined;
  /**
   * @var bool
   */
  public $notOcrablePerQA;
  /**
   * @var int
   */
  public $penalty;
  /**
   * @var int
   */
  public $serifProbability;

  /**
   * @param int
   */
  public function setBaseLine($baseLine)
  {
    $this->baseLine = $baseLine;
  }
  /**
   * @return int
   */
  public function getBaseLine()
  {
    return $this->baseLine;
  }
  /**
   * @param int
   */
  public function setCharacterHeight($characterHeight)
  {
    $this->characterHeight = $characterHeight;
  }
  /**
   * @return int
   */
  public function getCharacterHeight()
  {
    return $this->characterHeight;
  }
  /**
   * @param int
   */
  public function setColor($color)
  {
    $this->color = $color;
  }
  /**
   * @return int
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param int
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return int
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
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
   * @param float
   */
  public function setFontSizeFloat($fontSizeFloat)
  {
    $this->fontSizeFloat = $fontSizeFloat;
  }
  /**
   * @return float
   */
  public function getFontSizeFloat()
  {
    return $this->fontSizeFloat;
  }
  /**
   * @param int
   */
  public function setFontType($fontType)
  {
    $this->fontType = $fontType;
  }
  /**
   * @return int
   */
  public function getFontType()
  {
    return $this->fontType;
  }
  /**
   * @param bool
   */
  public function setHasUncertainHeight($hasUncertainHeight)
  {
    $this->hasUncertainHeight = $hasUncertainHeight;
  }
  /**
   * @return bool
   */
  public function getHasUncertainHeight()
  {
    return $this->hasUncertainHeight;
  }
  /**
   * @param int
   */
  public function setHorizontalScale($horizontalScale)
  {
    $this->horizontalScale = $horizontalScale;
  }
  /**
   * @return int
   */
  public function getHorizontalScale()
  {
    return $this->horizontalScale;
  }
  /**
   * @param bool
   */
  public function setIsBold($isBold)
  {
    $this->isBold = $isBold;
  }
  /**
   * @return bool
   */
  public function getIsBold()
  {
    return $this->isBold;
  }
  /**
   * @param bool
   */
  public function setIsItalic($isItalic)
  {
    $this->isItalic = $isItalic;
  }
  /**
   * @return bool
   */
  public function getIsItalic()
  {
    return $this->isItalic;
  }
  /**
   * @param bool
   */
  public function setIsSmallCaps($isSmallCaps)
  {
    $this->isSmallCaps = $isSmallCaps;
  }
  /**
   * @return bool
   */
  public function getIsSmallCaps()
  {
    return $this->isSmallCaps;
  }
  /**
   * @param bool
   */
  public function setIsStrikeout($isStrikeout)
  {
    $this->isStrikeout = $isStrikeout;
  }
  /**
   * @return bool
   */
  public function getIsStrikeout()
  {
    return $this->isStrikeout;
  }
  /**
   * @param bool
   */
  public function setIsSubscript($isSubscript)
  {
    $this->isSubscript = $isSubscript;
  }
  /**
   * @return bool
   */
  public function getIsSubscript()
  {
    return $this->isSubscript;
  }
  /**
   * @param bool
   */
  public function setIsSuperscript($isSuperscript)
  {
    $this->isSuperscript = $isSuperscript;
  }
  /**
   * @return bool
   */
  public function getIsSuperscript()
  {
    return $this->isSuperscript;
  }
  /**
   * @param bool
   */
  public function setIsSuspicious($isSuspicious)
  {
    $this->isSuspicious = $isSuspicious;
  }
  /**
   * @return bool
   */
  public function getIsSuspicious()
  {
    return $this->isSuspicious;
  }
  /**
   * @param bool
   */
  public function setIsUnderlined($isUnderlined)
  {
    $this->isUnderlined = $isUnderlined;
  }
  /**
   * @return bool
   */
  public function getIsUnderlined()
  {
    return $this->isUnderlined;
  }
  /**
   * @param bool
   */
  public function setNotOcrablePerQA($notOcrablePerQA)
  {
    $this->notOcrablePerQA = $notOcrablePerQA;
  }
  /**
   * @return bool
   */
  public function getNotOcrablePerQA()
  {
    return $this->notOcrablePerQA;
  }
  /**
   * @param int
   */
  public function setPenalty($penalty)
  {
    $this->penalty = $penalty;
  }
  /**
   * @return int
   */
  public function getPenalty()
  {
    return $this->penalty;
  }
  /**
   * @param int
   */
  public function setSerifProbability($serifProbability)
  {
    $this->serifProbability = $serifProbability;
  }
  /**
   * @return int
   */
  public function getSerifProbability()
  {
    return $this->serifProbability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocCharLabel::class, 'Google_Service_Contentwarehouse_GoodocCharLabel');
