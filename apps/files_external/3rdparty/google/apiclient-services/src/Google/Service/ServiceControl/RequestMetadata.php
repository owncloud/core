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

class Google_Service_ServiceControl_RequestMetadata extends Google_Model
{
  public $callerIp;
  public $callerNetwork;
  public $callerSuppliedUserAgent;
  protected $destinationAttributesType = 'Google_Service_ServiceControl_Peer';
  protected $destinationAttributesDataType = '';
  protected $requestAttributesType = 'Google_Service_ServiceControl_Request';
  protected $requestAttributesDataType = '';

  public function setCallerIp($callerIp)
  {
    $this->callerIp = $callerIp;
  }
  public function getCallerIp()
  {
    return $this->callerIp;
  }
  public function setCallerNetwork($callerNetwork)
  {
    $this->callerNetwork = $callerNetwork;
  }
  public function getCallerNetwork()
  {
    return $this->callerNetwork;
  }
  public function setCallerSuppliedUserAgent($callerSuppliedUserAgent)
  {
    $this->callerSuppliedUserAgent = $callerSuppliedUserAgent;
  }
  public function getCallerSuppliedUserAgent()
  {
    return $this->callerSuppliedUserAgent;
  }
  /**
   * @param Google_Service_ServiceControl_Peer
   */
  public function setDestinationAttributes(Google_Service_ServiceControl_Peer $destinationAttributes)
  {
    $this->destinationAttributes = $destinationAttributes;
  }
  /**
   * @return Google_Service_ServiceControl_Peer
   */
  public function getDestinationAttributes()
  {
    return $this->destinationAttributes;
  }
  /**
   * @param Google_Service_ServiceControl_Request
   */
  public function setRequestAttributes(Google_Service_ServiceControl_Request $requestAttributes)
  {
    $this->requestAttributes = $requestAttributes;
  }
  /**
   * @return Google_Service_ServiceControl_Request
   */
  public function getRequestAttributes()
  {
    return $this->requestAttributes;
  }
}
