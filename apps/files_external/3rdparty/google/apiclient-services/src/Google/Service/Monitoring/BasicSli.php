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

class Google_Service_Monitoring_BasicSli extends Google_Collection
{
  protected $collection_key = 'version';
  protected $availabilityType = 'Google_Service_Monitoring_AvailabilityCriteria';
  protected $availabilityDataType = '';
  protected $latencyType = 'Google_Service_Monitoring_LatencyCriteria';
  protected $latencyDataType = '';
  public $location;
  public $method;
  public $version;

  /**
   * @param Google_Service_Monitoring_AvailabilityCriteria
   */
  public function setAvailability(Google_Service_Monitoring_AvailabilityCriteria $availability)
  {
    $this->availability = $availability;
  }
  /**
   * @return Google_Service_Monitoring_AvailabilityCriteria
   */
  public function getAvailability()
  {
    return $this->availability;
  }
  /**
   * @param Google_Service_Monitoring_LatencyCriteria
   */
  public function setLatency(Google_Service_Monitoring_LatencyCriteria $latency)
  {
    $this->latency = $latency;
  }
  /**
   * @return Google_Service_Monitoring_LatencyCriteria
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
