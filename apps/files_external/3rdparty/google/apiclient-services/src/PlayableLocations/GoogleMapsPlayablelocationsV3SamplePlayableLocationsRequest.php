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

class GoogleMapsPlayablelocationsV3SamplePlayableLocationsRequest extends \Google\Collection
{
  protected $collection_key = 'criteria';
  protected $areaFilterType = GoogleMapsPlayablelocationsV3SampleAreaFilter::class;
  protected $areaFilterDataType = '';
  protected $criteriaType = GoogleMapsPlayablelocationsV3SampleCriterion::class;
  protected $criteriaDataType = 'array';

  /**
   * @param GoogleMapsPlayablelocationsV3SampleAreaFilter
   */
  public function setAreaFilter(GoogleMapsPlayablelocationsV3SampleAreaFilter $areaFilter)
  {
    $this->areaFilter = $areaFilter;
  }
  /**
   * @return GoogleMapsPlayablelocationsV3SampleAreaFilter
   */
  public function getAreaFilter()
  {
    return $this->areaFilter;
  }
  /**
   * @param GoogleMapsPlayablelocationsV3SampleCriterion[]
   */
  public function setCriteria($criteria)
  {
    $this->criteria = $criteria;
  }
  /**
   * @return GoogleMapsPlayablelocationsV3SampleCriterion[]
   */
  public function getCriteria()
  {
    return $this->criteria;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleMapsPlayablelocationsV3SamplePlayableLocationsRequest::class, 'Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SamplePlayableLocationsRequest');
