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

class GeostoreLaneMarkerProto extends \Google\Model
{
  protected $barrierMaterialsType = GeostoreBarrierLogicalMaterialProto::class;
  protected $barrierMaterialsDataType = '';
  protected $crossingPatternType = GeostoreCrossingStripePatternProto::class;
  protected $crossingPatternDataType = '';
  protected $linearPatternType = GeostoreLinearStripePatternProto::class;
  protected $linearPatternDataType = '';

  /**
   * @param GeostoreBarrierLogicalMaterialProto
   */
  public function setBarrierMaterials(GeostoreBarrierLogicalMaterialProto $barrierMaterials)
  {
    $this->barrierMaterials = $barrierMaterials;
  }
  /**
   * @return GeostoreBarrierLogicalMaterialProto
   */
  public function getBarrierMaterials()
  {
    return $this->barrierMaterials;
  }
  /**
   * @param GeostoreCrossingStripePatternProto
   */
  public function setCrossingPattern(GeostoreCrossingStripePatternProto $crossingPattern)
  {
    $this->crossingPattern = $crossingPattern;
  }
  /**
   * @return GeostoreCrossingStripePatternProto
   */
  public function getCrossingPattern()
  {
    return $this->crossingPattern;
  }
  /**
   * @param GeostoreLinearStripePatternProto
   */
  public function setLinearPattern(GeostoreLinearStripePatternProto $linearPattern)
  {
    $this->linearPattern = $linearPattern;
  }
  /**
   * @return GeostoreLinearStripePatternProto
   */
  public function getLinearPattern()
  {
    return $this->linearPattern;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreLaneMarkerProto::class, 'Google_Service_Contentwarehouse_GeostoreLaneMarkerProto');
