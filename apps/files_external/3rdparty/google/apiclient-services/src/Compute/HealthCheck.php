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

namespace Google\Service\Compute;

class HealthCheck extends \Google\Model
{
  public $checkIntervalSec;
  public $creationTimestamp;
  public $description;
  protected $grpcHealthCheckType = GRPCHealthCheck::class;
  protected $grpcHealthCheckDataType = '';
  public $healthyThreshold;
  protected $http2HealthCheckType = HTTP2HealthCheck::class;
  protected $http2HealthCheckDataType = '';
  protected $httpHealthCheckType = HTTPHealthCheck::class;
  protected $httpHealthCheckDataType = '';
  protected $httpsHealthCheckType = HTTPSHealthCheck::class;
  protected $httpsHealthCheckDataType = '';
  public $id;
  public $kind;
  protected $logConfigType = HealthCheckLogConfig::class;
  protected $logConfigDataType = '';
  public $name;
  public $region;
  public $selfLink;
  protected $sslHealthCheckType = SSLHealthCheck::class;
  protected $sslHealthCheckDataType = '';
  protected $tcpHealthCheckType = TCPHealthCheck::class;
  protected $tcpHealthCheckDataType = '';
  public $timeoutSec;
  public $type;
  public $unhealthyThreshold;

  public function setCheckIntervalSec($checkIntervalSec)
  {
    $this->checkIntervalSec = $checkIntervalSec;
  }
  public function getCheckIntervalSec()
  {
    return $this->checkIntervalSec;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param GRPCHealthCheck
   */
  public function setGrpcHealthCheck(GRPCHealthCheck $grpcHealthCheck)
  {
    $this->grpcHealthCheck = $grpcHealthCheck;
  }
  /**
   * @return GRPCHealthCheck
   */
  public function getGrpcHealthCheck()
  {
    return $this->grpcHealthCheck;
  }
  public function setHealthyThreshold($healthyThreshold)
  {
    $this->healthyThreshold = $healthyThreshold;
  }
  public function getHealthyThreshold()
  {
    return $this->healthyThreshold;
  }
  /**
   * @param HTTP2HealthCheck
   */
  public function setHttp2HealthCheck(HTTP2HealthCheck $http2HealthCheck)
  {
    $this->http2HealthCheck = $http2HealthCheck;
  }
  /**
   * @return HTTP2HealthCheck
   */
  public function getHttp2HealthCheck()
  {
    return $this->http2HealthCheck;
  }
  /**
   * @param HTTPHealthCheck
   */
  public function setHttpHealthCheck(HTTPHealthCheck $httpHealthCheck)
  {
    $this->httpHealthCheck = $httpHealthCheck;
  }
  /**
   * @return HTTPHealthCheck
   */
  public function getHttpHealthCheck()
  {
    return $this->httpHealthCheck;
  }
  /**
   * @param HTTPSHealthCheck
   */
  public function setHttpsHealthCheck(HTTPSHealthCheck $httpsHealthCheck)
  {
    $this->httpsHealthCheck = $httpsHealthCheck;
  }
  /**
   * @return HTTPSHealthCheck
   */
  public function getHttpsHealthCheck()
  {
    return $this->httpsHealthCheck;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param HealthCheckLogConfig
   */
  public function setLogConfig(HealthCheckLogConfig $logConfig)
  {
    $this->logConfig = $logConfig;
  }
  /**
   * @return HealthCheckLogConfig
   */
  public function getLogConfig()
  {
    return $this->logConfig;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param SSLHealthCheck
   */
  public function setSslHealthCheck(SSLHealthCheck $sslHealthCheck)
  {
    $this->sslHealthCheck = $sslHealthCheck;
  }
  /**
   * @return SSLHealthCheck
   */
  public function getSslHealthCheck()
  {
    return $this->sslHealthCheck;
  }
  /**
   * @param TCPHealthCheck
   */
  public function setTcpHealthCheck(TCPHealthCheck $tcpHealthCheck)
  {
    $this->tcpHealthCheck = $tcpHealthCheck;
  }
  /**
   * @return TCPHealthCheck
   */
  public function getTcpHealthCheck()
  {
    return $this->tcpHealthCheck;
  }
  public function setTimeoutSec($timeoutSec)
  {
    $this->timeoutSec = $timeoutSec;
  }
  public function getTimeoutSec()
  {
    return $this->timeoutSec;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUnhealthyThreshold($unhealthyThreshold)
  {
    $this->unhealthyThreshold = $unhealthyThreshold;
  }
  public function getUnhealthyThreshold()
  {
    return $this->unhealthyThreshold;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HealthCheck::class, 'Google_Service_Compute_HealthCheck');
