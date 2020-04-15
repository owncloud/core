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

class Google_Service_CloudTasks_Queue extends Google_Model
{
  protected $appEngineRoutingOverrideType = 'Google_Service_CloudTasks_AppEngineRouting';
  protected $appEngineRoutingOverrideDataType = '';
  public $name;
  public $purgeTime;
  protected $rateLimitsType = 'Google_Service_CloudTasks_RateLimits';
  protected $rateLimitsDataType = '';
  protected $retryConfigType = 'Google_Service_CloudTasks_RetryConfig';
  protected $retryConfigDataType = '';
  protected $stackdriverLoggingConfigType = 'Google_Service_CloudTasks_StackdriverLoggingConfig';
  protected $stackdriverLoggingConfigDataType = '';
  public $state;

  /**
   * @param Google_Service_CloudTasks_AppEngineRouting
   */
  public function setAppEngineRoutingOverride(Google_Service_CloudTasks_AppEngineRouting $appEngineRoutingOverride)
  {
    $this->appEngineRoutingOverride = $appEngineRoutingOverride;
  }
  /**
   * @return Google_Service_CloudTasks_AppEngineRouting
   */
  public function getAppEngineRoutingOverride()
  {
    return $this->appEngineRoutingOverride;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPurgeTime($purgeTime)
  {
    $this->purgeTime = $purgeTime;
  }
  public function getPurgeTime()
  {
    return $this->purgeTime;
  }
  /**
   * @param Google_Service_CloudTasks_RateLimits
   */
  public function setRateLimits(Google_Service_CloudTasks_RateLimits $rateLimits)
  {
    $this->rateLimits = $rateLimits;
  }
  /**
   * @return Google_Service_CloudTasks_RateLimits
   */
  public function getRateLimits()
  {
    return $this->rateLimits;
  }
  /**
   * @param Google_Service_CloudTasks_RetryConfig
   */
  public function setRetryConfig(Google_Service_CloudTasks_RetryConfig $retryConfig)
  {
    $this->retryConfig = $retryConfig;
  }
  /**
   * @return Google_Service_CloudTasks_RetryConfig
   */
  public function getRetryConfig()
  {
    return $this->retryConfig;
  }
  /**
   * @param Google_Service_CloudTasks_StackdriverLoggingConfig
   */
  public function setStackdriverLoggingConfig(Google_Service_CloudTasks_StackdriverLoggingConfig $stackdriverLoggingConfig)
  {
    $this->stackdriverLoggingConfig = $stackdriverLoggingConfig;
  }
  /**
   * @return Google_Service_CloudTasks_StackdriverLoggingConfig
   */
  public function getStackdriverLoggingConfig()
  {
    return $this->stackdriverLoggingConfig;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
