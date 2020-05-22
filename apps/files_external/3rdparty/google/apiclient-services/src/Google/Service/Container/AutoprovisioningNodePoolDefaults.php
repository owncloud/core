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

class Google_Service_Container_AutoprovisioningNodePoolDefaults extends Google_Collection
{
  protected $collection_key = 'oauthScopes';
  protected $managementType = 'Google_Service_Container_NodeManagement';
  protected $managementDataType = '';
  public $oauthScopes;
  public $serviceAccount;
  protected $upgradeSettingsType = 'Google_Service_Container_UpgradeSettings';
  protected $upgradeSettingsDataType = '';

  /**
   * @param Google_Service_Container_NodeManagement
   */
  public function setManagement(Google_Service_Container_NodeManagement $management)
  {
    $this->management = $management;
  }
  /**
   * @return Google_Service_Container_NodeManagement
   */
  public function getManagement()
  {
    return $this->management;
  }
  public function setOauthScopes($oauthScopes)
  {
    $this->oauthScopes = $oauthScopes;
  }
  public function getOauthScopes()
  {
    return $this->oauthScopes;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param Google_Service_Container_UpgradeSettings
   */
  public function setUpgradeSettings(Google_Service_Container_UpgradeSettings $upgradeSettings)
  {
    $this->upgradeSettings = $upgradeSettings;
  }
  /**
   * @return Google_Service_Container_UpgradeSettings
   */
  public function getUpgradeSettings()
  {
    return $this->upgradeSettings;
  }
}
