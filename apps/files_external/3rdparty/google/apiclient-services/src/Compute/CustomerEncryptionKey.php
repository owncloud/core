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

class CustomerEncryptionKey extends \Google\Model
{
  /**
   * @var string
   */
  public $kmsKeyName;
  /**
   * @var string
   */
  public $kmsKeyServiceAccount;
  /**
   * @var string
   */
  public $rawKey;
  /**
   * @var string
   */
  public $rsaEncryptedKey;
  /**
   * @var string
   */
  public $sha256;

  /**
   * @param string
   */
  public function setKmsKeyName($kmsKeyName)
  {
    $this->kmsKeyName = $kmsKeyName;
  }
  /**
   * @return string
   */
  public function getKmsKeyName()
  {
    return $this->kmsKeyName;
  }
  /**
   * @param string
   */
  public function setKmsKeyServiceAccount($kmsKeyServiceAccount)
  {
    $this->kmsKeyServiceAccount = $kmsKeyServiceAccount;
  }
  /**
   * @return string
   */
  public function getKmsKeyServiceAccount()
  {
    return $this->kmsKeyServiceAccount;
  }
  /**
   * @param string
   */
  public function setRawKey($rawKey)
  {
    $this->rawKey = $rawKey;
  }
  /**
   * @return string
   */
  public function getRawKey()
  {
    return $this->rawKey;
  }
  /**
   * @param string
   */
  public function setRsaEncryptedKey($rsaEncryptedKey)
  {
    $this->rsaEncryptedKey = $rsaEncryptedKey;
  }
  /**
   * @return string
   */
  public function getRsaEncryptedKey()
  {
    return $this->rsaEncryptedKey;
  }
  /**
   * @param string
   */
  public function setSha256($sha256)
  {
    $this->sha256 = $sha256;
  }
  /**
   * @return string
   */
  public function getSha256()
  {
    return $this->sha256;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomerEncryptionKey::class, 'Google_Service_Compute_CustomerEncryptionKey');
