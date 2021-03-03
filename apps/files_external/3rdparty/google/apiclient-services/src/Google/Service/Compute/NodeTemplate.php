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

class Google_Service_Compute_NodeTemplate extends Google_Collection
{
  protected $collection_key = 'disks';
  protected $acceleratorsType = 'Google_Service_Compute_AcceleratorConfig';
  protected $acceleratorsDataType = 'array';
  public $cpuOvercommitType;
  public $creationTimestamp;
  public $description;
  protected $disksType = 'Google_Service_Compute_LocalDisk';
  protected $disksDataType = 'array';
  public $id;
  public $kind;
  public $name;
  public $nodeAffinityLabels;
  public $nodeType;
  protected $nodeTypeFlexibilityType = 'Google_Service_Compute_NodeTemplateNodeTypeFlexibility';
  protected $nodeTypeFlexibilityDataType = '';
  public $region;
  public $selfLink;
  protected $serverBindingType = 'Google_Service_Compute_ServerBinding';
  protected $serverBindingDataType = '';
  public $status;
  public $statusMessage;

  /**
   * @param Google_Service_Compute_AcceleratorConfig[]
   */
  public function setAccelerators($accelerators)
  {
    $this->accelerators = $accelerators;
  }
  /**
   * @return Google_Service_Compute_AcceleratorConfig[]
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
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Compute_LocalDisk[]
   */
  public function setDisks($disks)
  {
    $this->disks = $disks;
  }
  /**
   * @return Google_Service_Compute_LocalDisk[]
   */
  public function getDisks()
  {
    return $this->disks;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNodeAffinityLabels($nodeAffinityLabels)
  {
    $this->nodeAffinityLabels = $nodeAffinityLabels;
  }
  public function getNodeAffinityLabels()
  {
    return $this->nodeAffinityLabels;
  }
  public function setNodeType($nodeType)
  {
    $this->nodeType = $nodeType;
  }
  public function getNodeType()
  {
    return $this->nodeType;
  }
  /**
   * @param Google_Service_Compute_NodeTemplateNodeTypeFlexibility
   */
  public function setNodeTypeFlexibility(Google_Service_Compute_NodeTemplateNodeTypeFlexibility $nodeTypeFlexibility)
  {
    $this->nodeTypeFlexibility = $nodeTypeFlexibility;
  }
  /**
   * @return Google_Service_Compute_NodeTemplateNodeTypeFlexibility
   */
  public function getNodeTypeFlexibility()
  {
    return $this->nodeTypeFlexibility;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param Google_Service_Compute_ServerBinding
   */
  public function setServerBinding(Google_Service_Compute_ServerBinding $serverBinding)
  {
    $this->serverBinding = $serverBinding;
  }
  /**
   * @return Google_Service_Compute_ServerBinding
   */
  public function getServerBinding()
  {
    return $this->serverBinding;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
}
