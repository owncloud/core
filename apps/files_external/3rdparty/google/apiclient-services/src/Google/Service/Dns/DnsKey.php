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

class Google_Service_Dns_DnsKey extends Google_Collection
{
  protected $collection_key = 'digests';
  public $algorithm;
  public $creationTime;
  public $description;
  protected $digestsType = 'Google_Service_Dns_DnsKeyDigest';
  protected $digestsDataType = 'array';
  public $id;
  public $isActive;
  public $keyLength;
  public $keyTag;
  public $kind;
  public $publicKey;
  public $type;

  public function setAlgorithm($algorithm)
  {
    $this->algorithm = $algorithm;
  }
  public function getAlgorithm()
  {
    return $this->algorithm;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
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
   * @param Google_Service_Dns_DnsKeyDigest
   */
  public function setDigests($digests)
  {
    $this->digests = $digests;
  }
  /**
   * @return Google_Service_Dns_DnsKeyDigest
   */
  public function getDigests()
  {
    return $this->digests;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIsActive($isActive)
  {
    $this->isActive = $isActive;
  }
  public function getIsActive()
  {
    return $this->isActive;
  }
  public function setKeyLength($keyLength)
  {
    $this->keyLength = $keyLength;
  }
  public function getKeyLength()
  {
    return $this->keyLength;
  }
  public function setKeyTag($keyTag)
  {
    $this->keyTag = $keyTag;
  }
  public function getKeyTag()
  {
    return $this->keyTag;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPublicKey($publicKey)
  {
    $this->publicKey = $publicKey;
  }
  public function getPublicKey()
  {
    return $this->publicKey;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
