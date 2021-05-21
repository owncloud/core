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

class Google_Service_AndroidEnterprise_AdministratorWebTokenSpec extends Google_Collection
{
  protected $collection_key = 'permission';
  protected $managedConfigurationsType = 'Google_Service_AndroidEnterprise_AdministratorWebTokenSpecManagedConfigurations';
  protected $managedConfigurationsDataType = '';
  public $parent;
  public $permission;
  protected $playSearchType = 'Google_Service_AndroidEnterprise_AdministratorWebTokenSpecPlaySearch';
  protected $playSearchDataType = '';
  protected $privateAppsType = 'Google_Service_AndroidEnterprise_AdministratorWebTokenSpecPrivateApps';
  protected $privateAppsDataType = '';
  protected $storeBuilderType = 'Google_Service_AndroidEnterprise_AdministratorWebTokenSpecStoreBuilder';
  protected $storeBuilderDataType = '';
  protected $webAppsType = 'Google_Service_AndroidEnterprise_AdministratorWebTokenSpecWebApps';
  protected $webAppsDataType = '';
  protected $zeroTouchType = 'Google_Service_AndroidEnterprise_AdministratorWebTokenSpecZeroTouch';
  protected $zeroTouchDataType = '';

  /**
   * @param Google_Service_AndroidEnterprise_AdministratorWebTokenSpecManagedConfigurations
   */
  public function setManagedConfigurations(Google_Service_AndroidEnterprise_AdministratorWebTokenSpecManagedConfigurations $managedConfigurations)
  {
    $this->managedConfigurations = $managedConfigurations;
  }
  /**
   * @return Google_Service_AndroidEnterprise_AdministratorWebTokenSpecManagedConfigurations
   */
  public function getManagedConfigurations()
  {
    return $this->managedConfigurations;
  }
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  public function getParent()
  {
    return $this->parent;
  }
  public function setPermission($permission)
  {
    $this->permission = $permission;
  }
  public function getPermission()
  {
    return $this->permission;
  }
  /**
   * @param Google_Service_AndroidEnterprise_AdministratorWebTokenSpecPlaySearch
   */
  public function setPlaySearch(Google_Service_AndroidEnterprise_AdministratorWebTokenSpecPlaySearch $playSearch)
  {
    $this->playSearch = $playSearch;
  }
  /**
   * @return Google_Service_AndroidEnterprise_AdministratorWebTokenSpecPlaySearch
   */
  public function getPlaySearch()
  {
    return $this->playSearch;
  }
  /**
   * @param Google_Service_AndroidEnterprise_AdministratorWebTokenSpecPrivateApps
   */
  public function setPrivateApps(Google_Service_AndroidEnterprise_AdministratorWebTokenSpecPrivateApps $privateApps)
  {
    $this->privateApps = $privateApps;
  }
  /**
   * @return Google_Service_AndroidEnterprise_AdministratorWebTokenSpecPrivateApps
   */
  public function getPrivateApps()
  {
    return $this->privateApps;
  }
  /**
   * @param Google_Service_AndroidEnterprise_AdministratorWebTokenSpecStoreBuilder
   */
  public function setStoreBuilder(Google_Service_AndroidEnterprise_AdministratorWebTokenSpecStoreBuilder $storeBuilder)
  {
    $this->storeBuilder = $storeBuilder;
  }
  /**
   * @return Google_Service_AndroidEnterprise_AdministratorWebTokenSpecStoreBuilder
   */
  public function getStoreBuilder()
  {
    return $this->storeBuilder;
  }
  /**
   * @param Google_Service_AndroidEnterprise_AdministratorWebTokenSpecWebApps
   */
  public function setWebApps(Google_Service_AndroidEnterprise_AdministratorWebTokenSpecWebApps $webApps)
  {
    $this->webApps = $webApps;
  }
  /**
   * @return Google_Service_AndroidEnterprise_AdministratorWebTokenSpecWebApps
   */
  public function getWebApps()
  {
    return $this->webApps;
  }
  /**
   * @param Google_Service_AndroidEnterprise_AdministratorWebTokenSpecZeroTouch
   */
  public function setZeroTouch(Google_Service_AndroidEnterprise_AdministratorWebTokenSpecZeroTouch $zeroTouch)
  {
    $this->zeroTouch = $zeroTouch;
  }
  /**
   * @return Google_Service_AndroidEnterprise_AdministratorWebTokenSpecZeroTouch
   */
  public function getZeroTouch()
  {
    return $this->zeroTouch;
  }
}
