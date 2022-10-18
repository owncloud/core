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

namespace Google\Service\CloudRun;

class GoogleCloudRunV2Probe extends \Google\Model
{
  /**
   * @var int
   */
  public $failureThreshold;
  protected $grpcType = GoogleCloudRunV2GRPCAction::class;
  protected $grpcDataType = '';
  protected $httpGetType = GoogleCloudRunV2HTTPGetAction::class;
  protected $httpGetDataType = '';
  /**
   * @var int
   */
  public $initialDelaySeconds;
  /**
   * @var int
   */
  public $periodSeconds;
  protected $tcpSocketType = GoogleCloudRunV2TCPSocketAction::class;
  protected $tcpSocketDataType = '';
  /**
   * @var int
   */
  public $timeoutSeconds;

  /**
   * @param int
   */
  public function setFailureThreshold($failureThreshold)
  {
    $this->failureThreshold = $failureThreshold;
  }
  /**
   * @return int
   */
  public function getFailureThreshold()
  {
    return $this->failureThreshold;
  }
  /**
   * @param GoogleCloudRunV2GRPCAction
   */
  public function setGrpc(GoogleCloudRunV2GRPCAction $grpc)
  {
    $this->grpc = $grpc;
  }
  /**
   * @return GoogleCloudRunV2GRPCAction
   */
  public function getGrpc()
  {
    return $this->grpc;
  }
  /**
   * @param GoogleCloudRunV2HTTPGetAction
   */
  public function setHttpGet(GoogleCloudRunV2HTTPGetAction $httpGet)
  {
    $this->httpGet = $httpGet;
  }
  /**
   * @return GoogleCloudRunV2HTTPGetAction
   */
  public function getHttpGet()
  {
    return $this->httpGet;
  }
  /**
   * @param int
   */
  public function setInitialDelaySeconds($initialDelaySeconds)
  {
    $this->initialDelaySeconds = $initialDelaySeconds;
  }
  /**
   * @return int
   */
  public function getInitialDelaySeconds()
  {
    return $this->initialDelaySeconds;
  }
  /**
   * @param int
   */
  public function setPeriodSeconds($periodSeconds)
  {
    $this->periodSeconds = $periodSeconds;
  }
  /**
   * @return int
   */
  public function getPeriodSeconds()
  {
    return $this->periodSeconds;
  }
  /**
   * @param GoogleCloudRunV2TCPSocketAction
   */
  public function setTcpSocket(GoogleCloudRunV2TCPSocketAction $tcpSocket)
  {
    $this->tcpSocket = $tcpSocket;
  }
  /**
   * @return GoogleCloudRunV2TCPSocketAction
   */
  public function getTcpSocket()
  {
    return $this->tcpSocket;
  }
  /**
   * @param int
   */
  public function setTimeoutSeconds($timeoutSeconds)
  {
    $this->timeoutSeconds = $timeoutSeconds;
  }
  /**
   * @return int
   */
  public function getTimeoutSeconds()
  {
    return $this->timeoutSeconds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRunV2Probe::class, 'Google_Service_CloudRun_GoogleCloudRunV2Probe');
