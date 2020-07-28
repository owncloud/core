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

class Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleCriterion extends Google_Model
{
  public $fieldsToReturn;
  protected $filterType = 'Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleFilter';
  protected $filterDataType = '';
  public $gameObjectType;

  public function setFieldsToReturn($fieldsToReturn)
  {
    $this->fieldsToReturn = $fieldsToReturn;
  }
  public function getFieldsToReturn()
  {
    return $this->fieldsToReturn;
  }
  /**
   * @param Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleFilter
   */
  public function setFilter(Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleFilter $filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleFilter
   */
  public function getFilter()
  {
    return $this->filter;
  }
  public function setGameObjectType($gameObjectType)
  {
    $this->gameObjectType = $gameObjectType;
  }
  public function getGameObjectType()
  {
    return $this->gameObjectType;
  }
}
