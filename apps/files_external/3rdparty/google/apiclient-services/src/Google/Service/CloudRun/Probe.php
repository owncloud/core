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

class Google_Service_CloudRun_Probe extends Google_Model
{
  protected $execType = 'Google_Service_CloudRun_ExecAction';
  protected $execDataType = '';
  public $failureThreshold;
  protected $httpGetType = 'Google_Service_CloudRun_HTTPGetAction';
  protected $httpGetDataType = '';
  public $initialDelaySeconds;
  public $periodSeconds;
  public $successThreshold;
  protected $tcpSocketType = 'Google_Service_CloudRun_TCPSocketAction';
  protected $tcpSocketDataType = '';
  public $timeoutSeconds;

  /**
   * @param Google_Service_CloudRun_ExecAction
   */
  public function setExec(Google_Service_CloudRun_ExecAction $exec)
  {
    $this->exec = $exec;
  }
  /**
   * @return Google_Service_CloudRun_ExecAction
   */
  public function getExec()
  {
    return $this->exec;
  }
  public function setFailureThreshold($failureThreshold)
  {
    $this->failureThreshold = $failureThreshold;
  }
  public function getFailureThreshold()
  {
    return $this->failureThreshold;
  }
  /**
   * @param Google_Service_CloudRun_HTTPGetAction
   */
  public function setHttpGet(Google_Service_CloudRun_HTTPGetAction $httpGet)
  {
    $this->httpGet = $httpGet;
  }
  /**
   * @return Google_Service_CloudRun_HTTPGetAction
   */
  public function getHttpGet()
  {
    return $this->httpGet;
  }
  public function setInitialDelaySeconds($initialDelaySeconds)
  {
    $this->initialDelaySeconds = $initialDelaySeconds;
  }
  public function getInitialDelaySeconds()
  {
    return $this->initialDelaySeconds;
  }
  public function setPeriodSeconds($periodSeconds)
  {
    $this->periodSeconds = $periodSeconds;
  }
  public function getPeriodSeconds()
  {
    return $this->periodSeconds;
  }
  public function setSuccessThreshold($successThreshold)
  {
    $this->successThreshold = $successThreshold;
  }
  public function getSuccessThreshold()
  {
    return $this->successThreshold;
  }
  /**
   * @param Google_Service_CloudRun_TCPSocketAction
   */
  public function setTcpSocket(Google_Service_CloudRun_TCPSocketAction $tcpSocket)
  {
    $this->tcpSocket = $tcpSocket;
  }
  /**
   * @return Google_Service_CloudRun_TCPSocketAction
   */
  public function getTcpSocket()
  {
    return $this->tcpSocket;
  }
  public function setTimeoutSeconds($timeoutSeconds)
  {
    $this->timeoutSeconds = $timeoutSeconds;
  }
  public function getTimeoutSeconds()
  {
    return $this->timeoutSeconds;
  }
}
