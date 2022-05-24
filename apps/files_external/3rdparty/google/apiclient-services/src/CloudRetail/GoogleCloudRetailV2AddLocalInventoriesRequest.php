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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2AddLocalInventoriesRequest extends \Google\Collection
{
  protected $collection_key = 'localInventories';
  /**
   * @var string
   */
  public $addMask;
  /**
   * @var string
   */
  public $addTime;
  /**
   * @var bool
   */
  public $allowMissing;
  protected $localInventoriesType = GoogleCloudRetailV2LocalInventory::class;
  protected $localInventoriesDataType = 'array';

  /**
   * @param string
   */
  public function setAddMask($addMask)
  {
    $this->addMask = $addMask;
  }
  /**
   * @return string
   */
  public function getAddMask()
  {
    return $this->addMask;
  }
  /**
   * @param string
   */
  public function setAddTime($addTime)
  {
    $this->addTime = $addTime;
  }
  /**
   * @return string
   */
  public function getAddTime()
  {
    return $this->addTime;
  }
  /**
   * @param bool
   */
  public function setAllowMissing($allowMissing)
  {
    $this->allowMissing = $allowMissing;
  }
  /**
   * @return bool
   */
  public function getAllowMissing()
  {
    return $this->allowMissing;
  }
  /**
   * @param GoogleCloudRetailV2LocalInventory[]
   */
  public function setLocalInventories($localInventories)
  {
    $this->localInventories = $localInventories;
  }
  /**
   * @return GoogleCloudRetailV2LocalInventory[]
   */
  public function getLocalInventories()
  {
    return $this->localInventories;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2AddLocalInventoriesRequest::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2AddLocalInventoriesRequest');
