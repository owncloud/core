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

namespace Google\Service\CloudIdentity;

class GoogleAppsCloudidentityDevicesV1AndroidAttributes extends \Google\Model
{
  public $enabledUnknownSources;
  public $ownerProfileAccount;
  public $ownershipPrivilege;
  public $supportsWorkProfile;

  public function setEnabledUnknownSources($enabledUnknownSources)
  {
    $this->enabledUnknownSources = $enabledUnknownSources;
  }
  public function getEnabledUnknownSources()
  {
    return $this->enabledUnknownSources;
  }
  public function setOwnerProfileAccount($ownerProfileAccount)
  {
    $this->ownerProfileAccount = $ownerProfileAccount;
  }
  public function getOwnerProfileAccount()
  {
    return $this->ownerProfileAccount;
  }
  public function setOwnershipPrivilege($ownershipPrivilege)
  {
    $this->ownershipPrivilege = $ownershipPrivilege;
  }
  public function getOwnershipPrivilege()
  {
    return $this->ownershipPrivilege;
  }
  public function setSupportsWorkProfile($supportsWorkProfile)
  {
    $this->supportsWorkProfile = $supportsWorkProfile;
  }
  public function getSupportsWorkProfile()
  {
    return $this->supportsWorkProfile;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCloudidentityDevicesV1AndroidAttributes::class, 'Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1AndroidAttributes');
