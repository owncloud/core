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

class Google_Service_ServiceNetworking_AddDnsZoneResponse extends Google_Model
{
  protected $consumerPeeringZoneType = 'Google_Service_ServiceNetworking_DnsZone';
  protected $consumerPeeringZoneDataType = '';
  protected $producerPrivateZoneType = 'Google_Service_ServiceNetworking_DnsZone';
  protected $producerPrivateZoneDataType = '';

  /**
   * @param Google_Service_ServiceNetworking_DnsZone
   */
  public function setConsumerPeeringZone(Google_Service_ServiceNetworking_DnsZone $consumerPeeringZone)
  {
    $this->consumerPeeringZone = $consumerPeeringZone;
  }
  /**
   * @return Google_Service_ServiceNetworking_DnsZone
   */
  public function getConsumerPeeringZone()
  {
    return $this->consumerPeeringZone;
  }
  /**
   * @param Google_Service_ServiceNetworking_DnsZone
   */
  public function setProducerPrivateZone(Google_Service_ServiceNetworking_DnsZone $producerPrivateZone)
  {
    $this->producerPrivateZone = $producerPrivateZone;
  }
  /**
   * @return Google_Service_ServiceNetworking_DnsZone
   */
  public function getProducerPrivateZone()
  {
    return $this->producerPrivateZone;
  }
}
