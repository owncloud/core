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

class Firewall extends \Google\Collection
{
  protected $collection_key = 'targetTags';
  protected $allowedType = FirewallAllowed::class;
  protected $allowedDataType = 'array';
  /**
   * @var string
   */
  public $creationTimestamp;
  protected $deniedType = FirewallDenied::class;
  protected $deniedDataType = 'array';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $destinationRanges;
  /**
   * @var string
   */
  public $direction;
  /**
   * @var bool
   */
  public $disabled;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $logConfigType = FirewallLogConfig::class;
  protected $logConfigDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  /**
   * @var int
   */
  public $priority;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string[]
   */
  public $sourceRanges;
  /**
   * @var string[]
   */
  public $sourceServiceAccounts;
  /**
   * @var string[]
   */
  public $sourceTags;
  /**
   * @var string[]
   */
  public $targetServiceAccounts;
  /**
   * @var string[]
   */
  public $targetTags;

  /**
   * @param FirewallAllowed[]
   */
  public function setAllowed($allowed)
  {
    $this->allowed = $allowed;
  }
  /**
   * @return FirewallAllowed[]
   */
  public function getAllowed()
  {
    return $this->allowed;
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
   * @param FirewallDenied[]
   */
  public function setDenied($denied)
  {
    $this->denied = $denied;
  }
  /**
   * @return FirewallDenied[]
   */
  public function getDenied()
  {
    return $this->denied;
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
   * @param string[]
   */
  public function setDestinationRanges($destinationRanges)
  {
    $this->destinationRanges = $destinationRanges;
  }
  /**
   * @return string[]
   */
  public function getDestinationRanges()
  {
    return $this->destinationRanges;
  }
  /**
   * @param string
   */
  public function setDirection($direction)
  {
    $this->direction = $direction;
  }
  /**
   * @return string
   */
  public function getDirection()
  {
    return $this->direction;
  }
  /**
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
  public function getDisabled()
  {
    return $this->disabled;
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
   * @param FirewallLogConfig
   */
  public function setLogConfig(FirewallLogConfig $logConfig)
  {
    $this->logConfig = $logConfig;
  }
  /**
   * @return FirewallLogConfig
   */
  public function getLogConfig()
  {
    return $this->logConfig;
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
   * @param string
   */
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  /**
   * @return string
   */
  public function getNetwork()
  {
    return $this->network;
  }
  /**
   * @param int
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return int
   */
  public function getPriority()
  {
    return $this->priority;
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
   * @param string[]
   */
  public function setSourceRanges($sourceRanges)
  {
    $this->sourceRanges = $sourceRanges;
  }
  /**
   * @return string[]
   */
  public function getSourceRanges()
  {
    return $this->sourceRanges;
  }
  /**
   * @param string[]
   */
  public function setSourceServiceAccounts($sourceServiceAccounts)
  {
    $this->sourceServiceAccounts = $sourceServiceAccounts;
  }
  /**
   * @return string[]
   */
  public function getSourceServiceAccounts()
  {
    return $this->sourceServiceAccounts;
  }
  /**
   * @param string[]
   */
  public function setSourceTags($sourceTags)
  {
    $this->sourceTags = $sourceTags;
  }
  /**
   * @return string[]
   */
  public function getSourceTags()
  {
    return $this->sourceTags;
  }
  /**
   * @param string[]
   */
  public function setTargetServiceAccounts($targetServiceAccounts)
  {
    $this->targetServiceAccounts = $targetServiceAccounts;
  }
  /**
   * @return string[]
   */
  public function getTargetServiceAccounts()
  {
    return $this->targetServiceAccounts;
  }
  /**
   * @param string[]
   */
  public function setTargetTags($targetTags)
  {
    $this->targetTags = $targetTags;
  }
  /**
   * @return string[]
   */
  public function getTargetTags()
  {
    return $this->targetTags;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Firewall::class, 'Google_Service_Compute_Firewall');
