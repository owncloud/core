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

class Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleFilter extends Google_Collection
{
  protected $collection_key = 'includedTypes';
  public $includedTypes;
  public $maxLocationCount;
  protected $spacingType = 'Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleSpacingOptions';
  protected $spacingDataType = '';

  public function setIncludedTypes($includedTypes)
  {
    $this->includedTypes = $includedTypes;
  }
  public function getIncludedTypes()
  {
    return $this->includedTypes;
  }
  public function setMaxLocationCount($maxLocationCount)
  {
    $this->maxLocationCount = $maxLocationCount;
  }
  public function getMaxLocationCount()
  {
    return $this->maxLocationCount;
  }
  /**
   * @param Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleSpacingOptions
   */
  public function setSpacing(Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleSpacingOptions $spacing)
  {
    $this->spacing = $spacing;
  }
  /**
   * @return Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SampleSpacingOptions
   */
  public function getSpacing()
  {
    return $this->spacing;
  }
}
