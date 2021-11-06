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

class CreateSdfDownloadTaskRequest extends \Google\Model
{
  public $advertiserId;
  protected $idFilterType = IdFilter::class;
  protected $idFilterDataType = '';
  protected $inventorySourceFilterType = InventorySourceFilter::class;
  protected $inventorySourceFilterDataType = '';
  protected $parentEntityFilterType = ParentEntityFilter::class;
  protected $parentEntityFilterDataType = '';
  public $partnerId;
  public $version;

  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param IdFilter
   */
  public function setIdFilter(IdFilter $idFilter)
  {
    $this->idFilter = $idFilter;
  }
  /**
   * @return IdFilter
   */
  public function getIdFilter()
  {
    return $this->idFilter;
  }
  /**
   * @param InventorySourceFilter
   */
  public function setInventorySourceFilter(InventorySourceFilter $inventorySourceFilter)
  {
    $this->inventorySourceFilter = $inventorySourceFilter;
  }
  /**
   * @return InventorySourceFilter
   */
  public function getInventorySourceFilter()
  {
    return $this->inventorySourceFilter;
  }
  /**
   * @param ParentEntityFilter
   */
  public function setParentEntityFilter(ParentEntityFilter $parentEntityFilter)
  {
    $this->parentEntityFilter = $parentEntityFilter;
  }
  /**
   * @return ParentEntityFilter
   */
  public function getParentEntityFilter()
  {
    return $this->parentEntityFilter;
  }
  public function setPartnerId($partnerId)
  {
    $this->partnerId = $partnerId;
  }
  public function getPartnerId()
  {
    return $this->partnerId;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateSdfDownloadTaskRequest::class, 'Google_Service_DisplayVideo_CreateSdfDownloadTaskRequest');
