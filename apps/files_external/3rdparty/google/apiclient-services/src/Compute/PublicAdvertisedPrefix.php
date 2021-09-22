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

class PublicAdvertisedPrefix extends \Google\Collection
{
  protected $collection_key = 'publicDelegatedPrefixs';
  public $creationTimestamp;
  public $description;
  public $dnsVerificationIp;
  public $fingerprint;
  public $id;
  public $ipCidrRange;
  public $kind;
  public $name;
  protected $publicDelegatedPrefixsType = PublicAdvertisedPrefixPublicDelegatedPrefix::class;
  protected $publicDelegatedPrefixsDataType = 'array';
  public $selfLink;
  public $sharedSecret;
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
  public function setDnsVerificationIp($dnsVerificationIp)
  {
    $this->dnsVerificationIp = $dnsVerificationIp;
  }
  public function getDnsVerificationIp()
  {
    return $this->dnsVerificationIp;
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
  /**
   * @param PublicAdvertisedPrefixPublicDelegatedPrefix[]
   */
  public function setPublicDelegatedPrefixs($publicDelegatedPrefixs)
  {
    $this->publicDelegatedPrefixs = $publicDelegatedPrefixs;
  }
  /**
   * @return PublicAdvertisedPrefixPublicDelegatedPrefix[]
   */
  public function getPublicDelegatedPrefixs()
  {
    return $this->publicDelegatedPrefixs;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setSharedSecret($sharedSecret)
  {
    $this->sharedSecret = $sharedSecret;
  }
  public function getSharedSecret()
  {
    return $this->sharedSecret;
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
class_alias(PublicAdvertisedPrefix::class, 'Google_Service_Compute_PublicAdvertisedPrefix');
