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

class GeostoreAccessPointProto extends \Google\Collection
{
  protected $collection_key = 'unsuitableTravelMode';
  /**
   * @var bool
   */
  public $canEnter;
  /**
   * @var bool
   */
  public $canExit;
  protected $featureIdType = GeostoreFeatureIdProto::class;
  protected $featureIdDataType = '';
  /**
   * @var int
   */
  public $featureType;
  protected $levelFeatureIdType = GeostoreFeatureIdProto::class;
  protected $levelFeatureIdDataType = '';
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';
  protected $pointType = GeostorePointProto::class;
  protected $pointDataType = '';
  protected $pointOffSegmentType = GeostorePointProto::class;
  protected $pointOffSegmentDataType = '';
  protected $pointOnSegmentType = GeostorePointProto::class;
  protected $pointOnSegmentDataType = '';
  /**
   * @var string
   */
  public $priority;
  /**
   * @var float
   */
  public $segmentPosition;
  /**
   * @var string[]
   */
  public $unsuitableTravelMode;

  /**
   * @param bool
   */
  public function setCanEnter($canEnter)
  {
    $this->canEnter = $canEnter;
  }
  /**
   * @return bool
   */
  public function getCanEnter()
  {
    return $this->canEnter;
  }
  /**
   * @param bool
   */
  public function setCanExit($canExit)
  {
    $this->canExit = $canExit;
  }
  /**
   * @return bool
   */
  public function getCanExit()
  {
    return $this->canExit;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setFeatureId(GeostoreFeatureIdProto $featureId)
  {
    $this->featureId = $featureId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getFeatureId()
  {
    return $this->featureId;
  }
  /**
   * @param int
   */
  public function setFeatureType($featureType)
  {
    $this->featureType = $featureType;
  }
  /**
   * @return int
   */
  public function getFeatureType()
  {
    return $this->featureType;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setLevelFeatureId(GeostoreFeatureIdProto $levelFeatureId)
  {
    $this->levelFeatureId = $levelFeatureId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getLevelFeatureId()
  {
    return $this->levelFeatureId;
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
   * @param GeostorePointProto
   */
  public function setPoint(GeostorePointProto $point)
  {
    $this->point = $point;
  }
  /**
   * @return GeostorePointProto
   */
  public function getPoint()
  {
    return $this->point;
  }
  /**
   * @param GeostorePointProto
   */
  public function setPointOffSegment(GeostorePointProto $pointOffSegment)
  {
    $this->pointOffSegment = $pointOffSegment;
  }
  /**
   * @return GeostorePointProto
   */
  public function getPointOffSegment()
  {
    return $this->pointOffSegment;
  }
  /**
   * @param GeostorePointProto
   */
  public function setPointOnSegment(GeostorePointProto $pointOnSegment)
  {
    $this->pointOnSegment = $pointOnSegment;
  }
  /**
   * @return GeostorePointProto
   */
  public function getPointOnSegment()
  {
    return $this->pointOnSegment;
  }
  /**
   * @param string
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param float
   */
  public function setSegmentPosition($segmentPosition)
  {
    $this->segmentPosition = $segmentPosition;
  }
  /**
   * @return float
   */
  public function getSegmentPosition()
  {
    return $this->segmentPosition;
  }
  /**
   * @param string[]
   */
  public function setUnsuitableTravelMode($unsuitableTravelMode)
  {
    $this->unsuitableTravelMode = $unsuitableTravelMode;
  }
  /**
   * @return string[]
   */
  public function getUnsuitableTravelMode()
  {
    return $this->unsuitableTravelMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreAccessPointProto::class, 'Google_Service_Contentwarehouse_GeostoreAccessPointProto');
