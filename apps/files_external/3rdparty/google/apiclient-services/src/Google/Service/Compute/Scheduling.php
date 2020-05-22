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

class Google_Service_Compute_Scheduling extends Google_Collection
{
  protected $collection_key = 'nodeAffinities';
  public $automaticRestart;
  protected $nodeAffinitiesType = 'Google_Service_Compute_SchedulingNodeAffinity';
  protected $nodeAffinitiesDataType = 'array';
  public $onHostMaintenance;
  public $preemptible;

  public function setAutomaticRestart($automaticRestart)
  {
    $this->automaticRestart = $automaticRestart;
  }
  public function getAutomaticRestart()
  {
    return $this->automaticRestart;
  }
  /**
   * @param Google_Service_Compute_SchedulingNodeAffinity
   */
  public function setNodeAffinities($nodeAffinities)
  {
    $this->nodeAffinities = $nodeAffinities;
  }
  /**
   * @return Google_Service_Compute_SchedulingNodeAffinity
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
  public function setPreemptible($preemptible)
  {
    $this->preemptible = $preemptible;
  }
  public function getPreemptible()
  {
    return $this->preemptible;
  }
}
