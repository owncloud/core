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

class GeostorePhysicalLineProto extends \Google\Collection
{
  protected $collection_key = 'material';
  /**
   * @var float
   */
  public $dashLengthMeters;
  protected $gapColorType = GeostorePaintedElementLogicalColorProto::class;
  protected $gapColorDataType = '';
  /**
   * @var float
   */
  public $gapLengthMeters;
  /**
   * @var string[]
   */
  public $material;
  protected $paintColorType = GeostorePaintedElementLogicalColorProto::class;
  protected $paintColorDataType = '';
  /**
   * @var string
   */
  public $pattern;
  /**
   * @var string
   */
  public $physicalLineToken;

  /**
   * @param float
   */
  public function setDashLengthMeters($dashLengthMeters)
  {
    $this->dashLengthMeters = $dashLengthMeters;
  }
  /**
   * @return float
   */
  public function getDashLengthMeters()
  {
    return $this->dashLengthMeters;
  }
  /**
   * @param GeostorePaintedElementLogicalColorProto
   */
  public function setGapColor(GeostorePaintedElementLogicalColorProto $gapColor)
  {
    $this->gapColor = $gapColor;
  }
  /**
   * @return GeostorePaintedElementLogicalColorProto
   */
  public function getGapColor()
  {
    return $this->gapColor;
  }
  /**
   * @param float
   */
  public function setGapLengthMeters($gapLengthMeters)
  {
    $this->gapLengthMeters = $gapLengthMeters;
  }
  /**
   * @return float
   */
  public function getGapLengthMeters()
  {
    return $this->gapLengthMeters;
  }
  /**
   * @param string[]
   */
  public function setMaterial($material)
  {
    $this->material = $material;
  }
  /**
   * @return string[]
   */
  public function getMaterial()
  {
    return $this->material;
  }
  /**
   * @param GeostorePaintedElementLogicalColorProto
   */
  public function setPaintColor(GeostorePaintedElementLogicalColorProto $paintColor)
  {
    $this->paintColor = $paintColor;
  }
  /**
   * @return GeostorePaintedElementLogicalColorProto
   */
  public function getPaintColor()
  {
    return $this->paintColor;
  }
  /**
   * @param string
   */
  public function setPattern($pattern)
  {
    $this->pattern = $pattern;
  }
  /**
   * @return string
   */
  public function getPattern()
  {
    return $this->pattern;
  }
  /**
   * @param string
   */
  public function setPhysicalLineToken($physicalLineToken)
  {
    $this->physicalLineToken = $physicalLineToken;
  }
  /**
   * @return string
   */
  public function getPhysicalLineToken()
  {
    return $this->physicalLineToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostorePhysicalLineProto::class, 'Google_Service_Contentwarehouse_GeostorePhysicalLineProto');
