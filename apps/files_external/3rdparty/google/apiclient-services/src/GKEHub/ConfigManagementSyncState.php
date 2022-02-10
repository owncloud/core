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

namespace Google\Service\GKEHub;

class ConfigManagementSyncState extends \Google\Collection
{
  protected $collection_key = 'errors';
  /**
   * @var string
   */
  public $code;
  protected $errorsType = ConfigManagementSyncError::class;
  protected $errorsDataType = 'array';
  /**
   * @var string
   */
  public $importToken;
  /**
   * @var string
   */
  public $lastSync;
  /**
   * @var string
   */
  public $lastSyncTime;
  /**
   * @var string
   */
  public $sourceToken;
  /**
   * @var string
   */
  public $syncToken;

  /**
   * @param string
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return string
   */
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param ConfigManagementSyncError[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return ConfigManagementSyncError[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param string
   */
  public function setImportToken($importToken)
  {
    $this->importToken = $importToken;
  }
  /**
   * @return string
   */
  public function getImportToken()
  {
    return $this->importToken;
  }
  /**
   * @param string
   */
  public function setLastSync($lastSync)
  {
    $this->lastSync = $lastSync;
  }
  /**
   * @return string
   */
  public function getLastSync()
  {
    return $this->lastSync;
  }
  /**
   * @param string
   */
  public function setLastSyncTime($lastSyncTime)
  {
    $this->lastSyncTime = $lastSyncTime;
  }
  /**
   * @return string
   */
  public function getLastSyncTime()
  {
    return $this->lastSyncTime;
  }
  /**
   * @param string
   */
  public function setSourceToken($sourceToken)
  {
    $this->sourceToken = $sourceToken;
  }
  /**
   * @return string
   */
  public function getSourceToken()
  {
    return $this->sourceToken;
  }
  /**
   * @param string
   */
  public function setSyncToken($syncToken)
  {
    $this->syncToken = $syncToken;
  }
  /**
   * @return string
   */
  public function getSyncToken()
  {
    return $this->syncToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigManagementSyncState::class, 'Google_Service_GKEHub_ConfigManagementSyncState');
