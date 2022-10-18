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

class GoodocParagraph extends \Google\Collection
{
  protected $collection_key = 'route';
  protected $internal_gapi_mappings = [
        "box" => "Box",
        "firstLineIndent" => "FirstLineIndent",
        "label" => "Label",
        "leftIndent" => "LeftIndent",
        "lineSpacing" => "LineSpacing",
        "orientationLabel" => "OrientationLabel",
        "rightIndent" => "RightIndent",
        "rotatedBox" => "RotatedBox",
        "spaceAfter" => "SpaceAfter",
        "spaceBefore" => "SpaceBefore",
        "subsumedParagraphProperties" => "SubsumedParagraphProperties",
        "textConfidence" => "TextConfidence",
        "width" => "Width",
  ];
  protected $boxType = GoodocBoundingBox::class;
  protected $boxDataType = '';
  /**
   * @var int
   */
  public $firstLineIndent;
  protected $labelType = GoodocLabel::class;
  protected $labelDataType = '';
  /**
   * @var int
   */
  public $leftIndent;
  /**
   * @var int
   */
  public $lineSpacing;
  protected $orientationLabelType = GoodocOrientationLabel::class;
  protected $orientationLabelDataType = '';
  /**
   * @var int
   */
  public $rightIndent;
  protected $rotatedBoxType = GoodocRotatedBoundingBox::class;
  protected $rotatedBoxDataType = '';
  /**
   * @var int
   */
  public $spaceAfter;
  /**
   * @var int
   */
  public $spaceBefore;
  protected $subsumedParagraphPropertiesType = GoodocParagraph::class;
  protected $subsumedParagraphPropertiesDataType = 'array';
  /**
   * @var int
   */
  public $textConfidence;
  /**
   * @var int
   */
  public $width;
  /**
   * @var int
   */
  public $alignment;
  protected $droppedcapType = GoodocParagraphDroppedCap::class;
  protected $droppedcapDataType = '';
  protected $routeType = GoodocParagraphRoute::class;
  protected $routeDataType = 'array';

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
  public function setFirstLineIndent($firstLineIndent)
  {
    $this->firstLineIndent = $firstLineIndent;
  }
  /**
   * @return int
   */
  public function getFirstLineIndent()
  {
    return $this->firstLineIndent;
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
  public function setLeftIndent($leftIndent)
  {
    $this->leftIndent = $leftIndent;
  }
  /**
   * @return int
   */
  public function getLeftIndent()
  {
    return $this->leftIndent;
  }
  /**
   * @param int
   */
  public function setLineSpacing($lineSpacing)
  {
    $this->lineSpacing = $lineSpacing;
  }
  /**
   * @return int
   */
  public function getLineSpacing()
  {
    return $this->lineSpacing;
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
   * @param int
   */
  public function setRightIndent($rightIndent)
  {
    $this->rightIndent = $rightIndent;
  }
  /**
   * @return int
   */
  public function getRightIndent()
  {
    return $this->rightIndent;
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
  public function setSpaceAfter($spaceAfter)
  {
    $this->spaceAfter = $spaceAfter;
  }
  /**
   * @return int
   */
  public function getSpaceAfter()
  {
    return $this->spaceAfter;
  }
  /**
   * @param int
   */
  public function setSpaceBefore($spaceBefore)
  {
    $this->spaceBefore = $spaceBefore;
  }
  /**
   * @return int
   */
  public function getSpaceBefore()
  {
    return $this->spaceBefore;
  }
  /**
   * @param GoodocParagraph[]
   */
  public function setSubsumedParagraphProperties($subsumedParagraphProperties)
  {
    $this->subsumedParagraphProperties = $subsumedParagraphProperties;
  }
  /**
   * @return GoodocParagraph[]
   */
  public function getSubsumedParagraphProperties()
  {
    return $this->subsumedParagraphProperties;
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
  /**
   * @param int
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
  /**
   * @param int
   */
  public function setAlignment($alignment)
  {
    $this->alignment = $alignment;
  }
  /**
   * @return int
   */
  public function getAlignment()
  {
    return $this->alignment;
  }
  /**
   * @param GoodocParagraphDroppedCap
   */
  public function setDroppedcap(GoodocParagraphDroppedCap $droppedcap)
  {
    $this->droppedcap = $droppedcap;
  }
  /**
   * @return GoodocParagraphDroppedCap
   */
  public function getDroppedcap()
  {
    return $this->droppedcap;
  }
  /**
   * @param GoodocParagraphRoute[]
   */
  public function setRoute($route)
  {
    $this->route = $route;
  }
  /**
   * @return GoodocParagraphRoute[]
   */
  public function getRoute()
  {
    return $this->route;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocParagraph::class, 'Google_Service_Contentwarehouse_GoodocParagraph');
