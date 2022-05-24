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

namespace Google\Service\Storage;

class StorageObjectCustomerEncryption extends \Google\Model
{
  /**
   * @var string
   */
  public $encryptionAlgorithm;
  /**
   * @var string
   */
  public $keySha256;

  /**
   * @param string
   */
  public function setEncryptionAlgorithm($encryptionAlgorithm)
  {
    $this->encryptionAlgorithm = $encryptionAlgorithm;
  }
  /**
   * @return string
   */
  public function getEncryptionAlgorithm()
  {
    return $this->encryptionAlgorithm;
  }
  /**
   * @param string
   */
  public function setKeySha256($keySha256)
  {
    $this->keySha256 = $keySha256;
  }
  /**
   * @return string
   */
  public function getKeySha256()
  {
    return $this->keySha256;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StorageObjectCustomerEncryption::class, 'Google_Service_Storage_StorageObjectCustomerEncryption');
