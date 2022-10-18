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

class GoodocDocumentPageBlock extends \Google\Collection
{
  protected $collection_key = 'Paragraph';
  protected $internal_gapi_mappings = [
        "blockType" => "BlockType",
        "box" => "Box",
        "label" => "Label",
        "orientationLabel" => "OrientationLabel",
        "paragraph" => "Paragraph",
        "rotatedBox" => "RotatedBox",
        "textConfidence" => "TextConfidence",
  ];
  /**
   * @var int
   */
  public $blockType;
  protected $boxType = GoodocBoundingBox::class;
  protected $boxDataType = '';
  protected $labelType = GoodocLabel::class;
  protected $labelDataType = '';
  protected $orientationLabelType = GoodocOrientationLabel::class;
  protected $orientationLabelDataType = '';
  protected $paragraphType = GoodocParagraph::class;
  protected $paragraphDataType = 'array';
  protected $rotatedBoxType = GoodocRotatedBoundingBox::class;
  protected $rotatedBoxDataType = '';
  /**
   * @var int
   */
  public $textConfidence;

  /**
   * @param int
   */
  public function setBlockType($blockType)
  {
    $this->blockType = $blockType;
  }
  /**
   * @return int
   */
  public function getBlockType()
  {
    return $this->blockType;
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
   * @param GoodocOrientationLabel
   */
  public function setOrientationLabel(GoodocOrientationLabel $orientationLabel)
  {
    $this->orientationLabel = $orientationLabel;
  }
  /**
   * @return GoodocOrientationLabel
   */
  public function getOrientationLabel()
  {
    return $this->orientationLabel;
  }
  /**
   * @param GoodocParagraph[]
   */
  public function setParagraph($paragraph)
  {
    $this->paragraph = $paragraph;
  }
  /**
   * @return GoodocParagraph[]
   */
  public function getParagraph()
  {
    return $this->paragraph;
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
   * @param int
   */
  public function setTextConfidence($textConfidence)
  {
    $this->textConfidence = $textConfidence;
  }
  /**
   * @return int
   */
  public function getTextConfidence()
  {
    return $this->textConfidence;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocDocumentPageBlock::class, 'Google_Service_Contentwarehouse_GoodocDocumentPageBlock');
