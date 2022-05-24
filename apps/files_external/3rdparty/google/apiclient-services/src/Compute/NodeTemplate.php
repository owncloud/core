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

class NodeTemplate extends \Google\Collection
{
  protected $collection_key = 'disks';
  protected $acceleratorsType = AcceleratorConfig::class;
  protected $acceleratorsDataType = 'array';
  /**
   * @var string
   */
  public $cpuOvercommitType;
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  protected $disksType = LocalDisk::class;
  protected $disksDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $nodeAffinityLabels;
  /**
   * @var string
   */
  public $nodeType;
  protected $nodeTypeFlexibilityType = NodeTemplateNodeTypeFlexibility::class;
  protected $nodeTypeFlexibilityDataType = '';
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $selfLink;
  protected $serverBindingType = ServerBinding::class;
  protected $serverBindingDataType = '';
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $statusMessage;

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
  /**
   * @param string
   */
  public function setCpuOvercommitType($cpuOvercommitType)
  {
    $this->cpuOvercommitType = $cpuOvercommitType;
  }
  /**
   * @return string
   */
  public function getCpuOvercommitType()
  {
    return $this->cpuOvercommitType;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
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
   * @param string[]
   */
  public function setNodeAffinityLabels($nodeAffinityLabels)
  {
    $this->nodeAffinityLabels = $nodeAffinityLabels;
  }
  /**
   * @return string[]
   */
  public function getNodeAffinityLabels()
  {
    return $this->nodeAffinityLabels;
  }
  /**
   * @param string
   */
  public function setNodeType($nodeType)
  {
    $this->nodeType = $nodeType;
  }
  /**
   * @return string
   */
  public function getNodeType()
  {
    return $this->nodeType;
  }
  /**
   * @param NodeTemplateNodeTypeFlexibility
   */
  public function setNodeTypeFlexibility(NodeTemplateNodeTypeFlexibility $nodeTypeFlexibility)
  {
    $this->nodeTypeFlexibility = $nodeTypeFlexibility;
  }
  /**
   * @return NodeTemplateNodeTypeFlexibility
   */
  public function getNodeTypeFlexibility()
  {
    return $this->nodeTypeFlexibility;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
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
   * @param string
   */
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  /**
   * @return string
   */
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NodeTemplate::class, 'Google_Service_Compute_NodeTemplate');
