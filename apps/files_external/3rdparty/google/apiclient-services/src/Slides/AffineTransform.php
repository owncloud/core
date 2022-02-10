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

class AffineTransform extends \Google\Model
{
  public $scaleX;
  public $scaleY;
  public $shearX;
  public $shearY;
  public $translateX;
  public $translateY;
  /**
   * @var string
   */
  public $unit;

  public function setScaleX($scaleX)
  {
    $this->scaleX = $scaleX;
  }
  public function getScaleX()
  {
    return $this->scaleX;
  }
  public function setScaleY($scaleY)
  {
    $this->scaleY = $scaleY;
  }
  public function getScaleY()
  {
    return $this->scaleY;
  }
  public function setShearX($shearX)
  {
    $this->shearX = $shearX;
  }
  public function getShearX()
  {
    return $this->shearX;
  }
  public function setShearY($shearY)
  {
    $this->shearY = $shearY;
  }
  public function getShearY()
  {
    return $this->shearY;
  }
  public function setTranslateX($translateX)
  {
    $this->translateX = $translateX;
  }
  public function getTranslateX()
  {
    return $this->translateX;
  }
  public function setTranslateY($translateY)
  {
    $this->translateY = $translateY;
  }
  public function getTranslateY()
  {
    return $this->translateY;
  }
  /**
   * @param string
   */
  public function setUnit($unit)
  {
    $this->unit = $unit;
  }
  /**
   * @return string
   */
  public function getUnit()
  {
    return $this->unit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AffineTransform::class, 'Google_Service_Slides_AffineTransform');
