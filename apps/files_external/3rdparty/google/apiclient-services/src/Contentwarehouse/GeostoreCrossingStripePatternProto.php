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

class GeostoreCrossingStripePatternProto extends \Google\Collection
{
  protected $collection_key = 'color';
  protected $borderLineType = GeostorePhysicalLineProto::class;
  protected $borderLineDataType = '';
  /**
   * @var string
   */
  public $borderPattern;
  protected $colorType = GeostorePaintedElementLogicalColorProto::class;
  protected $colorDataType = 'array';
  /**
   * @var string
   */
  public $stripePattern;

  /**
   * @param GeostorePhysicalLineProto
   */
  public function setBorderLine(GeostorePhysicalLineProto $borderLine)
  {
    $this->borderLine = $borderLine;
  }
  /**
   * @return GeostorePhysicalLineProto
   */
  public function getBorderLine()
  {
    return $this->borderLine;
  }
  /**
   * @param string
   */
  public function setBorderPattern($borderPattern)
  {
    $this->borderPattern = $borderPattern;
  }
  /**
   * @return string
   */
  public function getBorderPattern()
  {
    return $this->borderPattern;
  }
  /**
   * @param GeostorePaintedElementLogicalColorProto[]
   */
  public function setColor($color)
  {
    $this->color = $color;
  }
  /**
   * @return GeostorePaintedElementLogicalColorProto[]
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param string
   */
  public function setStripePattern($stripePattern)
  {
    $this->stripePattern = $stripePattern;
  }
  /**
   * @return string
   */
  public function getStripePattern()
  {
    return $this->stripePattern;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreCrossingStripePatternProto::class, 'Google_Service_Contentwarehouse_GeostoreCrossingStripePatternProto');
