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

namespace Google\Service\Dfareporting;

class EncryptionInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $encryptionEntityId;
  /**
   * @var string
   */
  public $encryptionEntityType;
  /**
   * @var string
   */
  public $encryptionSource;
  /**
   * @var string
   */
  public $kind;

  /**
   * @param string
   */
  public function setEncryptionEntityId($encryptionEntityId)
  {
    $this->encryptionEntityId = $encryptionEntityId;
  }
  /**
   * @return string
   */
  public function getEncryptionEntityId()
  {
    return $this->encryptionEntityId;
  }
  /**
   * @param string
   */
  public function setEncryptionEntityType($encryptionEntityType)
  {
    $this->encryptionEntityType = $encryptionEntityType;
  }
  /**
   * @return string
   */
  public function getEncryptionEntityType()
  {
    return $this->encryptionEntityType;
  }
  /**
   * @param string
   */
  public function setEncryptionSource($encryptionSource)
  {
    $this->encryptionSource = $encryptionSource;
  }
  /**
   * @return string
   */
  public function getEncryptionSource()
  {
    return $this->encryptionSource;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EncryptionInfo::class, 'Google_Service_Dfareporting_EncryptionInfo');
