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

class ComputeScheduling extends \Google\Collection
{
  protected $collection_key = 'nodeAffinities';
  public $minNodeCpus;
  protected $nodeAffinitiesType = SchedulingNodeAffinity::class;
  protected $nodeAffinitiesDataType = 'array';
  public $onHostMaintenance;
  public $restartType;

  public function setMinNodeCpus($minNodeCpus)
  {
    $this->minNodeCpus = $minNodeCpus;
  }
  public function getMinNodeCpus()
  {
    return $this->minNodeCpus;
  }
  /**
   * @param SchedulingNodeAffinity[]
   */
  public function setNodeAffinities($nodeAffinities)
  {
    $this->nodeAffinities = $nodeAffinities;
  }
  /**
   * @return SchedulingNodeAffinity[]
   */
  public function getNodeAffinities()
  {
    return $this->nodeAffinities;
  }
  public function setOnHostMaintenance($onHostMaintenance)
  {
    $this->onHostMaintenance = $onHostMaintenance;
  }
  public function getOnHostMaintenance()
  {
    return $this->onHostMaintenance;
  }
  public function setRestartType($restartType)
  {
    $this->restartType = $restartType;
  }
  public function getRestartType()
  {
    return $this->restartType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ComputeScheduling::class, 'Google_Service_VMMigrationService_ComputeScheduling');
