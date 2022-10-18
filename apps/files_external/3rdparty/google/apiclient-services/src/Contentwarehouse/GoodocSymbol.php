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

class GoodocSymbol extends \Google\Collection
{
  protected $collection_key = 'symbolvariant';
  protected $internal_gapi_mappings = [
        "box" => "Box",
        "code" => "Code",
        "label" => "Label",
        "rotatedBox" => "RotatedBox",
  ];
  protected $boxType = GoodocBoundingBox::class;
  protected $boxDataType = '';
  /**
   * @var int
   */
  public $code;
  protected $labelType = GoodocLabel::class;
  protected $labelDataType = '';
  protected $rotatedBoxType = GoodocRotatedBoundingBox::class;
  protected $rotatedBoxDataType = '';
  protected $symbolvariantType = GoodocSymbolSymbolVariant::class;
  protected $symbolvariantDataType = 'array';

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
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return int
   */
  public function getCode()
  {
    return $this->code;
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
   * @param GoodocSymbolSymbolVariant[]
   */
  public function setSymbolvariant($symbolvariant)
  {
    $this->symbolvariant = $symbolvariant;
  }
  /**
   * @return GoodocSymbolSymbolVariant[]
   */
  public function getSymbolvariant()
  {
    return $this->symbolvariant;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocSymbol::class, 'Google_Service_Contentwarehouse_GoodocSymbol');
