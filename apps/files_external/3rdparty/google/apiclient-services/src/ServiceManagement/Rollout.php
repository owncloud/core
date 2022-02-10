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

namespace Google\Service\ServiceManagement;

class Rollout extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $createdBy;
  protected $deleteServiceStrategyType = DeleteServiceStrategy::class;
  protected $deleteServiceStrategyDataType = '';
  /**
   * @var string
   */
  public $rolloutId;
  /**
   * @var string
   */
  public $serviceName;
  /**
   * @var string
   */
  public $status;
  protected $trafficPercentStrategyType = TrafficPercentStrategy::class;
  protected $trafficPercentStrategyDataType = '';

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setCreatedBy($createdBy)
  {
    $this->createdBy = $createdBy;
  }
  /**
   * @return string
   */
  public function getCreatedBy()
  {
    return $this->createdBy;
  }
  /**
   * @param DeleteServiceStrategy
   */
  public function setDeleteServiceStrategy(DeleteServiceStrategy $deleteServiceStrategy)
  {
    $this->deleteServiceStrategy = $deleteServiceStrategy;
  }
  /**
   * @return DeleteServiceStrategy
   */
  public function getDeleteServiceStrategy()
  {
    return $this->deleteServiceStrategy;
  }
  /**
   * @param string
   */
  public function setRolloutId($rolloutId)
  {
    $this->rolloutId = $rolloutId;
  }
  /**
   * @return string
   */
  public function getRolloutId()
  {
    return $this->rolloutId;
  }
  /**
   * @param string
   */
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
  }
  /**
   * @return string
   */
  public function getServiceName()
  {
    return $this->serviceName;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param TrafficPercentStrategy
   */
  public function setTrafficPercentStrategy(TrafficPercentStrategy $trafficPercentStrategy)
  {
    $this->trafficPercentStrategy = $trafficPercentStrategy;
  }
  /**
   * @return TrafficPercentStrategy
   */
  public function getTrafficPercentStrategy()
  {
    return $this->trafficPercentStrategy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Rollout::class, 'Google_Service_ServiceManagement_Rollout');
