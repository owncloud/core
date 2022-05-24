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
  /**
   * @var string
   */
  public $alignment;
  /**
   * @var float
   */
  public $alpha;
  protected $blurRadiusType = Dimension::class;
  protected $blurRadiusDataType = '';
  protected $colorType = OpaqueColor::class;
  protected $colorDataType = '';
  /**
   * @var string
   */
  public $propertyState;
  /**
   * @var bool
   */
  public $rotateWithShape;
  protected $transformType = AffineTransform::class;
  protected $transformDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setAlignment($alignment)
  {
    $this->alignment = $alignment;
  }
  /**
   * @return string
   */
  public function getAlignment()
  {
    return $this->alignment;
  }
  /**
   * @param float
   */
  public function setAlpha($alpha)
  {
    $this->alpha = $alpha;
  }
  /**
   * @return float
   */
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
  /**
   * @param string
   */
  public function setPropertyState($propertyState)
  {
    $this->propertyState = $propertyState;
  }
  /**
   * @return string
   */
  public function getPropertyState()
  {
    return $this->propertyState;
  }
  /**
   * @param bool
   */
  public function setRotateWithShape($rotateWithShape)
  {
    $this->rotateWithShape = $rotateWithShape;
  }
  /**
   * @return bool
   */
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
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Shadow::class, 'Google_Service_Slides_Shadow');
