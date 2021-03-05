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

class Google_Service_DisplayVideo_BulkEditAssignedInventorySourcesRequest extends Google_Collection
{
  protected $collection_key = 'deletedAssignedInventorySources';
  public $advertiserId;
  protected $createdAssignedInventorySourcesType = 'Google_Service_DisplayVideo_AssignedInventorySource';
  protected $createdAssignedInventorySourcesDataType = 'array';
  public $deletedAssignedInventorySources;
  public $partnerId;

  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param Google_Service_DisplayVideo_AssignedInventorySource[]
   */
  public function setCreatedAssignedInventorySources($createdAssignedInventorySources)
  {
    $this->createdAssignedInventorySources = $createdAssignedInventorySources;
  }
  /**
   * @return Google_Service_DisplayVideo_AssignedInventorySource[]
   */
  public function getCreatedAssignedInventorySources()
  {
    return $this->createdAssignedInventorySources;
  }
  public function setDeletedAssignedInventorySources($deletedAssignedInventorySources)
  {
    $this->deletedAssignedInventorySources = $deletedAssignedInventorySources;
  }
  public function getDeletedAssignedInventorySources()
  {
    return $this->deletedAssignedInventorySources;
  }
  public function setPartnerId($partnerId)
  {
    $this->partnerId = $partnerId;
  }
  public function getPartnerId()
  {
    return $this->partnerId;
  }
}
