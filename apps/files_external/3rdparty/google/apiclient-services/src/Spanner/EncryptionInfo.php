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

namespace Google\Service\Spanner;

class EncryptionInfo extends \Google\Model
{
  protected $encryptionStatusType = Status::class;
  protected $encryptionStatusDataType = '';
  public $encryptionType;
  public $kmsKeyVersion;

  /**
   * @param Status
   */
  public function setEncryptionStatus(Status $encryptionStatus)
  {
    $this->encryptionStatus = $encryptionStatus;
  }
  /**
   * @return Status
   */
  public function getEncryptionStatus()
  {
    return $this->encryptionStatus;
  }
  public function setEncryptionType($encryptionType)
  {
    $this->encryptionType = $encryptionType;
  }
  public function getEncryptionType()
  {
    return $this->encryptionType;
  }
  public function setKmsKeyVersion($kmsKeyVersion)
  {
    $this->kmsKeyVersion = $kmsKeyVersion;
  }
  public function getKmsKeyVersion()
  {
    return $this->kmsKeyVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EncryptionInfo::class, 'Google_Service_Spanner_EncryptionInfo');
