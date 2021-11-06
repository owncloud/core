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

class Shape extends \Google\Model
{
  protected $placeholderType = Placeholder::class;
  protected $placeholderDataType = '';
  protected $shapePropertiesType = ShapeProperties::class;
  protected $shapePropertiesDataType = '';
  public $shapeType;
  protected $textType = TextContent::class;
  protected $textDataType = '';

  /**
   * @param Placeholder
   */
  public function setPlaceholder(Placeholder $placeholder)
  {
    $this->placeholder = $placeholder;
  }
  /**
   * @return Placeholder
   */
  public function getPlaceholder()
  {
    return $this->placeholder;
  }
  /**
   * @param ShapeProperties
   */
  public function setShapeProperties(ShapeProperties $shapeProperties)
  {
    $this->shapeProperties = $shapeProperties;
  }
  /**
   * @return ShapeProperties
   */
  public function getShapeProperties()
  {
    return $this->shapeProperties;
  }
  public function setShapeType($shapeType)
  {
    $this->shapeType = $shapeType;
  }
  public function getShapeType()
  {
    return $this->shapeType;
  }
  /**
   * @param TextContent
   */
  public function setText(TextContent $text)
  {
    $this->text = $text;
  }
  /**
   * @return TextContent
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Shape::class, 'Google_Service_Slides_Shape');
