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

class Google_Service_Vision_PurgeProductsRequest extends Google_Model
{
  public $deleteOrphanProducts;
  public $force;
  protected $productSetPurgeConfigType = 'Google_Service_Vision_ProductSetPurgeConfig';
  protected $productSetPurgeConfigDataType = '';

  public function setDeleteOrphanProducts($deleteOrphanProducts)
  {
    $this->deleteOrphanProducts = $deleteOrphanProducts;
  }
  public function getDeleteOrphanProducts()
  {
    return $this->deleteOrphanProducts;
  }
  public function setForce($force)
  {
    $this->force = $force;
  }
  public function getForce()
  {
    return $this->force;
  }
  /**
   * @param Google_Service_Vision_ProductSetPurgeConfig
   */
  public function setProductSetPurgeConfig(Google_Service_Vision_ProductSetPurgeConfig $productSetPurgeConfig)
  {
    $this->productSetPurgeConfig = $productSetPurgeConfig;
  }
  /**
   * @return Google_Service_Vision_ProductSetPurgeConfig
   */
  public function getProductSetPurgeConfig()
  {
    return $this->productSetPurgeConfig;
  }
}
