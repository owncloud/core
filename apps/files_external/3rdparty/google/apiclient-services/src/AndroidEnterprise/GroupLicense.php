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

class GroupLicense extends \Google\Model
{
  /**
   * @var string
   */
  public $acquisitionKind;
  /**
   * @var string
   */
  public $approval;
  /**
   * @var int
   */
  public $numProvisioned;
  /**
   * @var int
   */
  public $numPurchased;
  /**
   * @var string
   */
  public $permissions;
  /**
   * @var string
   */
  public $productId;

  /**
   * @param string
   */
  public function setAcquisitionKind($acquisitionKind)
  {
    $this->acquisitionKind = $acquisitionKind;
  }
  /**
   * @return string
   */
  public function getAcquisitionKind()
  {
    return $this->acquisitionKind;
  }
  /**
   * @param string
   */
  public function setApproval($approval)
  {
    $this->approval = $approval;
  }
  /**
   * @return string
   */
  public function getApproval()
  {
    return $this->approval;
  }
  /**
   * @param int
   */
  public function setNumProvisioned($numProvisioned)
  {
    $this->numProvisioned = $numProvisioned;
  }
  /**
   * @return int
   */
  public function getNumProvisioned()
  {
    return $this->numProvisioned;
  }
  /**
   * @param int
   */
  public function setNumPurchased($numPurchased)
  {
    $this->numPurchased = $numPurchased;
  }
  /**
   * @return int
   */
  public function getNumPurchased()
  {
    return $this->numPurchased;
  }
  /**
   * @param string
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return string
   */
  public function getPermissions()
  {
    return $this->permissions;
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
class_alias(GroupLicense::class, 'Google_Service_AndroidEnterprise_GroupLicense');
