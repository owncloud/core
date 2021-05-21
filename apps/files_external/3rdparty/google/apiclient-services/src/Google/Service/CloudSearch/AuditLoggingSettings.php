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

class Google_Service_CloudSearch_AuditLoggingSettings extends Google_Model
{
  public $logAdminReadActions;
  public $logDataReadActions;
  public $logDataWriteActions;
  public $project;

  public function setLogAdminReadActions($logAdminReadActions)
  {
    $this->logAdminReadActions = $logAdminReadActions;
  }
  public function getLogAdminReadActions()
  {
    return $this->logAdminReadActions;
  }
  public function setLogDataReadActions($logDataReadActions)
  {
    $this->logDataReadActions = $logDataReadActions;
  }
  public function getLogDataReadActions()
  {
    return $this->logDataReadActions;
  }
  public function setLogDataWriteActions($logDataWriteActions)
  {
    $this->logDataWriteActions = $logDataWriteActions;
  }
  public function getLogDataWriteActions()
  {
    return $this->logDataWriteActions;
  }
  public function setProject($project)
  {
    $this->project = $project;
  }
  public function getProject()
  {
    return $this->project;
  }
}
