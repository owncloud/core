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

class BackupRetentionSettings extends \Google\Model
{
  /**
   * @var int
   */
  public $retainedBackups;
  /**
   * @var string
   */
  public $retentionUnit;

  /**
   * @param int
   */
  public function setRetainedBackups($retainedBackups)
  {
    $this->retainedBackups = $retainedBackups;
  }
  /**
   * @return int
   */
  public function getRetainedBackups()
  {
    return $this->retainedBackups;
  }
  /**
   * @param string
   */
  public function setRetentionUnit($retentionUnit)
  {
    $this->retentionUnit = $retentionUnit;
  }
  /**
   * @return string
   */
  public function getRetentionUnit()
  {
    return $this->retentionUnit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackupRetentionSettings::class, 'Google_Service_SQLAdmin_BackupRetentionSettings');
