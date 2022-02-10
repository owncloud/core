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

namespace Google\Service\VMMigrationService;

class CloneJob extends \Google\Model
{
  protected $computeEngineTargetDetailsType = ComputeEngineTargetDetails::class;
  protected $computeEngineTargetDetailsDataType = '';
  /**
   * @var string
   */
  public $createTime;
  protected $errorType = Status::class;
  protected $errorDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $stateTime;

  /**
   * @param ComputeEngineTargetDetails
   */
  public function setComputeEngineTargetDetails(ComputeEngineTargetDetails $computeEngineTargetDetails)
  {
    $this->computeEngineTargetDetails = $computeEngineTargetDetails;
  }
  /**
   * @return ComputeEngineTargetDetails
   */
  public function getComputeEngineTargetDetails()
  {
    return $this->computeEngineTargetDetails;
  }
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
   * @param Status
   */
  public function setError(Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Status
   */
  public function getError()
  {
    return $this->error;
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
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setStateTime($stateTime)
  {
    $this->stateTime = $stateTime;
  }
  /**
   * @return string
   */
  public function getStateTime()
  {
    return $this->stateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloneJob::class, 'Google_Service_VMMigrationService_CloneJob');
