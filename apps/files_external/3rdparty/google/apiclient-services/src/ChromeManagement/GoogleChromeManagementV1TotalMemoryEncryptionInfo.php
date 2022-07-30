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

namespace Google\Service\ChromeManagement;

class GoogleChromeManagementV1TotalMemoryEncryptionInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $encryptionAlgorithm;
  /**
   * @var string
   */
  public $encryptionState;
  /**
   * @var string
   */
  public $keyLength;
  /**
   * @var string
   */
  public $maxKeys;

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
  public function setEncryptionState($encryptionState)
  {
    $this->encryptionState = $encryptionState;
  }
  /**
   * @return string
   */
  public function getEncryptionState()
  {
    return $this->encryptionState;
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
   * @param string
   */
  public function setMaxKeys($maxKeys)
  {
    $this->maxKeys = $maxKeys;
  }
  /**
   * @return string
   */
  public function getMaxKeys()
  {
    return $this->maxKeys;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1TotalMemoryEncryptionInfo::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1TotalMemoryEncryptionInfo');
