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

namespace Google\Service\Contentwarehouse;

class TrawlerThrottleClientData extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "isBandwidthThrottle" => "IsBandwidthThrottle",
        "maxAllowedRate" => "MaxAllowedRate",
  ];
  /**
   * @var bool
   */
  public $isBandwidthThrottle;
  /**
   * @var float
   */
  public $maxAllowedRate;

  /**
   * @param bool
   */
  public function setIsBandwidthThrottle($isBandwidthThrottle)
  {
    $this->isBandwidthThrottle = $isBandwidthThrottle;
  }
  /**
   * @return bool
   */
  public function getIsBandwidthThrottle()
  {
    return $this->isBandwidthThrottle;
  }
  /**
   * @param float
   */
  public function setMaxAllowedRate($maxAllowedRate)
  {
    $this->maxAllowedRate = $maxAllowedRate;
  }
  /**
   * @return float
   */
  public function getMaxAllowedRate()
  {
    return $this->maxAllowedRate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerThrottleClientData::class, 'Google_Service_Contentwarehouse_TrawlerThrottleClientData');
