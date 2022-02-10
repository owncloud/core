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

namespace Google\Service\AndroidEnterprise;

class ProductPermissions extends \Google\Collection
{
  protected $collection_key = 'permission';
  protected $permissionType = ProductPermission::class;
  protected $permissionDataType = 'array';
  /**
   * @var string
   */
  public $productId;

  /**
   * @param ProductPermission[]
   */
  public function setPermission($permission)
  {
    $this->permission = $permission;
  }
  /**
   * @return ProductPermission[]
   */
  public function getPermission()
  {
    return $this->permission;
  }
  /**
   * @param string
   */
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  /**
   * @return string
   */
  public function getProductId()
  {
    return $this->productId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductPermissions::class, 'Google_Service_AndroidEnterprise_ProductPermissions');
