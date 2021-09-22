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

class Shadow extends \Google\Model
{
  public $alignment;
  public $alpha;
  protected $blurRadiusType = Dimension::class;
  protected $blurRadiusDataType = '';
  protected $colorType = OpaqueColor::class;
  protected $colorDataType = '';
  public $propertyState;
  public $rotateWithShape;
  protected $transformType = AffineTransform::class;
  protected $transformDataType = '';
  public $type;

  public function setAlignment($alignment)
  {
    $this->alignment = $alignment;
  }
  public function getAlignment()
  {
    return $this->alignment;
  }
  public function setAlpha($alpha)
  {
    $this->alpha = $alpha;
  }
  public function getAlpha()
  {
    return $this->alpha;
  }
  /**
   * @param Dimension
   */
  public function setBlurRadius(Dimension $blurRadius)
  {
    $this->blurRadius = $blurRadius;
  }
  /**
   * @return Dimension
   */
  public function getBlurRadius()
  {
    return $this->blurRadius;
  }
  /**
   * @param OpaqueColor
   */
  public function setColor(OpaqueColor $color)
  {
    $this->color = $color;
  }
  /**
   * @return OpaqueColor
   */
  public function getColor()
  {
    return $this->color;
  }
  public function setPropertyState($propertyState)
  {
    $this->propertyState = $propertyState;
  }
  public function getPropertyState()
  {
    return $this->propertyState;
  }
  public function setRotateWithShape($rotateWithShape)
  {
    $this->rotateWithShape = $rotateWithShape;
  }
  public function getRotateWithShape()
  {
    return $this->rotateWithShape;
  }
  /**
   * @param AffineTransform
   */
  public function setTransform(AffineTransform $transform)
  {
    $this->transform = $transform;
  }
  /**
   * @return AffineTransform
   */
  public function getTransform()
  {
    return $this->transform;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Shadow::class, 'Google_Service_Slides_Shadow');
