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
  public $failureThreshold;
  protected $handlerType = 'Google_Service_CloudRun_Handler';
  protected $handlerDataType = '';
  public $initialDelaySeconds;
  public $periodSeconds;
  public $successThreshold;
  public $timeoutSeconds;

  public function setFailureThreshold($failureThreshold)
  {
    $this->failureThreshold = $failureThreshold;
  }
  public function getFailureThreshold()
  {
    return $this->failureThreshold;
  }
  /**
   * @param Google_Service_CloudRun_Handler
   */
  public function setHandler(Google_Service_CloudRun_Handler $handler)
  {
    $this->handler = $handler;
  }
  /**
   * @return Google_Service_CloudRun_Handler
   */
  public function getHandler()
  {
    return $this->handler;
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
  public function setTimeoutSeconds($timeoutSeconds)
  {
    $this->timeoutSeconds = $timeoutSeconds;
  }
  public function getTimeoutSeconds()
  {
    return $this->timeoutSeconds;
  }
}
