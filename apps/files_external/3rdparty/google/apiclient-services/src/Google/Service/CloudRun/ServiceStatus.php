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

class Google_Service_CloudRun_ServiceStatus extends Google_Collection
{
  protected $collection_key = 'traffic';
  protected $addressType = 'Google_Service_CloudRun_Addressable';
  protected $addressDataType = '';
  protected $conditionsType = 'Google_Service_CloudRun_GoogleCloudRunV1Condition';
  protected $conditionsDataType = 'array';
  public $latestCreatedRevisionName;
  public $latestReadyRevisionName;
  public $observedGeneration;
  protected $trafficType = 'Google_Service_CloudRun_TrafficTarget';
  protected $trafficDataType = 'array';
  public $url;

  /**
   * @param Google_Service_CloudRun_Addressable
   */
  public function setAddress(Google_Service_CloudRun_Addressable $address)
  {
    $this->address = $address;
  }
  /**
   * @return Google_Service_CloudRun_Addressable
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param Google_Service_CloudRun_GoogleCloudRunV1Condition[]
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return Google_Service_CloudRun_GoogleCloudRunV1Condition[]
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  public function setLatestCreatedRevisionName($latestCreatedRevisionName)
  {
    $this->latestCreatedRevisionName = $latestCreatedRevisionName;
  }
  public function getLatestCreatedRevisionName()
  {
    return $this->latestCreatedRevisionName;
  }
  public function setLatestReadyRevisionName($latestReadyRevisionName)
  {
    $this->latestReadyRevisionName = $latestReadyRevisionName;
  }
  public function getLatestReadyRevisionName()
  {
    return $this->latestReadyRevisionName;
  }
  public function setObservedGeneration($observedGeneration)
  {
    $this->observedGeneration = $observedGeneration;
  }
  public function getObservedGeneration()
  {
    return $this->observedGeneration;
  }
  /**
   * @param Google_Service_CloudRun_TrafficTarget[]
   */
  public function setTraffic($traffic)
  {
    $this->traffic = $traffic;
  }
  /**
   * @return Google_Service_CloudRun_TrafficTarget[]
   */
  public function getTraffic()
  {
    return $this->traffic;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
