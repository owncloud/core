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

namespace Google\Service\Monitoring;

class BasicSli extends \Google\Collection
{
  protected $collection_key = 'version';
  protected $availabilityType = AvailabilityCriteria::class;
  protected $availabilityDataType = '';
  protected $latencyType = LatencyCriteria::class;
  protected $latencyDataType = '';
  public $location;
  public $method;
  public $version;

  /**
   * @param AvailabilityCriteria
   */
  public function setAvailability(AvailabilityCriteria $availability)
  {
    $this->availability = $availability;
  }
  /**
   * @return AvailabilityCriteria
   */
  public function getAvailability()
  {
    return $this->availability;
  }
  /**
   * @param LatencyCriteria
   */
  public function setLatency(LatencyCriteria $latency)
  {
    $this->latency = $latency;
  }
  /**
   * @return LatencyCriteria
   */
  public function getLatency()
  {
    return $this->latency;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BasicSli::class, 'Google_Service_Monitoring_BasicSli');
