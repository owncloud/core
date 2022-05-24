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

namespace Google\Service\Dataflow;

class TopologyConfig extends \Google\Collection
{
  protected $collection_key = 'dataDiskAssignments';
  protected $computationsType = ComputationTopology::class;
  protected $computationsDataType = 'array';
  protected $dataDiskAssignmentsType = DataDiskAssignment::class;
  protected $dataDiskAssignmentsDataType = 'array';
  /**
   * @var int
   */
  public $forwardingKeyBits;
  /**
   * @var int
   */
  public $persistentStateVersion;
  /**
   * @var string[]
   */
  public $userStageToComputationNameMap;

  /**
   * @param ComputationTopology[]
   */
  public function setComputations($computations)
  {
    $this->computations = $computations;
  }
  /**
   * @return ComputationTopology[]
   */
  public function getComputations()
  {
    return $this->computations;
  }
  /**
   * @param DataDiskAssignment[]
   */
  public function setDataDiskAssignments($dataDiskAssignments)
  {
    $this->dataDiskAssignments = $dataDiskAssignments;
  }
  /**
   * @return DataDiskAssignment[]
   */
  public function getDataDiskAssignments()
  {
    return $this->dataDiskAssignments;
  }
  /**
   * @param int
   */
  public function setForwardingKeyBits($forwardingKeyBits)
  {
    $this->forwardingKeyBits = $forwardingKeyBits;
  }
  /**
   * @return int
   */
  public function getForwardingKeyBits()
  {
    return $this->forwardingKeyBits;
  }
  /**
   * @param int
   */
  public function setPersistentStateVersion($persistentStateVersion)
  {
    $this->persistentStateVersion = $persistentStateVersion;
  }
  /**
   * @return int
   */
  public function getPersistentStateVersion()
  {
    return $this->persistentStateVersion;
  }
  /**
   * @param string[]
   */
  public function setUserStageToComputationNameMap($userStageToComputationNameMap)
  {
    $this->userStageToComputationNameMap = $userStageToComputationNameMap;
  }
  /**
   * @return string[]
   */
  public function getUserStageToComputationNameMap()
  {
    return $this->userStageToComputationNameMap;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TopologyConfig::class, 'Google_Service_Dataflow_TopologyConfig');
