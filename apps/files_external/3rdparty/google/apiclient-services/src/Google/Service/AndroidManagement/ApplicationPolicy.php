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

class Google_Service_AndroidManagement_ApplicationPolicy extends Google_Collection
{
  protected $collection_key = 'permissionGrants';
  public $accessibleTrackIds;
  public $defaultPermissionPolicy;
  public $delegatedScopes;
  public $disabled;
  public $installType;
  public $lockTaskAllowed;
  public $managedConfiguration;
  protected $managedConfigurationTemplateType = 'Google_Service_AndroidManagement_ManagedConfigurationTemplate';
  protected $managedConfigurationTemplateDataType = '';
  public $minimumVersionCode;
  public $packageName;
  protected $permissionGrantsType = 'Google_Service_AndroidManagement_PermissionGrant';
  protected $permissionGrantsDataType = 'array';

  public function setAccessibleTrackIds($accessibleTrackIds)
  {
    $this->accessibleTrackIds = $accessibleTrackIds;
  }
  public function getAccessibleTrackIds()
  {
    return $this->accessibleTrackIds;
  }
  public function setDefaultPermissionPolicy($defaultPermissionPolicy)
  {
    $this->defaultPermissionPolicy = $defaultPermissionPolicy;
  }
  public function getDefaultPermissionPolicy()
  {
    return $this->defaultPermissionPolicy;
  }
  public function setDelegatedScopes($delegatedScopes)
  {
    $this->delegatedScopes = $delegatedScopes;
  }
  public function getDelegatedScopes()
  {
    return $this->delegatedScopes;
  }
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  public function getDisabled()
  {
    return $this->disabled;
  }
  public function setInstallType($installType)
  {
    $this->installType = $installType;
  }
  public function getInstallType()
  {
    return $this->installType;
  }
  public function setLockTaskAllowed($lockTaskAllowed)
  {
    $this->lockTaskAllowed = $lockTaskAllowed;
  }
  public function getLockTaskAllowed()
  {
    return $this->lockTaskAllowed;
  }
  public function setManagedConfiguration($managedConfiguration)
  {
    $this->managedConfiguration = $managedConfiguration;
  }
  public function getManagedConfiguration()
  {
    return $this->managedConfiguration;
  }
  /**
   * @param Google_Service_AndroidManagement_ManagedConfigurationTemplate
   */
  public function setManagedConfigurationTemplate(Google_Service_AndroidManagement_ManagedConfigurationTemplate $managedConfigurationTemplate)
  {
    $this->managedConfigurationTemplate = $managedConfigurationTemplate;
  }
  /**
   * @return Google_Service_AndroidManagement_ManagedConfigurationTemplate
   */
  public function getManagedConfigurationTemplate()
  {
    return $this->managedConfigurationTemplate;
  }
  public function setMinimumVersionCode($minimumVersionCode)
  {
    $this->minimumVersionCode = $minimumVersionCode;
  }
  public function getMinimumVersionCode()
  {
    return $this->minimumVersionCode;
  }
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param Google_Service_AndroidManagement_PermissionGrant
   */
  public function setPermissionGrants($permissionGrants)
  {
    $this->permissionGrants = $permissionGrants;
  }
  /**
   * @return Google_Service_AndroidManagement_PermissionGrant
   */
  public function getPermissionGrants()
  {
    return $this->permissionGrants;
  }
}
