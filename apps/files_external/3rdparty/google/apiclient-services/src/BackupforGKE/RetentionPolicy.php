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

namespace Google\Service\BackupforGKE;

class RetentionPolicy extends \Google\Model
{
  /**
   * @var int
   */
  public $backupDeleteLockDays;
  /**
   * @var int
   */
  public $backupRetainDays;
  /**
   * @var bool
   */
  public $locked;

  /**
   * @param int
   */
  public function setBackupDeleteLockDays($backupDeleteLockDays)
  {
    $this->backupDeleteLockDays = $backupDeleteLockDays;
  }
  /**
   * @return int
   */
  public function getBackupDeleteLockDays()
  {
    return $this->backupDeleteLockDays;
  }
  /**
   * @param int
   */
  public function setBackupRetainDays($backupRetainDays)
  {
    $this->backupRetainDays = $backupRetainDays;
  }
  /**
   * @return int
   */
  public function getBackupRetainDays()
  {
    return $this->backupRetainDays;
  }
  /**
   * @param bool
   */
  public function setLocked($locked)
  {
    $this->locked = $locked;
  }
  /**
   * @return bool
   */
  public function getLocked()
  {
    return $this->locked;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RetentionPolicy::class, 'Google_Service_BackupforGKE_RetentionPolicy');
