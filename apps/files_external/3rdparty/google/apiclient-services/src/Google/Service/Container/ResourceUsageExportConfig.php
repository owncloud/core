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

class Google_Service_Container_ResourceUsageExportConfig extends Google_Model
{
  protected $bigqueryDestinationType = 'Google_Service_Container_BigQueryDestination';
  protected $bigqueryDestinationDataType = '';
  protected $consumptionMeteringConfigType = 'Google_Service_Container_ConsumptionMeteringConfig';
  protected $consumptionMeteringConfigDataType = '';
  public $enableNetworkEgressMetering;

  /**
   * @param Google_Service_Container_BigQueryDestination
   */
  public function setBigqueryDestination(Google_Service_Container_BigQueryDestination $bigqueryDestination)
  {
    $this->bigqueryDestination = $bigqueryDestination;
  }
  /**
   * @return Google_Service_Container_BigQueryDestination
   */
  public function getBigqueryDestination()
  {
    return $this->bigqueryDestination;
  }
  /**
   * @param Google_Service_Container_ConsumptionMeteringConfig
   */
  public function setConsumptionMeteringConfig(Google_Service_Container_ConsumptionMeteringConfig $consumptionMeteringConfig)
  {
    $this->consumptionMeteringConfig = $consumptionMeteringConfig;
  }
  /**
   * @return Google_Service_Container_ConsumptionMeteringConfig
   */
  public function getConsumptionMeteringConfig()
  {
    return $this->consumptionMeteringConfig;
  }
  public function setEnableNetworkEgressMetering($enableNetworkEgressMetering)
  {
    $this->enableNetworkEgressMetering = $enableNetworkEgressMetering;
  }
  public function getEnableNetworkEgressMetering()
  {
    return $this->enableNetworkEgressMetering;
  }
}
