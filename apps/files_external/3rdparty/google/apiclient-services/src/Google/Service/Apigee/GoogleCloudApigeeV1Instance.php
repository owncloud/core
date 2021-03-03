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

class Google_Service_Apigee_GoogleCloudApigeeV1Instance extends Google_Model
{
  public $createdAt;
  public $description;
  public $diskEncryptionKeyName;
  public $displayName;
  public $host;
  public $lastModifiedAt;
  public $location;
  public $name;
  public $peeringCidrRange;
  public $port;
  public $state;

  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDiskEncryptionKeyName($diskEncryptionKeyName)
  {
    $this->diskEncryptionKeyName = $diskEncryptionKeyName;
  }
  public function getDiskEncryptionKeyName()
  {
    return $this->diskEncryptionKeyName;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  public function setLastModifiedAt($lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;
  }
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPeeringCidrRange($peeringCidrRange)
  {
    $this->peeringCidrRange = $peeringCidrRange;
  }
  public function getPeeringCidrRange()
  {
    return $this->peeringCidrRange;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
