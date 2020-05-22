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

class Google_Service_CloudKMS_ImportJob extends Google_Model
{
  protected $attestationType = 'Google_Service_CloudKMS_KeyOperationAttestation';
  protected $attestationDataType = '';
  public $createTime;
  public $expireEventTime;
  public $expireTime;
  public $generateTime;
  public $importMethod;
  public $name;
  public $protectionLevel;
  protected $publicKeyType = 'Google_Service_CloudKMS_WrappingPublicKey';
  protected $publicKeyDataType = '';
  public $state;

  /**
   * @param Google_Service_CloudKMS_KeyOperationAttestation
   */
  public function setAttestation(Google_Service_CloudKMS_KeyOperationAttestation $attestation)
  {
    $this->attestation = $attestation;
  }
  /**
   * @return Google_Service_CloudKMS_KeyOperationAttestation
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
   * @param Google_Service_CloudKMS_WrappingPublicKey
   */
  public function setPublicKey(Google_Service_CloudKMS_WrappingPublicKey $publicKey)
  {
    $this->publicKey = $publicKey;
  }
  /**
   * @return Google_Service_CloudKMS_WrappingPublicKey
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
