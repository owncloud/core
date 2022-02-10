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

namespace Google\Service\SQLAdmin;

class SqlInstancesVerifyExternalSyncSettingsResponse extends \Google\Collection
{
  protected $collection_key = 'warnings';
  protected $errorsType = SqlExternalSyncSettingError::class;
  protected $errorsDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  protected $warningsType = SqlExternalSyncSettingError::class;
  protected $warningsDataType = 'array';

  /**
   * @param SqlExternalSyncSettingError[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return SqlExternalSyncSettingError[]
   */
  public function getErrors()
  {
    return $this->errors;
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
  /**
   * @param SqlExternalSyncSettingError[]
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return SqlExternalSyncSettingError[]
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SqlInstancesVerifyExternalSyncSettingsResponse::class, 'Google_Service_SQLAdmin_SqlInstancesVerifyExternalSyncSettingsResponse');
