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

class GeostoreIntersectionProto extends \Google\Collection
{
  protected $collection_key = 'segment';
  protected $intersectionGroupType = GeostoreFeatureIdProto::class;
  protected $intersectionGroupDataType = '';
  protected $outSegmentType = GeostoreFeatureIdProto::class;
  protected $outSegmentDataType = 'array';
  protected $segmentType = GeostoreFeatureIdProto::class;
  protected $segmentDataType = 'array';
  protected $tollClusterIdType = GeostoreFeatureIdProto::class;
  protected $tollClusterIdDataType = '';

  /**
   * @param GeostoreFeatureIdProto
   */
  public function setIntersectionGroup(GeostoreFeatureIdProto $intersectionGroup)
  {
    $this->intersectionGroup = $intersectionGroup;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getIntersectionGroup()
  {
    return $this->intersectionGroup;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setOutSegment($outSegment)
  {
    $this->outSegment = $outSegment;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getOutSegment()
  {
    return $this->outSegment;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setSegment($segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getSegment()
  {
    return $this->segment;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setTollClusterId(GeostoreFeatureIdProto $tollClusterId)
  {
    $this->tollClusterId = $tollClusterId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getTollClusterId()
  {
    return $this->tollClusterId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreIntersectionProto::class, 'Google_Service_Contentwarehouse_GeostoreIntersectionProto');
