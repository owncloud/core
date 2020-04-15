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

class Google_Service_SystemsManagement_ExecStep extends Google_Model
{
  protected $linuxExecStepConfigType = 'Google_Service_SystemsManagement_ExecStepConfig';
  protected $linuxExecStepConfigDataType = '';
  protected $windowsExecStepConfigType = 'Google_Service_SystemsManagement_ExecStepConfig';
  protected $windowsExecStepConfigDataType = '';

  /**
   * @param Google_Service_SystemsManagement_ExecStepConfig
   */
  public function setLinuxExecStepConfig(Google_Service_SystemsManagement_ExecStepConfig $linuxExecStepConfig)
  {
    $this->linuxExecStepConfig = $linuxExecStepConfig;
  }
  /**
   * @return Google_Service_SystemsManagement_ExecStepConfig
   */
  public function getLinuxExecStepConfig()
  {
    return $this->linuxExecStepConfig;
  }
  /**
   * @param Google_Service_SystemsManagement_ExecStepConfig
   */
  public function setWindowsExecStepConfig(Google_Service_SystemsManagement_ExecStepConfig $windowsExecStepConfig)
  {
    $this->windowsExecStepConfig = $windowsExecStepConfig;
  }
  /**
   * @return Google_Service_SystemsManagement_ExecStepConfig
   */
  public function getWindowsExecStepConfig()
  {
    return $this->windowsExecStepConfig;
  }
}
