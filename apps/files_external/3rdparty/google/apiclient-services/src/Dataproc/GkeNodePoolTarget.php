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

namespace Google\Service\Dataproc;

class GkeNodePoolTarget extends \Google\Collection
{
  protected $collection_key = 'roles';
  /**
   * @var string
   */
  public $nodePool;
  protected $nodePoolConfigType = GkeNodePoolConfig::class;
  protected $nodePoolConfigDataType = '';
  /**
   * @var string[]
   */
  public $roles;

  /**
   * @param string
   */
  public function setNodePool($nodePool)
  {
    $this->nodePool = $nodePool;
  }
  /**
   * @return string
   */
  public function getNodePool()
  {
    return $this->nodePool;
  }
  /**
   * @param GkeNodePoolConfig
   */
  public function setNodePoolConfig(GkeNodePoolConfig $nodePoolConfig)
  {
    $this->nodePoolConfig = $nodePoolConfig;
  }
  /**
   * @return GkeNodePoolConfig
   */
  public function getNodePoolConfig()
  {
    return $this->nodePoolConfig;
  }
  /**
   * @param string[]
   */
  public function setRoles($roles)
  {
    $this->roles = $roles;
  }
  /**
   * @return string[]
   */
  public function getRoles()
  {
    return $this->roles;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GkeNodePoolTarget::class, 'Google_Service_Dataproc_GkeNodePoolTarget');
