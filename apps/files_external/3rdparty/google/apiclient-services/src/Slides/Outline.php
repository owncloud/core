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

class Outline extends \Google\Model
{
  /**
   * @var string
   */
  public $dashStyle;
  protected $outlineFillType = OutlineFill::class;
  protected $outlineFillDataType = '';
  /**
   * @var string
   */
  public $propertyState;
  protected $weightType = Dimension::class;
  protected $weightDataType = '';

  /**
   * @param string
   */
  public function setDashStyle($dashStyle)
  {
    $this->dashStyle = $dashStyle;
  }
  /**
   * @return string
   */
  public function getDashStyle()
  {
    return $this->dashStyle;
  }
  /**
   * @param OutlineFill
   */
  public function setOutlineFill(OutlineFill $outlineFill)
  {
    $this->outlineFill = $outlineFill;
  }
  /**
   * @return OutlineFill
   */
  public function getOutlineFill()
  {
    return $this->outlineFill;
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
   * @param Dimension
   */
  public function setWeight(Dimension $weight)
  {
    $this->weight = $weight;
  }
  /**
   * @return Dimension
   */
  public function getWeight()
  {
    return $this->weight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Outline::class, 'Google_Service_Slides_Outline');
