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

class Google_Service_SystemsManagement_PatchInstanceFilter extends Google_Collection
{
  protected $collection_key = 'zones';
  public $all;
  protected $groupLabelsType = 'Google_Service_SystemsManagement_PatchInstanceFilterGroupLabel';
  protected $groupLabelsDataType = 'array';
  public $instanceNamePrefixes;
  public $instances;
  public $zones;

  public function setAll($all)
  {
    $this->all = $all;
  }
  public function getAll()
  {
    return $this->all;
  }
  /**
   * @param Google_Service_SystemsManagement_PatchInstanceFilterGroupLabel
   */
  public function setGroupLabels($groupLabels)
  {
    $this->groupLabels = $groupLabels;
  }
  /**
   * @return Google_Service_SystemsManagement_PatchInstanceFilterGroupLabel
   */
  public function getGroupLabels()
  {
    return $this->groupLabels;
  }
  public function setInstanceNamePrefixes($instanceNamePrefixes)
  {
    $this->instanceNamePrefixes = $instanceNamePrefixes;
  }
  public function getInstanceNamePrefixes()
  {
    return $this->instanceNamePrefixes;
  }
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }
  public function getInstances()
  {
    return $this->instances;
  }
  public function setZones($zones)
  {
    $this->zones = $zones;
  }
  public function getZones()
  {
    return $this->zones;
  }
}
