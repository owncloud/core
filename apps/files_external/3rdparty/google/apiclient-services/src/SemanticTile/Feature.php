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

namespace Google\Service\SemanticTile;

class Feature extends \Google\Collection
{
  protected $collection_key = 'relations';
  public $displayName;
  protected $geometryType = Geometry::class;
  protected $geometryDataType = '';
  public $placeId;
  protected $relationsType = Relation::class;
  protected $relationsDataType = 'array';
  protected $segmentInfoType = SegmentInfo::class;
  protected $segmentInfoDataType = '';
  public $type;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Geometry
   */
  public function setGeometry(Geometry $geometry)
  {
    $this->geometry = $geometry;
  }
  /**
   * @return Geometry
   */
  public function getGeometry()
  {
    return $this->geometry;
  }
  public function setPlaceId($placeId)
  {
    $this->placeId = $placeId;
  }
  public function getPlaceId()
  {
    return $this->placeId;
  }
  /**
   * @param Relation[]
   */
  public function setRelations($relations)
  {
    $this->relations = $relations;
  }
  /**
   * @return Relation[]
   */
  public function getRelations()
  {
    return $this->relations;
  }
  /**
   * @param SegmentInfo
   */
  public function setSegmentInfo(SegmentInfo $segmentInfo)
  {
    $this->segmentInfo = $segmentInfo;
  }
  /**
   * @return SegmentInfo
   */
  public function getSegmentInfo()
  {
    return $this->segmentInfo;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Feature::class, 'Google_Service_SemanticTile_Feature');
