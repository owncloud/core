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

class PosStore extends \Google\Model
{
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $storeAddress;
  /**
   * @var string
   */
  public $storeCode;

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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PosStore::class, 'Google_Service_ShoppingContent_PosStore');
