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

namespace Google\Service\Logging;

class Settings extends \Google\Model
{
  /**
   * @var bool
   */
  public $disableDefaultSink;
  /**
   * @var string
   */
  public $kmsKeyName;
  /**
   * @var string
   */
  public $kmsServiceAccountId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $storageLocation;

  /**
   * @param bool
   */
  public function setDisableDefaultSink($disableDefaultSink)
  {
    $this->disableDefaultSink = $disableDefaultSink;
  }
  /**
   * @return bool
   */
  public function getDisableDefaultSink()
  {
    return $this->disableDefaultSink;
  }
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
  public function setKmsServiceAccountId($kmsServiceAccountId)
  {
    $this->kmsServiceAccountId = $kmsServiceAccountId;
  }
  /**
   * @return string
   */
  public function getKmsServiceAccountId()
  {
    return $this->kmsServiceAccountId;
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
  public function setStorageLocation($storageLocation)
  {
    $this->storageLocation = $storageLocation;
  }
  /**
   * @return string
   */
  public function getStorageLocation()
  {
    return $this->storageLocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Settings::class, 'Google_Service_Logging_Settings');
