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

namespace Google\Service\DisplayVideo;

class ActiveViewVideoViewabilityMetricConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $minimumDuration;
  /**
   * @var string
   */
  public $minimumQuartile;
  /**
   * @var string
   */
  public $minimumViewability;
  /**
   * @var string
   */
  public $minimumVolume;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setMinimumDuration($minimumDuration)
  {
    $this->minimumDuration = $minimumDuration;
  }
  /**
   * @return string
   */
  public function getMinimumDuration()
  {
    return $this->minimumDuration;
  }
  /**
   * @param string
   */
  public function setMinimumQuartile($minimumQuartile)
  {
    $this->minimumQuartile = $minimumQuartile;
  }
  /**
   * @return string
   */
  public function getMinimumQuartile()
  {
    return $this->minimumQuartile;
  }
  /**
   * @param string
   */
  public function setMinimumViewability($minimumViewability)
  {
    $this->minimumViewability = $minimumViewability;
  }
  /**
   * @return string
   */
  public function getMinimumViewability()
  {
    return $this->minimumViewability;
  }
  /**
   * @param string
   */
  public function setMinimumVolume($minimumVolume)
  {
    $this->minimumVolume = $minimumVolume;
  }
  /**
   * @return string
   */
  public function getMinimumVolume()
  {
    return $this->minimumVolume;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ActiveViewVideoViewabilityMetricConfig::class, 'Google_Service_DisplayVideo_ActiveViewVideoViewabilityMetricConfig');
