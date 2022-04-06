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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1Instance extends \Google\Collection
{
  protected $collection_key = 'consumerAcceptList';
  /**
   * @var string[]
   */
  public $consumerAcceptList;
  /**
   * @var string
   */
  public $createdAt;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $diskEncryptionKeyName;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $host;
  /**
   * @var string
   */
  public $ipRange;
  /**
   * @var string
   */
  public $lastModifiedAt;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $peeringCidrRange;
  /**
   * @var string
   */
  public $port;
  /**
   * @var string
   */
  public $runtimeVersion;
  /**
   * @var string
   */
  public $serviceAttachment;
  /**
   * @var string
   */
  public $state;

  /**
   * @param string[]
   */
  public function setConsumerAcceptList($consumerAcceptList)
  {
    $this->consumerAcceptList = $consumerAcceptList;
  }
  /**
   * @return string[]
   */
  public function getConsumerAcceptList()
  {
    return $this->consumerAcceptList;
  }
  /**
   * @param string
   */
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  /**
   * @return string
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
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
  public function setDiskEncryptionKeyName($diskEncryptionKeyName)
  {
    $this->diskEncryptionKeyName = $diskEncryptionKeyName;
  }
  /**
   * @return string
   */
  public function getDiskEncryptionKeyName()
  {
    return $this->diskEncryptionKeyName;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setHost($host)
  {
    $this->host = $host;
  }
  /**
   * @return string
   */
  public function getHost()
  {
    return $this->host;
  }
  /**
   * @param string
   */
  public function setIpRange($ipRange)
  {
    $this->ipRange = $ipRange;
  }
  /**
   * @return string
   */
  public function getIpRange()
  {
    return $this->ipRange;
  }
  /**
   * @param string
   */
  public function setLastModifiedAt($lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;
  }
  /**
   * @return string
   */
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
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
  public function setPeeringCidrRange($peeringCidrRange)
  {
    $this->peeringCidrRange = $peeringCidrRange;
  }
  /**
   * @return string
   */
  public function getPeeringCidrRange()
  {
    return $this->peeringCidrRange;
  }
  /**
   * @param string
   */
  public function setPort($port)
  {
    $this->port = $port;
  }
  /**
   * @return string
   */
  public function getPort()
  {
    return $this->port;
  }
  /**
   * @param string
   */
  public function setRuntimeVersion($runtimeVersion)
  {
    $this->runtimeVersion = $runtimeVersion;
  }
  /**
   * @return string
   */
  public function getRuntimeVersion()
  {
    return $this->runtimeVersion;
  }
  /**
   * @param string
   */
  public function setServiceAttachment($serviceAttachment)
  {
    $this->serviceAttachment = $serviceAttachment;
  }
  /**
   * @return string
   */
  public function getServiceAttachment()
  {
    return $this->serviceAttachment;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Instance::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Instance');
