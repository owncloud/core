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

class GoogleMapsPlayablelocationsV3SamplePlayableLocationsResponse extends \Google\Model
{
  protected $locationsPerGameObjectTypeType = GoogleMapsPlayablelocationsV3SamplePlayableLocationList::class;
  protected $locationsPerGameObjectTypeDataType = 'map';
  public $ttl;

  /**
   * @param GoogleMapsPlayablelocationsV3SamplePlayableLocationList[]
   */
  public function setLocationsPerGameObjectType($locationsPerGameObjectType)
  {
    $this->locationsPerGameObjectType = $locationsPerGameObjectType;
  }
  /**
   * @return GoogleMapsPlayablelocationsV3SamplePlayableLocationList[]
   */
  public function getLocationsPerGameObjectType()
  {
    return $this->locationsPerGameObjectType;
  }
  public function setTtl($ttl)
  {
    $this->ttl = $ttl;
  }
  public function getTtl()
  {
    return $this->ttl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleMapsPlayablelocationsV3SamplePlayableLocationsResponse::class, 'Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SamplePlayableLocationsResponse');
