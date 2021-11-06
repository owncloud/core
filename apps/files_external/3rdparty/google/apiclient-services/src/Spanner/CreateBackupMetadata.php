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

class CreateBackupMetadata extends \Google\Model
{
  public $cancelTime;
  public $database;
  public $name;
  protected $progressType = OperationProgress::class;
  protected $progressDataType = '';

  public function setCancelTime($cancelTime)
  {
    $this->cancelTime = $cancelTime;
  }
  public function getCancelTime()
  {
    return $this->cancelTime;
  }
  public function setDatabase($database)
  {
    $this->database = $database;
  }
  public function getDatabase()
  {
    return $this->database;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param OperationProgress
   */
  public function setProgress(OperationProgress $progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return OperationProgress
   */
  public function getProgress()
  {
    return $this->progress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateBackupMetadata::class, 'Google_Service_Spanner_CreateBackupMetadata');
