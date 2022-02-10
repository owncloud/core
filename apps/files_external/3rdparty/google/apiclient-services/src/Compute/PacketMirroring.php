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

class PacketMirroring extends \Google\Model
{
  protected $collectorIlbType = PacketMirroringForwardingRuleInfo::class;
  protected $collectorIlbDataType = '';
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $enable;
  protected $filterType = PacketMirroringFilter::class;
  protected $filterDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $mirroredResourcesType = PacketMirroringMirroredResourceInfo::class;
  protected $mirroredResourcesDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $networkType = PacketMirroringNetworkInfo::class;
  protected $networkDataType = '';
  /**
   * @var string
   */
  public $priority;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $selfLink;

  /**
   * @param PacketMirroringForwardingRuleInfo
   */
  public function setCollectorIlb(PacketMirroringForwardingRuleInfo $collectorIlb)
  {
    $this->collectorIlb = $collectorIlb;
  }
  /**
   * @return PacketMirroringForwardingRuleInfo
   */
  public function getCollectorIlb()
  {
    return $this->collectorIlb;
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
   * @param string
   */
  public function setEnable($enable)
  {
    $this->enable = $enable;
  }
  /**
   * @return string
   */
  public function getEnable()
  {
    return $this->enable;
  }
  /**
   * @param PacketMirroringFilter
   */
  public function setFilter(PacketMirroringFilter $filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return PacketMirroringFilter
   */
  public function getFilter()
  {
    return $this->filter;
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
   * @param PacketMirroringMirroredResourceInfo
   */
  public function setMirroredResources(PacketMirroringMirroredResourceInfo $mirroredResources)
  {
    $this->mirroredResources = $mirroredResources;
  }
  /**
   * @return PacketMirroringMirroredResourceInfo
   */
  public function getMirroredResources()
  {
    return $this->mirroredResources;
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
   * @param PacketMirroringNetworkInfo
   */
  public function setNetwork(PacketMirroringNetworkInfo $network)
  {
    $this->network = $network;
  }
  /**
   * @return PacketMirroringNetworkInfo
   */
  public function getNetwork()
  {
    return $this->network;
  }
  /**
   * @param string
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PacketMirroring::class, 'Google_Service_Compute_PacketMirroring');
