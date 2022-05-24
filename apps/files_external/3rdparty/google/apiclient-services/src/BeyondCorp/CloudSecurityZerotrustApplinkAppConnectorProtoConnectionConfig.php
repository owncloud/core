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

namespace Google\Service\BeyondCorp;

class CloudSecurityZerotrustApplinkAppConnectorProtoConnectionConfig extends \Google\Collection
{
  protected $collection_key = 'gateway';
  /**
   * @var string
   */
  public $applicationEndpoint;
  /**
   * @var string
   */
  public $applicationName;
  protected $gatewayType = CloudSecurityZerotrustApplinkAppConnectorProtoGateway::class;
  protected $gatewayDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $project;
  /**
   * @var string
   */
  public $tunnelsPerGateway;
  /**
   * @var int
   */
  public $userPort;

  /**
   * @param string
   */
  public function setApplicationEndpoint($applicationEndpoint)
  {
    $this->applicationEndpoint = $applicationEndpoint;
  }
  /**
   * @return string
   */
  public function getApplicationEndpoint()
  {
    return $this->applicationEndpoint;
  }
  /**
   * @param string
   */
  public function setApplicationName($applicationName)
  {
    $this->applicationName = $applicationName;
  }
  /**
   * @return string
   */
  public function getApplicationName()
  {
    return $this->applicationName;
  }
  /**
   * @param CloudSecurityZerotrustApplinkAppConnectorProtoGateway[]
   */
  public function setGateway($gateway)
  {
    $this->gateway = $gateway;
  }
  /**
   * @return CloudSecurityZerotrustApplinkAppConnectorProtoGateway[]
   */
  public function getGateway()
  {
    return $this->gateway;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setProject($project)
  {
    $this->project = $project;
  }
  /**
   * @return string
   */
  public function getProject()
  {
    return $this->project;
  }
  /**
   * @param string
   */
  public function setTunnelsPerGateway($tunnelsPerGateway)
  {
    $this->tunnelsPerGateway = $tunnelsPerGateway;
  }
  /**
   * @return string
   */
  public function getTunnelsPerGateway()
  {
    return $this->tunnelsPerGateway;
  }
  /**
   * @param int
   */
  public function setUserPort($userPort)
  {
    $this->userPort = $userPort;
  }
  /**
   * @return int
   */
  public function getUserPort()
  {
    return $this->userPort;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudSecurityZerotrustApplinkAppConnectorProtoConnectionConfig::class, 'Google_Service_BeyondCorp_CloudSecurityZerotrustApplinkAppConnectorProtoConnectionConfig');
