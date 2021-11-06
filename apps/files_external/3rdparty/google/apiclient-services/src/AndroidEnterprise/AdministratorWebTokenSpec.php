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

class AdministratorWebTokenSpec extends \Google\Collection
{
  protected $collection_key = 'permission';
  protected $managedConfigurationsType = AdministratorWebTokenSpecManagedConfigurations::class;
  protected $managedConfigurationsDataType = '';
  public $parent;
  public $permission;
  protected $playSearchType = AdministratorWebTokenSpecPlaySearch::class;
  protected $playSearchDataType = '';
  protected $privateAppsType = AdministratorWebTokenSpecPrivateApps::class;
  protected $privateAppsDataType = '';
  protected $storeBuilderType = AdministratorWebTokenSpecStoreBuilder::class;
  protected $storeBuilderDataType = '';
  protected $webAppsType = AdministratorWebTokenSpecWebApps::class;
  protected $webAppsDataType = '';
  protected $zeroTouchType = AdministratorWebTokenSpecZeroTouch::class;
  protected $zeroTouchDataType = '';

  /**
   * @param AdministratorWebTokenSpecManagedConfigurations
   */
  public function setManagedConfigurations(AdministratorWebTokenSpecManagedConfigurations $managedConfigurations)
  {
    $this->managedConfigurations = $managedConfigurations;
  }
  /**
   * @return AdministratorWebTokenSpecManagedConfigurations
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
   * @param AdministratorWebTokenSpecPlaySearch
   */
  public function setPlaySearch(AdministratorWebTokenSpecPlaySearch $playSearch)
  {
    $this->playSearch = $playSearch;
  }
  /**
   * @return AdministratorWebTokenSpecPlaySearch
   */
  public function getPlaySearch()
  {
    return $this->playSearch;
  }
  /**
   * @param AdministratorWebTokenSpecPrivateApps
   */
  public function setPrivateApps(AdministratorWebTokenSpecPrivateApps $privateApps)
  {
    $this->privateApps = $privateApps;
  }
  /**
   * @return AdministratorWebTokenSpecPrivateApps
   */
  public function getPrivateApps()
  {
    return $this->privateApps;
  }
  /**
   * @param AdministratorWebTokenSpecStoreBuilder
   */
  public function setStoreBuilder(AdministratorWebTokenSpecStoreBuilder $storeBuilder)
  {
    $this->storeBuilder = $storeBuilder;
  }
  /**
   * @return AdministratorWebTokenSpecStoreBuilder
   */
  public function getStoreBuilder()
  {
    return $this->storeBuilder;
  }
  /**
   * @param AdministratorWebTokenSpecWebApps
   */
  public function setWebApps(AdministratorWebTokenSpecWebApps $webApps)
  {
    $this->webApps = $webApps;
  }
  /**
   * @return AdministratorWebTokenSpecWebApps
   */
  public function getWebApps()
  {
    return $this->webApps;
  }
  /**
   * @param AdministratorWebTokenSpecZeroTouch
   */
  public function setZeroTouch(AdministratorWebTokenSpecZeroTouch $zeroTouch)
  {
    $this->zeroTouch = $zeroTouch;
  }
  /**
   * @return AdministratorWebTokenSpecZeroTouch
   */
  public function getZeroTouch()
  {
    return $this->zeroTouch;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdministratorWebTokenSpec::class, 'Google_Service_AndroidEnterprise_AdministratorWebTokenSpec');
