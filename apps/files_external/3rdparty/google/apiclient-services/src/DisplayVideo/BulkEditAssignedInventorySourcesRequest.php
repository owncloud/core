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

namespace Google\Service\DisplayVideo;

class BulkEditAssignedInventorySourcesRequest extends \Google\Collection
{
  protected $collection_key = 'deletedAssignedInventorySources';
  /**
   * @var string
   */
  public $advertiserId;
  protected $createdAssignedInventorySourcesType = AssignedInventorySource::class;
  protected $createdAssignedInventorySourcesDataType = 'array';
  /**
   * @var string[]
   */
  public $deletedAssignedInventorySources;
  /**
   * @var string
   */
  public $partnerId;

  /**
   * @param string
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param AssignedInventorySource[]
   */
  public function setCreatedAssignedInventorySources($createdAssignedInventorySources)
  {
    $this->createdAssignedInventorySources = $createdAssignedInventorySources;
  }
  /**
   * @return AssignedInventorySource[]
   */
  public function getCreatedAssignedInventorySources()
  {
    return $this->createdAssignedInventorySources;
  }
  /**
   * @param string[]
   */
  public function setDeletedAssignedInventorySources($deletedAssignedInventorySources)
  {
    $this->deletedAssignedInventorySources = $deletedAssignedInventorySources;
  }
  /**
   * @return string[]
   */
  public function getDeletedAssignedInventorySources()
  {
    return $this->deletedAssignedInventorySources;
  }
  /**
   * @param string
   */
  public function setPartnerId($partnerId)
  {
    $this->partnerId = $partnerId;
  }
  /**
   * @return string
   */
  public function getPartnerId()
  {
    return $this->partnerId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BulkEditAssignedInventorySourcesRequest::class, 'Google_Service_DisplayVideo_BulkEditAssignedInventorySourcesRequest');
