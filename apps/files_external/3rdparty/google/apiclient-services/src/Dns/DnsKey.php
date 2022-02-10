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

namespace Google\Service\Dns;

class DnsKey extends \Google\Collection
{
  protected $collection_key = 'digests';
  /**
   * @var string
   */
  public $algorithm;
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $description;
  protected $digestsType = DnsKeyDigest::class;
  protected $digestsDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $isActive;
  /**
   * @var string
   */
  public $keyLength;
  /**
   * @var int
   */
  public $keyTag;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $publicKey;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setAlgorithm($algorithm)
  {
    $this->algorithm = $algorithm;
  }
  /**
   * @return string
   */
  public function getAlgorithm()
  {
    return $this->algorithm;
  }
  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
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
   * @param DnsKeyDigest[]
   */
  public function setDigests($digests)
  {
    $this->digests = $digests;
  }
  /**
   * @return DnsKeyDigest[]
   */
  public function getDigests()
  {
    return $this->digests;
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
   * @param bool
   */
  public function setIsActive($isActive)
  {
    $this->isActive = $isActive;
  }
  /**
   * @return bool
   */
  public function getIsActive()
  {
    return $this->isActive;
  }
  /**
   * @param string
   */
  public function setKeyLength($keyLength)
  {
    $this->keyLength = $keyLength;
  }
  /**
   * @return string
   */
  public function getKeyLength()
  {
    return $this->keyLength;
  }
  /**
   * @param int
   */
  public function setKeyTag($keyTag)
  {
    $this->keyTag = $keyTag;
  }
  /**
   * @return int
   */
  public function getKeyTag()
  {
    return $this->keyTag;
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
  public function setPublicKey($publicKey)
  {
    $this->publicKey = $publicKey;
  }
  /**
   * @return string
   */
  public function getPublicKey()
  {
    return $this->publicKey;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DnsKey::class, 'Google_Service_Dns_DnsKey');
