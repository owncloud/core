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

class GoogleCloudRetailV2SetInventoryRequest extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowMissing;
  protected $inventoryType = GoogleCloudRetailV2Product::class;
  protected $inventoryDataType = '';
  /**
   * @var string
   */
  public $setMask;
  /**
   * @var string
   */
  public $setTime;

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
   * @param GoogleCloudRetailV2Product
   */
  public function setInventory(GoogleCloudRetailV2Product $inventory)
  {
    $this->inventory = $inventory;
  }
  /**
   * @return GoogleCloudRetailV2Product
   */
  public function getInventory()
  {
    return $this->inventory;
  }
  /**
   * @param string
   */
  public function setSetMask($setMask)
  {
    $this->setMask = $setMask;
  }
  /**
   * @return string
   */
  public function getSetMask()
  {
    return $this->setMask;
  }
  /**
   * @param string
   */
  public function setSetTime($setTime)
  {
    $this->setTime = $setTime;
  }
  /**
   * @return string
   */
  public function getSetTime()
  {
    return $this->setTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2SetInventoryRequest::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2SetInventoryRequest');
