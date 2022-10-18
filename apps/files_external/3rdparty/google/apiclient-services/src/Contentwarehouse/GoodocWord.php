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

class GoodocWord extends \Google\Collection
{
  protected $collection_key = 'Symbol';
  protected $internal_gapi_mappings = [
        "baseline" => "Baseline",
        "box" => "Box",
        "capline" => "Capline",
        "compactSymbolBoxes" => "CompactSymbolBoxes",
        "confidence" => "Confidence",
        "isFromDictionary" => "IsFromDictionary",
        "isIdentifier" => "IsIdentifier",
        "isLastInSentence" => "IsLastInSentence",
        "isNumeric" => "IsNumeric",
        "label" => "Label",
        "penalty" => "Penalty",
        "rotatedBox" => "RotatedBox",
        "symbol" => "Symbol",
  ];
  /**
   * @var int
   */
  public $baseline;
  protected $boxType = GoodocBoundingBox::class;
  protected $boxDataType = '';
  /**
   * @var int
   */
  public $capline;
  protected $compactSymbolBoxesType = GoodocBoxPartitions::class;
  protected $compactSymbolBoxesDataType = '';
  /**
   * @var int
   */
  public $confidence;
  /**
   * @var bool
   */
  public $isFromDictionary;
  /**
   * @var bool
   */
  public $isIdentifier;
  /**
   * @var bool
   */
  public $isLastInSentence;
  /**
   * @var bool
   */
  public $isNumeric;
  protected $labelType = GoodocLabel::class;
  protected $labelDataType = '';
  /**
   * @var int
   */
  public $penalty;
  protected $rotatedBoxType = GoodocRotatedBoundingBox::class;
  protected $rotatedBoxDataType = '';
  protected $symbolType = GoodocSymbol::class;
  protected $symbolDataType = 'array';
  protected $alternatesType = GoodocWordAlternates::class;
  protected $alternatesDataType = '';
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $writingDirection;

  /**
   * @param int
   */
  public function setBaseline($baseline)
  {
    $this->baseline = $baseline;
  }
  /**
   * @return int
   */
  public function getBaseline()
  {
    return $this->baseline;
  }
  /**
   * @param GoodocBoundingBox
   */
  public function setBox(GoodocBoundingBox $box)
  {
    $this->box = $box;
  }
  /**
   * @return GoodocBoundingBox
   */
  public function getBox()
  {
    return $this->box;
  }
  /**
   * @param int
   */
  public function setCapline($capline)
  {
    $this->capline = $capline;
  }
  /**
   * @return int
   */
  public function getCapline()
  {
    return $this->capline;
  }
  /**
   * @param GoodocBoxPartitions
   */
  public function setCompactSymbolBoxes(GoodocBoxPartitions $compactSymbolBoxes)
  {
    $this->compactSymbolBoxes = $compactSymbolBoxes;
  }
  /**
   * @return GoodocBoxPartitions
   */
  public function getCompactSymbolBoxes()
  {
    return $this->compactSymbolBoxes;
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
   * @param bool
   */
  public function setIsFromDictionary($isFromDictionary)
  {
    $this->isFromDictionary = $isFromDictionary;
  }
  /**
   * @return bool
   */
  public function getIsFromDictionary()
  {
    return $this->isFromDictionary;
  }
  /**
   * @param bool
   */
  public function setIsIdentifier($isIdentifier)
  {
    $this->isIdentifier = $isIdentifier;
  }
  /**
   * @return bool
   */
  public function getIsIdentifier()
  {
    return $this->isIdentifier;
  }
  /**
   * @param bool
   */
  public function setIsLastInSentence($isLastInSentence)
  {
    $this->isLastInSentence = $isLastInSentence;
  }
  /**
   * @return bool
   */
  public function getIsLastInSentence()
  {
    return $this->isLastInSentence;
  }
  /**
   * @param bool
   */
  public function setIsNumeric($isNumeric)
  {
    $this->isNumeric = $isNumeric;
  }
  /**
   * @return bool
   */
  public function getIsNumeric()
  {
    return $this->isNumeric;
  }
  /**
   * @param GoodocLabel
   */
  public function setLabel(GoodocLabel $label)
  {
    $this->label = $label;
  }
  /**
   * @return GoodocLabel
   */
  public function getLabel()
  {
    return $this->label;
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
   * @param GoodocRotatedBoundingBox
   */
  public function setRotatedBox(GoodocRotatedBoundingBox $rotatedBox)
  {
    $this->rotatedBox = $rotatedBox;
  }
  /**
   * @return GoodocRotatedBoundingBox
   */
  public function getRotatedBox()
  {
    return $this->rotatedBox;
  }
  /**
   * @param GoodocSymbol[]
   */
  public function setSymbol($symbol)
  {
    $this->symbol = $symbol;
  }
  /**
   * @return GoodocSymbol[]
   */
  public function getSymbol()
  {
    return $this->symbol;
  }
  /**
   * @param GoodocWordAlternates
   */
  public function setAlternates(GoodocWordAlternates $alternates)
  {
    $this->alternates = $alternates;
  }
  /**
   * @return GoodocWordAlternates
   */
  public function getAlternates()
  {
    return $this->alternates;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param string
   */
  public function setWritingDirection($writingDirection)
  {
    $this->writingDirection = $writingDirection;
  }
  /**
   * @return string
   */
  public function getWritingDirection()
  {
    return $this->writingDirection;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocWord::class, 'Google_Service_Contentwarehouse_GoodocWord');
