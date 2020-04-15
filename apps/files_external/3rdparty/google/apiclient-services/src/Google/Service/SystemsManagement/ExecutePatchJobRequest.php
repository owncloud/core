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

class Google_Service_SystemsManagement_ExecutePatchJobRequest extends Google_Model
{
  public $description;
  public $displayName;
  public $dryRun;
  public $duration;
  protected $instanceFilterType = 'Google_Service_SystemsManagement_PatchInstanceFilter';
  protected $instanceFilterDataType = '';
  protected $patchConfigType = 'Google_Service_SystemsManagement_PatchConfig';
  protected $patchConfigDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDryRun($dryRun)
  {
    $this->dryRun = $dryRun;
  }
  public function getDryRun()
  {
    return $this->dryRun;
  }
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param Google_Service_SystemsManagement_PatchInstanceFilter
   */
  public function setInstanceFilter(Google_Service_SystemsManagement_PatchInstanceFilter $instanceFilter)
  {
    $this->instanceFilter = $instanceFilter;
  }
  /**
   * @return Google_Service_SystemsManagement_PatchInstanceFilter
   */
  public function getInstanceFilter()
  {
    return $this->instanceFilter;
  }
  /**
   * @param Google_Service_SystemsManagement_PatchConfig
   */
  public function setPatchConfig(Google_Service_SystemsManagement_PatchConfig $patchConfig)
  {
    $this->patchConfig = $patchConfig;
  }
  /**
   * @return Google_Service_SystemsManagement_PatchConfig
   */
  public function getPatchConfig()
  {
    return $this->patchConfig;
  }
}
