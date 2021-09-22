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

namespace Google\Service\DisplayVideo;

class AdvertiserCreativeConfig extends \Google\Model
{
  public $dynamicCreativeEnabled;
  public $iasClientId;
  public $obaComplianceDisabled;
  public $videoCreativeDataSharingAuthorized;

  public function setDynamicCreativeEnabled($dynamicCreativeEnabled)
  {
    $this->dynamicCreativeEnabled = $dynamicCreativeEnabled;
  }
  public function getDynamicCreativeEnabled()
  {
    return $this->dynamicCreativeEnabled;
  }
  public function setIasClientId($iasClientId)
  {
    $this->iasClientId = $iasClientId;
  }
  public function getIasClientId()
  {
    return $this->iasClientId;
  }
  public function setObaComplianceDisabled($obaComplianceDisabled)
  {
    $this->obaComplianceDisabled = $obaComplianceDisabled;
  }
  public function getObaComplianceDisabled()
  {
    return $this->obaComplianceDisabled;
  }
  public function setVideoCreativeDataSharingAuthorized($videoCreativeDataSharingAuthorized)
  {
    $this->videoCreativeDataSharingAuthorized = $videoCreativeDataSharingAuthorized;
  }
  public function getVideoCreativeDataSharingAuthorized()
  {
    return $this->videoCreativeDataSharingAuthorized;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvertiserCreativeConfig::class, 'Google_Service_DisplayVideo_AdvertiserCreativeConfig');
