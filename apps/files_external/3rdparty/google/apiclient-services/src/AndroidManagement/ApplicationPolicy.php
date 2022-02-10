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

namespace Google\Service\AndroidManagement;

class ApplicationPolicy extends \Google\Collection
{
  protected $collection_key = 'permissionGrants';
  /**
   * @var string[]
   */
  public $accessibleTrackIds;
  /**
   * @var string
   */
  public $autoUpdateMode;
  /**
   * @var string
   */
  public $connectedWorkAndPersonalApp;
  /**
   * @var string
   */
  public $defaultPermissionPolicy;
  /**
   * @var string[]
   */
  public $delegatedScopes;
  /**
   * @var bool
   */
  public $disabled;
  protected $extensionConfigType = ExtensionConfig::class;
  protected $extensionConfigDataType = '';
  /**
   * @var string
   */
  public $installType;
  /**
   * @var bool
   */
  public $lockTaskAllowed;
  /**
   * @var array[]
   */
  public $managedConfiguration;
  protected $managedConfigurationTemplateType = ManagedConfigurationTemplate::class;
  protected $managedConfigurationTemplateDataType = '';
  /**
   * @var int
   */
  public $minimumVersionCode;
  /**
   * @var string
   */
  public $packageName;
  protected $permissionGrantsType = PermissionGrant::class;
  protected $permissionGrantsDataType = 'array';

  /**
   * @param string[]
   */
  public function setAccessibleTrackIds($accessibleTrackIds)
  {
    $this->accessibleTrackIds = $accessibleTrackIds;
  }
  /**
   * @return string[]
   */
  public function getAccessibleTrackIds()
  {
    return $this->accessibleTrackIds;
  }
  /**
   * @param string
   */
  public function setAutoUpdateMode($autoUpdateMode)
  {
    $this->autoUpdateMode = $autoUpdateMode;
  }
  /**
   * @return string
   */
  public function getAutoUpdateMode()
  {
    return $this->autoUpdateMode;
  }
  /**
   * @param string
   */
  public function setConnectedWorkAndPersonalApp($connectedWorkAndPersonalApp)
  {
    $this->connectedWorkAndPersonalApp = $connectedWorkAndPersonalApp;
  }
  /**
   * @return string
   */
  public function getConnectedWorkAndPersonalApp()
  {
    return $this->connectedWorkAndPersonalApp;
  }
  /**
   * @param string
   */
  public function setDefaultPermissionPolicy($defaultPermissionPolicy)
  {
    $this->defaultPermissionPolicy = $defaultPermissionPolicy;
  }
  /**
   * @return string
   */
  public function getDefaultPermissionPolicy()
  {
    return $this->defaultPermissionPolicy;
  }
  /**
   * @param string[]
   */
  public function setDelegatedScopes($delegatedScopes)
  {
    $this->delegatedScopes = $delegatedScopes;
  }
  /**
   * @return string[]
   */
  public function getDelegatedScopes()
  {
    return $this->delegatedScopes;
  }
  /**
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
  public function getDisabled()
  {
    return $this->disabled;
  }
  /**
   * @param ExtensionConfig
   */
  public function setExtensionConfig(ExtensionConfig $extensionConfig)
  {
    $this->extensionConfig = $extensionConfig;
  }
  /**
   * @return ExtensionConfig
   */
  public function getExtensionConfig()
  {
    return $this->extensionConfig;
  }
  /**
   * @param string
   */
  public function setInstallType($installType)
  {
    $this->installType = $installType;
  }
  /**
   * @return string
   */
  public function getInstallType()
  {
    return $this->installType;
  }
  /**
   * @param bool
   */
  public function setLockTaskAllowed($lockTaskAllowed)
  {
    $this->lockTaskAllowed = $lockTaskAllowed;
  }
  /**
   * @return bool
   */
  public function getLockTaskAllowed()
  {
    return $this->lockTaskAllowed;
  }
  /**
   * @param array[]
   */
  public function setManagedConfiguration($managedConfiguration)
  {
    $this->managedConfiguration = $managedConfiguration;
  }
  /**
   * @return array[]
   */
  public function getManagedConfiguration()
  {
    return $this->managedConfiguration;
  }
  /**
   * @param ManagedConfigurationTemplate
   */
  public function setManagedConfigurationTemplate(ManagedConfigurationTemplate $managedConfigurationTemplate)
  {
    $this->managedConfigurationTemplate = $managedConfigurationTemplate;
  }
  /**
   * @return ManagedConfigurationTemplate
   */
  public function getManagedConfigurationTemplate()
  {
    return $this->managedConfigurationTemplate;
  }
  /**
   * @param int
   */
  public function setMinimumVersionCode($minimumVersionCode)
  {
    $this->minimumVersionCode = $minimumVersionCode;
  }
  /**
   * @return int
   */
  public function getMinimumVersionCode()
  {
    return $this->minimumVersionCode;
  }
  /**
   * @param string
   */
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  /**
   * @return string
   */
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param PermissionGrant[]
   */
  public function setPermissionGrants($permissionGrants)
  {
    $this->permissionGrants = $permissionGrants;
  }
  /**
   * @return PermissionGrant[]
   */
  public function getPermissionGrants()
  {
    return $this->permissionGrants;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApplicationPolicy::class, 'Google_Service_AndroidManagement_ApplicationPolicy');
