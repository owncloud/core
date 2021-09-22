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

namespace Google\Service\Spanner;

class InstanceConfig extends \Google\Collection
{
  protected $collection_key = 'replicas';
  public $displayName;
  public $leaderOptions;
  public $name;
  protected $replicasType = ReplicaInfo::class;
  protected $replicasDataType = 'array';

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setLeaderOptions($leaderOptions)
  {
    $this->leaderOptions = $leaderOptions;
  }
  public function getLeaderOptions()
  {
    return $this->leaderOptions;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param ReplicaInfo[]
   */
  public function setReplicas($replicas)
  {
    $this->replicas = $replicas;
  }
  /**
   * @return ReplicaInfo[]
   */
  public function getReplicas()
  {
    return $this->replicas;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceConfig::class, 'Google_Service_Spanner_InstanceConfig');
