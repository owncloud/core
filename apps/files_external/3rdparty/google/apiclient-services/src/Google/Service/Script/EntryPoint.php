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

class Google_Service_Script_EntryPoint extends Google_Model
{
  protected $addOnType = 'Google_Service_Script_GoogleAppsScriptTypeAddOnEntryPoint';
  protected $addOnDataType = '';
  public $entryPointType;
  protected $executionApiType = 'Google_Service_Script_GoogleAppsScriptTypeExecutionApiEntryPoint';
  protected $executionApiDataType = '';
  protected $webAppType = 'Google_Service_Script_GoogleAppsScriptTypeWebAppEntryPoint';
  protected $webAppDataType = '';

  /**
   * @param Google_Service_Script_GoogleAppsScriptTypeAddOnEntryPoint
   */
  public function setAddOn(Google_Service_Script_GoogleAppsScriptTypeAddOnEntryPoint $addOn)
  {
    $this->addOn = $addOn;
  }
  /**
   * @return Google_Service_Script_GoogleAppsScriptTypeAddOnEntryPoint
   */
  public function getAddOn()
  {
    return $this->addOn;
  }
  public function setEntryPointType($entryPointType)
  {
    $this->entryPointType = $entryPointType;
  }
  public function getEntryPointType()
  {
    return $this->entryPointType;
  }
  /**
   * @param Google_Service_Script_GoogleAppsScriptTypeExecutionApiEntryPoint
   */
  public function setExecutionApi(Google_Service_Script_GoogleAppsScriptTypeExecutionApiEntryPoint $executionApi)
  {
    $this->executionApi = $executionApi;
  }
  /**
   * @return Google_Service_Script_GoogleAppsScriptTypeExecutionApiEntryPoint
   */
  public function getExecutionApi()
  {
    return $this->executionApi;
  }
  /**
   * @param Google_Service_Script_GoogleAppsScriptTypeWebAppEntryPoint
   */
  public function setWebApp(Google_Service_Script_GoogleAppsScriptTypeWebAppEntryPoint $webApp)
  {
    $this->webApp = $webApp;
  }
  /**
   * @return Google_Service_Script_GoogleAppsScriptTypeWebAppEntryPoint
   */
  public function getWebApp()
  {
    return $this->webApp;
  }
}
