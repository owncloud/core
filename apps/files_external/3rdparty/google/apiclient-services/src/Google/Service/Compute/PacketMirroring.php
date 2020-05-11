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

class Google_Service_Compute_PacketMirroring extends Google_Model
{
  protected $collectorIlbType = 'Google_Service_Compute_PacketMirroringForwardingRuleInfo';
  protected $collectorIlbDataType = '';
  public $creationTimestamp;
  public $description;
  public $enable;
  protected $filterType = 'Google_Service_Compute_PacketMirroringFilter';
  protected $filterDataType = '';
  public $id;
  public $kind;
  protected $mirroredResourcesType = 'Google_Service_Compute_PacketMirroringMirroredResourceInfo';
  protected $mirroredResourcesDataType = '';
  public $name;
  protected $networkType = 'Google_Service_Compute_PacketMirroringNetworkInfo';
  protected $networkDataType = '';
  public $priority;
  public $region;
  public $selfLink;

  /**
   * @param Google_Service_Compute_PacketMirroringForwardingRuleInfo
   */
  public function setCollectorIlb(Google_Service_Compute_PacketMirroringForwardingRuleInfo $collectorIlb)
  {
    $this->collectorIlb = $collectorIlb;
  }
  /**
   * @return Google_Service_Compute_PacketMirroringForwardingRuleInfo
   */
  public function getCollectorIlb()
  {
    return $this->collectorIlb;
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
  public function setEnable($enable)
  {
    $this->enable = $enable;
  }
  public function getEnable()
  {
    return $this->enable;
  }
  /**
   * @param Google_Service_Compute_PacketMirroringFilter
   */
  public function setFilter(Google_Service_Compute_PacketMirroringFilter $filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return Google_Service_Compute_PacketMirroringFilter
   */
  public function getFilter()
  {
    return $this->filter;
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
  /**
   * @param Google_Service_Compute_PacketMirroringMirroredResourceInfo
   */
  public function setMirroredResources(Google_Service_Compute_PacketMirroringMirroredResourceInfo $mirroredResources)
  {
    $this->mirroredResources = $mirroredResources;
  }
  /**
   * @return Google_Service_Compute_PacketMirroringMirroredResourceInfo
   */
  public function getMirroredResources()
  {
    return $this->mirroredResources;
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
   * @param Google_Service_Compute_PacketMirroringNetworkInfo
   */
  public function setNetwork(Google_Service_Compute_PacketMirroringNetworkInfo $network)
  {
    $this->network = $network;
  }
  /**
   * @return Google_Service_Compute_PacketMirroringNetworkInfo
   */
  public function getNetwork()
  {
    return $this->network;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
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
}
