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

class Google_Service_SemanticTile_Feature extends Google_Collection
{
  protected $collection_key = 'relations';
  public $displayName;
  protected $geometryType = 'Google_Service_SemanticTile_Geometry';
  protected $geometryDataType = '';
  public $placeId;
  protected $relationsType = 'Google_Service_SemanticTile_Relation';
  protected $relationsDataType = 'array';
  protected $segmentInfoType = 'Google_Service_SemanticTile_SegmentInfo';
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
   * @param Google_Service_SemanticTile_Geometry
   */
  public function setGeometry(Google_Service_SemanticTile_Geometry $geometry)
  {
    $this->geometry = $geometry;
  }
  /**
   * @return Google_Service_SemanticTile_Geometry
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
   * @param Google_Service_SemanticTile_Relation
   */
  public function setRelations($relations)
  {
    $this->relations = $relations;
  }
  /**
   * @return Google_Service_SemanticTile_Relation
   */
  public function getRelations()
  {
    return $this->relations;
  }
  /**
   * @param Google_Service_SemanticTile_SegmentInfo
   */
  public function setSegmentInfo(Google_Service_SemanticTile_SegmentInfo $segmentInfo)
  {
    $this->segmentInfo = $segmentInfo;
  }
  /**
   * @return Google_Service_SemanticTile_SegmentInfo
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
