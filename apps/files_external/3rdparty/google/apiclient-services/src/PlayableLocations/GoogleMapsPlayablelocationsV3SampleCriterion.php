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

namespace Google\Service\PlayableLocations;

class GoogleMapsPlayablelocationsV3SampleCriterion extends \Google\Model
{
  public $fieldsToReturn;
  protected $filterType = GoogleMapsPlayablelocationsV3SampleFilter::class;
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
   * @param GoogleMapsPlayablelocationsV3SampleFilter
   */
  public function setFilter(GoogleMapsPlayablelocationsV3SampleFilter $filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return GoogleMapsPlayablelocationsV3SampleFilter
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleMapsPlayablelocationsV3SampleCriterion::class, 'Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleCriterion');
