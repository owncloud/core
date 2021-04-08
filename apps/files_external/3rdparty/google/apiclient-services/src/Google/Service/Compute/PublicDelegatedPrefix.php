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

class Google_Service_Compute_PublicDelegatedPrefix extends Google_Collection
{
  protected $collection_key = 'publicDelegatedSubPrefixs';
  public $creationTimestamp;
  public $description;
  public $fingerprint;
  public $id;
  public $ipCidrRange;
  public $isLiveMigration;
  public $kind;
  public $name;
  public $parentPrefix;
  protected $publicDelegatedSubPrefixsType = 'Google_Service_Compute_PublicDelegatedPrefixPublicDelegatedSubPrefix';
  protected $publicDelegatedSubPrefixsDataType = 'array';
  public $region;
  public $selfLink;
  public $status;

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
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIpCidrRange($ipCidrRange)
  {
    $this->ipCidrRange = $ipCidrRange;
  }
  public function getIpCidrRange()
  {
    return $this->ipCidrRange;
  }
  public function setIsLiveMigration($isLiveMigration)
  {
    $this->isLiveMigration = $isLiveMigration;
  }
  public function getIsLiveMigration()
  {
    return $this->isLiveMigration;
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
  public function setParentPrefix($parentPrefix)
  {
    $this->parentPrefix = $parentPrefix;
  }
  public function getParentPrefix()
  {
    return $this->parentPrefix;
  }
  /**
   * @param Google_Service_Compute_PublicDelegatedPrefixPublicDelegatedSubPrefix[]
   */
  public function setPublicDelegatedSubPrefixs($publicDelegatedSubPrefixs)
  {
    $this->publicDelegatedSubPrefixs = $publicDelegatedSubPrefixs;
  }
  /**
   * @return Google_Service_Compute_PublicDelegatedPrefixPublicDelegatedSubPrefix[]
   */
  public function getPublicDelegatedSubPrefixs()
  {
    return $this->publicDelegatedSubPrefixs;
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
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}
