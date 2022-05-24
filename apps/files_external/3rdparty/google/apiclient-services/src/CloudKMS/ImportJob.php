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

namespace Google\Service\CloudKMS;

class ImportJob extends \Google\Model
{
  protected $attestationType = KeyOperationAttestation::class;
  protected $attestationDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $expireEventTime;
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var string
   */
  public $generateTime;
  /**
   * @var string
   */
  public $importMethod;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $protectionLevel;
  protected $publicKeyType = WrappingPublicKey::class;
  protected $publicKeyDataType = '';
  /**
   * @var string
   */
  public $state;

  /**
   * @param KeyOperationAttestation
   */
  public function setAttestation(KeyOperationAttestation $attestation)
  {
    $this->attestation = $attestation;
  }
  /**
   * @return KeyOperationAttestation
   */
  public function getAttestation()
  {
    return $this->attestation;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setExpireEventTime($expireEventTime)
  {
    $this->expireEventTime = $expireEventTime;
  }
  /**
   * @return string
   */
  public function getExpireEventTime()
  {
    return $this->expireEventTime;
  }
  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param string
   */
  public function setGenerateTime($generateTime)
  {
    $this->generateTime = $generateTime;
  }
  /**
   * @return string
   */
  public function getGenerateTime()
  {
    return $this->generateTime;
  }
  /**
   * @param string
   */
  public function setImportMethod($importMethod)
  {
    $this->importMethod = $importMethod;
  }
  /**
   * @return string
   */
  public function getImportMethod()
  {
    return $this->importMethod;
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
  public function setProtectionLevel($protectionLevel)
  {
    $this->protectionLevel = $protectionLevel;
  }
  /**
   * @return string
   */
  public function getProtectionLevel()
  {
    return $this->protectionLevel;
  }
  /**
   * @param WrappingPublicKey
   */
  public function setPublicKey(WrappingPublicKey $publicKey)
  {
    $this->publicKey = $publicKey;
  }
  /**
   * @return WrappingPublicKey
   */
  public function getPublicKey()
  {
    return $this->publicKey;
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
class_alias(ImportJob::class, 'Google_Service_CloudKMS_ImportJob');
