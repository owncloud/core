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

class Google_Service_DisplayVideo_ActiveViewVideoViewabilityMetricConfig extends Google_Model
{
  public $displayName;
  public $minimumDuration;
  public $minimumQuartile;
  public $minimumViewability;
  public $minimumVolume;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setMinimumDuration($minimumDuration)
  {
    $this->minimumDuration = $minimumDuration;
  }
  public function getMinimumDuration()
  {
    return $this->minimumDuration;
  }
  public function setMinimumQuartile($minimumQuartile)
  {
    $this->minimumQuartile = $minimumQuartile;
  }
  public function getMinimumQuartile()
  {
    return $this->minimumQuartile;
  }
  public function setMinimumViewability($minimumViewability)
  {
    $this->minimumViewability = $minimumViewability;
  }
  public function getMinimumViewability()
  {
    return $this->minimumViewability;
  }
  public function setMinimumVolume($minimumVolume)
  {
    $this->minimumVolume = $minimumVolume;
  }
  public function getMinimumVolume()
  {
    return $this->minimumVolume;
  }
}
