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

namespace Google\Service\Compute;

class NodeGroupNode extends \Google\Collection
{
  protected $collection_key = 'instances';
  protected $acceleratorsType = AcceleratorConfig::class;
  protected $acceleratorsDataType = 'array';
  public $cpuOvercommitType;
  protected $disksType = LocalDisk::class;
  protected $disksDataType = 'array';
  public $instances;
  public $name;
  public $nodeType;
  public $satisfiesPzs;
  protected $serverBindingType = ServerBinding::class;
  protected $serverBindingDataType = '';
  public $serverId;
  public $status;

  /**
   * @param AcceleratorConfig[]
   */
  public function setAccelerators($accelerators)
  {
    $this->accelerators = $accelerators;
  }
  /**
   * @return AcceleratorConfig[]
   */
  public function getAccelerators()
  {
    return $this->accelerators;
  }
  public function setCpuOvercommitType($cpuOvercommitType)
  {
    $this->cpuOvercommitType = $cpuOvercommitType;
  }
  public function getCpuOvercommitType()
  {
    return $this->cpuOvercommitType;
  }
  /**
   * @param LocalDisk[]
   */
  public function setDisks($disks)
  {
    $this->disks = $disks;
  }
  /**
   * @return LocalDisk[]
   */
  public function getDisks()
  {
    return $this->disks;
  }
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }
  public function getInstances()
  {
    return $this->instances;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNodeType($nodeType)
  {
    $this->nodeType = $nodeType;
  }
  public function getNodeType()
  {
    return $this->nodeType;
  }
  public function setSatisfiesPzs($satisfiesPzs)
  {
    $this->satisfiesPzs = $satisfiesPzs;
  }
  public function getSatisfiesPzs()
  {
    return $this->satisfiesPzs;
  }
  /**
   * @param ServerBinding
   */
  public function setServerBinding(ServerBinding $serverBinding)
  {
    $this->serverBinding = $serverBinding;
  }
  /**
   * @return ServerBinding
   */
  public function getServerBinding()
  {
    return $this->serverBinding;
  }
  public function setServerId($serverId)
  {
    $this->serverId = $serverId;
  }
  public function getServerId()
  {
    return $this->serverId;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NodeGroupNode::class, 'Google_Service_Compute_NodeGroupNode');
