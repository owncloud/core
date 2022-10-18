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

class GeostoreLaneProtoLaneConnection extends \Google\Collection
{
  protected $collection_key = 'boundingMarker';
  protected $boundingMarkerType = GeostoreBoundingMarkerProto::class;
  protected $boundingMarkerDataType = 'array';
  /**
   * @var string
   */
  public $connectionToken;
  protected $curveType = GeostoreCurveConnectionProto::class;
  protected $curveDataType = '';
  protected $flowType = GeostoreFlowLineProto::class;
  protected $flowDataType = '';
  /**
   * @var int
   */
  public $laneNumber;
  /**
   * @var bool
   */
  public $primaryConnection;
  protected $segmentType = GeostoreFeatureIdProto::class;
  protected $segmentDataType = '';

  /**
   * @param GeostoreBoundingMarkerProto[]
   */
  public function setBoundingMarker($boundingMarker)
  {
    $this->boundingMarker = $boundingMarker;
  }
  /**
   * @return GeostoreBoundingMarkerProto[]
   */
  public function getBoundingMarker()
  {
    return $this->boundingMarker;
  }
  /**
   * @param string
   */
  public function setConnectionToken($connectionToken)
  {
    $this->connectionToken = $connectionToken;
  }
  /**
   * @return string
   */
  public function getConnectionToken()
  {
    return $this->connectionToken;
  }
  /**
   * @param GeostoreCurveConnectionProto
   */
  public function setCurve(GeostoreCurveConnectionProto $curve)
  {
    $this->curve = $curve;
  }
  /**
   * @return GeostoreCurveConnectionProto
   */
  public function getCurve()
  {
    return $this->curve;
  }
  /**
   * @param GeostoreFlowLineProto
   */
  public function setFlow(GeostoreFlowLineProto $flow)
  {
    $this->flow = $flow;
  }
  /**
   * @return GeostoreFlowLineProto
   */
  public function getFlow()
  {
    return $this->flow;
  }
  /**
   * @param int
   */
  public function setLaneNumber($laneNumber)
  {
    $this->laneNumber = $laneNumber;
  }
  /**
   * @return int
   */
  public function getLaneNumber()
  {
    return $this->laneNumber;
  }
  /**
   * @param bool
   */
  public function setPrimaryConnection($primaryConnection)
  {
    $this->primaryConnection = $primaryConnection;
  }
  /**
   * @return bool
   */
  public function getPrimaryConnection()
  {
    return $this->primaryConnection;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setSegment(GeostoreFeatureIdProto $segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getSegment()
  {
    return $this->segment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreLaneProtoLaneConnection::class, 'Google_Service_Contentwarehouse_GeostoreLaneProtoLaneConnection');
