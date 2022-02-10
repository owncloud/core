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

namespace Google\Service\ShoppingContent;

class PosStore extends \Google\Collection
{
  protected $collection_key = 'gcidCategory';
  /**
   * @var string[]
   */
  public $gcidCategory;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $phoneNumber;
  /**
   * @var string
   */
  public $placeId;
  /**
   * @var string
   */
  public $storeAddress;
  /**
   * @var string
   */
  public $storeCode;
  /**
   * @var string
   */
  public $storeName;
  /**
   * @var string
   */
  public $websiteUrl;

  /**
   * @param string[]
   */
  public function setGcidCategory($gcidCategory)
  {
    $this->gcidCategory = $gcidCategory;
  }
  /**
   * @return string[]
   */
  public function getGcidCategory()
  {
    return $this->gcidCategory;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  /**
   * @return string
   */
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  /**
   * @param string
   */
  public function setPlaceId($placeId)
  {
    $this->placeId = $placeId;
  }
  /**
   * @return string
   */
  public function getPlaceId()
  {
    return $this->placeId;
  }
  /**
   * @param string
   */
  public function setStoreAddress($storeAddress)
  {
    $this->storeAddress = $storeAddress;
  }
  /**
   * @return string
   */
  public function getStoreAddress()
  {
    return $this->storeAddress;
  }
  /**
   * @param string
   */
  public function setStoreCode($storeCode)
  {
    $this->storeCode = $storeCode;
  }
  /**
   * @return string
   */
  public function getStoreCode()
  {
    return $this->storeCode;
  }
  /**
   * @param string
   */
  public function setStoreName($storeName)
  {
    $this->storeName = $storeName;
  }
  /**
   * @return string
   */
  public function getStoreName()
  {
    return $this->storeName;
  }
  /**
   * @param string
   */
  public function setWebsiteUrl($websiteUrl)
  {
    $this->websiteUrl = $websiteUrl;
  }
  /**
   * @return string
   */
  public function getWebsiteUrl()
  {
    return $this->websiteUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PosStore::class, 'Google_Service_ShoppingContent_PosStore');
