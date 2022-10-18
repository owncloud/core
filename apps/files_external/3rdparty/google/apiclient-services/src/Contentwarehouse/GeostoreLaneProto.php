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

class GeostoreLaneProto extends \Google\Collection
{
  protected $collection_key = 'stopLine';
  protected $boundingMarkerType = GeostoreBoundingMarkerProto::class;
  protected $boundingMarkerDataType = 'array';
  /**
   * @var string
   */
  public $conjoinedCategory;
  /**
   * @var float
   */
  public $distanceToNextLane;
  protected $flowType = GeostoreFlowLineProto::class;
  protected $flowDataType = '';
  protected $laneConnectionType = GeostoreLaneProtoLaneConnection::class;
  protected $laneConnectionDataType = 'array';
  /**
   * @var string
   */
  public $laneDividerCrossing;
  /**
   * @var float
   */
  public $laneFollowsSegmentBeginFraction;
  /**
   * @var float
   */
  public $laneFollowsSegmentEndFraction;
  /**
   * @var int
   */
  public $laneNumber;
  /**
   * @var string
   */
  public $laneToken;
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';
  protected $restrictionType = GeostoreRestrictionProto::class;
  protected $restrictionDataType = 'array';
  /**
   * @var bool
   */
  public $shared;
  protected $stopLineType = GeostoreFeatureIdProto::class;
  protected $stopLineDataType = 'array';
  /**
   * @var string
   */
  public $surface;
  /**
   * @var string
   */
  public $type;
  /**
   * @var float
   */
  public $width;

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
  public function setConjoinedCategory($conjoinedCategory)
  {
    $this->conjoinedCategory = $conjoinedCategory;
  }
  /**
   * @return string
   */
  public function getConjoinedCategory()
  {
    return $this->conjoinedCategory;
  }
  /**
   * @param float
   */
  public function setDistanceToNextLane($distanceToNextLane)
  {
    $this->distanceToNextLane = $distanceToNextLane;
  }
  /**
   * @return float
   */
  public function getDistanceToNextLane()
  {
    return $this->distanceToNextLane;
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
   * @param GeostoreLaneProtoLaneConnection[]
   */
  public function setLaneConnection($laneConnection)
  {
    $this->laneConnection = $laneConnection;
  }
  /**
   * @return GeostoreLaneProtoLaneConnection[]
   */
  public function getLaneConnection()
  {
    return $this->laneConnection;
  }
  /**
   * @param string
   */
  public function setLaneDividerCrossing($laneDividerCrossing)
  {
    $this->laneDividerCrossing = $laneDividerCrossing;
  }
  /**
   * @return string
   */
  public function getLaneDividerCrossing()
  {
    return $this->laneDividerCrossing;
  }
  /**
   * @param float
   */
  public function setLaneFollowsSegmentBeginFraction($laneFollowsSegmentBeginFraction)
  {
    $this->laneFollowsSegmentBeginFraction = $laneFollowsSegmentBeginFraction;
  }
  /**
   * @return float
   */
  public function getLaneFollowsSegmentBeginFraction()
  {
    return $this->laneFollowsSegmentBeginFraction;
  }
  /**
   * @param float
   */
  public function setLaneFollowsSegmentEndFraction($laneFollowsSegmentEndFraction)
  {
    $this->laneFollowsSegmentEndFraction = $laneFollowsSegmentEndFraction;
  }
  /**
   * @return float
   */
  public function getLaneFollowsSegmentEndFraction()
  {
    return $this->laneFollowsSegmentEndFraction;
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
   * @param string
   */
  public function setLaneToken($laneToken)
  {
    $this->laneToken = $laneToken;
  }
  /**
   * @return string
   */
  public function getLaneToken()
  {
    return $this->laneToken;
  }
  /**
   * @param GeostoreFieldMetadataProto
   */
  public function setMetadata(GeostoreFieldMetadataProto $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GeostoreFieldMetadataProto
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param GeostoreRestrictionProto[]
   */
  public function setRestriction($restriction)
  {
    $this->restriction = $restriction;
  }
  /**
   * @return GeostoreRestrictionProto[]
   */
  public function getRestriction()
  {
    return $this->restriction;
  }
  /**
   * @param bool
   */
  public function setShared($shared)
  {
    $this->shared = $shared;
  }
  /**
   * @return bool
   */
  public function getShared()
  {
    return $this->shared;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setStopLine($stopLine)
  {
    $this->stopLine = $stopLine;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getStopLine()
  {
    return $this->stopLine;
  }
  /**
   * @param string
   */
  public function setSurface($surface)
  {
    $this->surface = $surface;
  }
  /**
   * @return string
   */
  public function getSurface()
  {
    return $this->surface;
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
  /**
   * @param float
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return float
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreLaneProto::class, 'Google_Service_Contentwarehouse_GeostoreLaneProto');
