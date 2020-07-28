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

class Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SamplePlayableLocation extends Google_Collection
{
  protected $collection_key = 'types';
  protected $centerPointType = 'Google_Service_PlayableLocations_GoogleTypeLatLng';
  protected $centerPointDataType = '';
  public $name;
  public $placeId;
  public $plusCode;
  protected $snappedPointType = 'Google_Service_PlayableLocations_GoogleTypeLatLng';
  protected $snappedPointDataType = '';
  public $types;

  /**
   * @param Google_Service_PlayableLocations_GoogleTypeLatLng
   */
  public function setCenterPoint(Google_Service_PlayableLocations_GoogleTypeLatLng $centerPoint)
  {
    $this->centerPoint = $centerPoint;
  }
  /**
   * @return Google_Service_PlayableLocations_GoogleTypeLatLng
   */
  public function getCenterPoint()
  {
    return $this->centerPoint;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPlaceId($placeId)
  {
    $this->placeId = $placeId;
  }
  public function getPlaceId()
  {
    return $this->placeId;
  }
  public function setPlusCode($plusCode)
  {
    $this->plusCode = $plusCode;
  }
  public function getPlusCode()
  {
    return $this->plusCode;
  }
  /**
   * @param Google_Service_PlayableLocations_GoogleTypeLatLng
   */
  public function setSnappedPoint(Google_Service_PlayableLocations_GoogleTypeLatLng $snappedPoint)
  {
    $this->snappedPoint = $snappedPoint;
  }
  /**
   * @return Google_Service_PlayableLocations_GoogleTypeLatLng
   */
  public function getSnappedPoint()
  {
    return $this->snappedPoint;
  }
  public function setTypes($types)
  {
    $this->types = $types;
  }
  public function getTypes()
  {
    return $this->types;
  }
}
