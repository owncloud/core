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

namespace Google\Service\CloudAsset;

class GoogleIdentityAccesscontextmanagerV1DevicePolicy extends \Google\Collection
{
  protected $collection_key = 'osConstraints';
  /**
   * @var string[]
   */
  public $allowedDeviceManagementLevels;
  /**
   * @var string[]
   */
  public $allowedEncryptionStatuses;
  protected $osConstraintsType = GoogleIdentityAccesscontextmanagerV1OsConstraint::class;
  protected $osConstraintsDataType = 'array';
  /**
   * @var bool
   */
  public $requireAdminApproval;
  /**
   * @var bool
   */
  public $requireCorpOwned;
  /**
   * @var bool
   */
  public $requireScreenlock;

  /**
   * @param string[]
   */
  public function setAllowedDeviceManagementLevels($allowedDeviceManagementLevels)
  {
    $this->allowedDeviceManagementLevels = $allowedDeviceManagementLevels;
  }
  /**
   * @return string[]
   */
  public function getAllowedDeviceManagementLevels()
  {
    return $this->allowedDeviceManagementLevels;
  }
  /**
   * @param string[]
   */
  public function setAllowedEncryptionStatuses($allowedEncryptionStatuses)
  {
    $this->allowedEncryptionStatuses = $allowedEncryptionStatuses;
  }
  /**
   * @return string[]
   */
  public function getAllowedEncryptionStatuses()
  {
    return $this->allowedEncryptionStatuses;
  }
  /**
   * @param GoogleIdentityAccesscontextmanagerV1OsConstraint[]
   */
  public function setOsConstraints($osConstraints)
  {
    $this->osConstraints = $osConstraints;
  }
  /**
   * @return GoogleIdentityAccesscontextmanagerV1OsConstraint[]
   */
  public function getOsConstraints()
  {
    return $this->osConstraints;
  }
  /**
   * @param bool
   */
  public function setRequireAdminApproval($requireAdminApproval)
  {
    $this->requireAdminApproval = $requireAdminApproval;
  }
  /**
   * @return bool
   */
  public function getRequireAdminApproval()
  {
    return $this->requireAdminApproval;
  }
  /**
   * @param bool
   */
  public function setRequireCorpOwned($requireCorpOwned)
  {
    $this->requireCorpOwned = $requireCorpOwned;
  }
  /**
   * @return bool
   */
  public function getRequireCorpOwned()
  {
    return $this->requireCorpOwned;
  }
  /**
   * @param bool
   */
  public function setRequireScreenlock($requireScreenlock)
  {
    $this->requireScreenlock = $requireScreenlock;
  }
  /**
   * @return bool
   */
  public function getRequireScreenlock()
  {
    return $this->requireScreenlock;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleIdentityAccesscontextmanagerV1DevicePolicy::class, 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1DevicePolicy');
