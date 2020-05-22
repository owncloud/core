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

class Google_Service_CloudIAP_AccessSettings extends Google_Model
{
  protected $corsSettingsType = 'Google_Service_CloudIAP_CorsSettings';
  protected $corsSettingsDataType = '';
  protected $gcipSettingsType = 'Google_Service_CloudIAP_GcipSettings';
  protected $gcipSettingsDataType = '';
  protected $oauthSettingsType = 'Google_Service_CloudIAP_OAuthSettings';
  protected $oauthSettingsDataType = '';
  protected $policyDelegationSettingsType = 'Google_Service_CloudIAP_PolicyDelegationSettings';
  protected $policyDelegationSettingsDataType = '';

  /**
   * @param Google_Service_CloudIAP_CorsSettings
   */
  public function setCorsSettings(Google_Service_CloudIAP_CorsSettings $corsSettings)
  {
    $this->corsSettings = $corsSettings;
  }
  /**
   * @return Google_Service_CloudIAP_CorsSettings
   */
  public function getCorsSettings()
  {
    return $this->corsSettings;
  }
  /**
   * @param Google_Service_CloudIAP_GcipSettings
   */
  public function setGcipSettings(Google_Service_CloudIAP_GcipSettings $gcipSettings)
  {
    $this->gcipSettings = $gcipSettings;
  }
  /**
   * @return Google_Service_CloudIAP_GcipSettings
   */
  public function getGcipSettings()
  {
    return $this->gcipSettings;
  }
  /**
   * @param Google_Service_CloudIAP_OAuthSettings
   */
  public function setOauthSettings(Google_Service_CloudIAP_OAuthSettings $oauthSettings)
  {
    $this->oauthSettings = $oauthSettings;
  }
  /**
   * @return Google_Service_CloudIAP_OAuthSettings
   */
  public function getOauthSettings()
  {
    return $this->oauthSettings;
  }
  /**
   * @param Google_Service_CloudIAP_PolicyDelegationSettings
   */
  public function setPolicyDelegationSettings(Google_Service_CloudIAP_PolicyDelegationSettings $policyDelegationSettings)
  {
    $this->policyDelegationSettings = $policyDelegationSettings;
  }
  /**
   * @return Google_Service_CloudIAP_PolicyDelegationSettings
   */
  public function getPolicyDelegationSettings()
  {
    return $this->policyDelegationSettings;
  }
}
