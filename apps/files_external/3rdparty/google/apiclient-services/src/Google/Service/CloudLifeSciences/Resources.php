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

class Google_Service_CloudLifeSciences_Resources extends Google_Collection
{
  protected $collection_key = 'zones';
  public $regions;
  protected $virtualMachineType = 'Google_Service_CloudLifeSciences_VirtualMachine';
  protected $virtualMachineDataType = '';
  public $zones;

  public function setRegions($regions)
  {
    $this->regions = $regions;
  }
  public function getRegions()
  {
    return $this->regions;
  }
  /**
   * @param Google_Service_CloudLifeSciences_VirtualMachine
   */
  public function setVirtualMachine(Google_Service_CloudLifeSciences_VirtualMachine $virtualMachine)
  {
    $this->virtualMachine = $virtualMachine;
  }
  /**
   * @return Google_Service_CloudLifeSciences_VirtualMachine
   */
  public function getVirtualMachine()
  {
    return $this->virtualMachine;
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
