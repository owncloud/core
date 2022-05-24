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

namespace Google\Service\Compute;

class LogConfig extends \Google\Model
{
  protected $cloudAuditType = LogConfigCloudAuditOptions::class;
  protected $cloudAuditDataType = '';
  protected $counterType = LogConfigCounterOptions::class;
  protected $counterDataType = '';
  protected $dataAccessType = LogConfigDataAccessOptions::class;
  protected $dataAccessDataType = '';

  /**
   * @param LogConfigCloudAuditOptions
   */
  public function setCloudAudit(LogConfigCloudAuditOptions $cloudAudit)
  {
    $this->cloudAudit = $cloudAudit;
  }
  /**
   * @return LogConfigCloudAuditOptions
   */
  public function getCloudAudit()
  {
    return $this->cloudAudit;
  }
  /**
   * @param LogConfigCounterOptions
   */
  public function setCounter(LogConfigCounterOptions $counter)
  {
    $this->counter = $counter;
  }
  /**
   * @return LogConfigCounterOptions
   */
  public function getCounter()
  {
    return $this->counter;
  }
  /**
   * @param LogConfigDataAccessOptions
   */
  public function setDataAccess(LogConfigDataAccessOptions $dataAccess)
  {
    $this->dataAccess = $dataAccess;
  }
  /**
   * @return LogConfigDataAccessOptions
   */
  public function getDataAccess()
  {
    return $this->dataAccess;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LogConfig::class, 'Google_Service_Compute_LogConfig');
