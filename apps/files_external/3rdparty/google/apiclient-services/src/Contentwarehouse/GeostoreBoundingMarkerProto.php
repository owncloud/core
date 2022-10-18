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

class GeostoreBoundingMarkerProto extends \Google\Model
{
  protected $boundingMarkerType = GeostoreFeatureIdProto::class;
  protected $boundingMarkerDataType = '';
  /**
   * @var string
   */
  public $boundingMarkerToken;
  public $flowlineAdjacencyBeginFraction;
  public $flowlineAdjacencyEndFraction;
  public $markerAdjacencyBeginFraction;
  public $markerAdjacencyEndFraction;
  /**
   * @var string
   */
  public $side;

  /**
   * @param GeostoreFeatureIdProto
   */
  public function setBoundingMarker(GeostoreFeatureIdProto $boundingMarker)
  {
    $this->boundingMarker = $boundingMarker;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getBoundingMarker()
  {
    return $this->boundingMarker;
  }
  /**
   * @param string
   */
  public function setBoundingMarkerToken($boundingMarkerToken)
  {
    $this->boundingMarkerToken = $boundingMarkerToken;
  }
  /**
   * @return string
   */
  public function getBoundingMarkerToken()
  {
    return $this->boundingMarkerToken;
  }
  public function setFlowlineAdjacencyBeginFraction($flowlineAdjacencyBeginFraction)
  {
    $this->flowlineAdjacencyBeginFraction = $flowlineAdjacencyBeginFraction;
  }
  public function getFlowlineAdjacencyBeginFraction()
  {
    return $this->flowlineAdjacencyBeginFraction;
  }
  public function setFlowlineAdjacencyEndFraction($flowlineAdjacencyEndFraction)
  {
    $this->flowlineAdjacencyEndFraction = $flowlineAdjacencyEndFraction;
  }
  public function getFlowlineAdjacencyEndFraction()
  {
    return $this->flowlineAdjacencyEndFraction;
  }
  public function setMarkerAdjacencyBeginFraction($markerAdjacencyBeginFraction)
  {
    $this->markerAdjacencyBeginFraction = $markerAdjacencyBeginFraction;
  }
  public function getMarkerAdjacencyBeginFraction()
  {
    return $this->markerAdjacencyBeginFraction;
  }
  public function setMarkerAdjacencyEndFraction($markerAdjacencyEndFraction)
  {
    $this->markerAdjacencyEndFraction = $markerAdjacencyEndFraction;
  }
  public function getMarkerAdjacencyEndFraction()
  {
    return $this->markerAdjacencyEndFraction;
  }
  /**
   * @param string
   */
  public function setSide($side)
  {
    $this->side = $side;
  }
  /**
   * @return string
   */
  public function getSide()
  {
    return $this->side;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreBoundingMarkerProto::class, 'Google_Service_Contentwarehouse_GeostoreBoundingMarkerProto');
