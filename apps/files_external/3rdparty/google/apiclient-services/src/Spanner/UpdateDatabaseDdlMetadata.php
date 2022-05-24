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

class UpdateDatabaseDdlMetadata extends \Google\Collection
{
  protected $collection_key = 'statements';
  /**
   * @var string[]
   */
  public $commitTimestamps;
  /**
   * @var string
   */
  public $database;
  protected $progressType = OperationProgress::class;
  protected $progressDataType = 'array';
  /**
   * @var string[]
   */
  public $statements;
  /**
   * @var bool
   */
  public $throttled;

  /**
   * @param string[]
   */
  public function setCommitTimestamps($commitTimestamps)
  {
    $this->commitTimestamps = $commitTimestamps;
  }
  /**
   * @return string[]
   */
  public function getCommitTimestamps()
  {
    return $this->commitTimestamps;
  }
  /**
   * @param string
   */
  public function setDatabase($database)
  {
    $this->database = $database;
  }
  /**
   * @return string
   */
  public function getDatabase()
  {
    return $this->database;
  }
  /**
   * @param OperationProgress[]
   */
  public function setProgress($progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return OperationProgress[]
   */
  public function getProgress()
  {
    return $this->progress;
  }
  /**
   * @param string[]
   */
  public function setStatements($statements)
  {
    $this->statements = $statements;
  }
  /**
   * @return string[]
   */
  public function getStatements()
  {
    return $this->statements;
  }
  /**
   * @param bool
   */
  public function setThrottled($throttled)
  {
    $this->throttled = $throttled;
  }
  /**
   * @return bool
   */
  public function getThrottled()
  {
    return $this->throttled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateDatabaseDdlMetadata::class, 'Google_Service_Spanner_UpdateDatabaseDdlMetadata');
