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

class Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SamplePlayableLocationsRequest extends Google_Collection
{
  protected $collection_key = 'criteria';
  protected $areaFilterType = 'Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleAreaFilter';
  protected $areaFilterDataType = '';
  protected $criteriaType = 'Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleCriterion';
  protected $criteriaDataType = 'array';

  /**
   * @param Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleAreaFilter
   */
  public function setAreaFilter(Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleAreaFilter $areaFilter)
  {
    $this->areaFilter = $areaFilter;
  }
  /**
   * @return Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleAreaFilter
   */
  public function getAreaFilter()
  {
    return $this->areaFilter;
  }
  /**
   * @param Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleCriterion[]
   */
  public function setCriteria($criteria)
  {
    $this->criteria = $criteria;
  }
  /**
   * @return Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleCriterion[]
   */
  public function getCriteria()
  {
    return $this->criteria;
  }
}
