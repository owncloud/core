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

namespace Google\Service\CloudSearch;

class AuditLoggingSettings extends \Google\Model
{
  /**
   * @var bool
   */
  public $logAdminReadActions;
  /**
   * @var bool
   */
  public $logDataReadActions;
  /**
   * @var bool
   */
  public $logDataWriteActions;
  /**
   * @var string
   */
  public $project;

  /**
   * @param bool
   */
  public function setLogAdminReadActions($logAdminReadActions)
  {
    $this->logAdminReadActions = $logAdminReadActions;
  }
  /**
   * @return bool
   */
  public function getLogAdminReadActions()
  {
    return $this->logAdminReadActions;
  }
  /**
   * @param bool
   */
  public function setLogDataReadActions($logDataReadActions)
  {
    $this->logDataReadActions = $logDataReadActions;
  }
  /**
   * @return bool
   */
  public function getLogDataReadActions()
  {
    return $this->logDataReadActions;
  }
  /**
   * @param bool
   */
  public function setLogDataWriteActions($logDataWriteActions)
  {
    $this->logDataWriteActions = $logDataWriteActions;
  }
  /**
   * @return bool
   */
  public function getLogDataWriteActions()
  {
    return $this->logDataWriteActions;
  }
  /**
   * @param string
   */
  public function setProject($project)
  {
    $this->project = $project;
  }
  /**
   * @return string
   */
  public function getProject()
  {
    return $this->project;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuditLoggingSettings::class, 'Google_Service_CloudSearch_AuditLoggingSettings');
