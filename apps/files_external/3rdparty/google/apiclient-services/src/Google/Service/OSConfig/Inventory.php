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

class Google_Service_OSConfig_Inventory extends Google_Model
{
  protected $itemsType = 'Google_Service_OSConfig_InventoryItem';
  protected $itemsDataType = 'map';
  protected $osInfoType = 'Google_Service_OSConfig_InventoryOsInfo';
  protected $osInfoDataType = '';

  /**
   * @param Google_Service_OSConfig_InventoryItem[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Google_Service_OSConfig_InventoryItem[]
   */
  public function getItems()
  {
    return $this->items;
  }
  /**
   * @param Google_Service_OSConfig_InventoryOsInfo
   */
  public function setOsInfo(Google_Service_OSConfig_InventoryOsInfo $osInfo)
  {
    $this->osInfo = $osInfo;
  }
  /**
   * @return Google_Service_OSConfig_InventoryOsInfo
   */
  public function getOsInfo()
  {
    return $this->osInfo;
  }
}
