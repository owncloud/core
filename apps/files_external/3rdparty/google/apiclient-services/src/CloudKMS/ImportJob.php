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
  public $createTime;
  public $expireEventTime;
  public $expireTime;
  public $generateTime;
  public $importMethod;
  public $name;
  public $protectionLevel;
  protected $publicKeyType = WrappingPublicKey::class;
  protected $publicKeyDataType = '';
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
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setExpireEventTime($expireEventTime)
  {
    $this->expireEventTime = $expireEventTime;
  }
  public function getExpireEventTime()
  {
    return $this->expireEventTime;
  }
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  public function setGenerateTime($generateTime)
  {
    $this->generateTime = $generateTime;
  }
  public function getGenerateTime()
  {
    return $this->generateTime;
  }
  public function setImportMethod($importMethod)
  {
    $this->importMethod = $importMethod;
  }
  public function getImportMethod()
  {
    return $this->importMethod;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProtectionLevel($protectionLevel)
  {
    $this->protectionLevel = $protectionLevel;
  }
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
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImportJob::class, 'Google_Service_CloudKMS_ImportJob');
