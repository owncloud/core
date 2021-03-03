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

class Google_Service_DatabaseMigrationService_GenerateSshScriptRequest extends Google_Model
{
  public $vm;
  protected $vmCreationConfigType = 'Google_Service_DatabaseMigrationService_VmCreationConfig';
  protected $vmCreationConfigDataType = '';
  public $vmPort;
  protected $vmSelectionConfigType = 'Google_Service_DatabaseMigrationService_VmSelectionConfig';
  protected $vmSelectionConfigDataType = '';

  public function setVm($vm)
  {
    $this->vm = $vm;
  }
  public function getVm()
  {
    return $this->vm;
  }
  /**
   * @param Google_Service_DatabaseMigrationService_VmCreationConfig
   */
  public function setVmCreationConfig(Google_Service_DatabaseMigrationService_VmCreationConfig $vmCreationConfig)
  {
    $this->vmCreationConfig = $vmCreationConfig;
  }
  /**
   * @return Google_Service_DatabaseMigrationService_VmCreationConfig
   */
  public function getVmCreationConfig()
  {
    return $this->vmCreationConfig;
  }
  public function setVmPort($vmPort)
  {
    $this->vmPort = $vmPort;
  }
  public function getVmPort()
  {
    return $this->vmPort;
  }
  /**
   * @param Google_Service_DatabaseMigrationService_VmSelectionConfig
   */
  public function setVmSelectionConfig(Google_Service_DatabaseMigrationService_VmSelectionConfig $vmSelectionConfig)
  {
    $this->vmSelectionConfig = $vmSelectionConfig;
  }
  /**
   * @return Google_Service_DatabaseMigrationService_VmSelectionConfig
   */
  public function getVmSelectionConfig()
  {
    return $this->vmSelectionConfig;
  }
}
