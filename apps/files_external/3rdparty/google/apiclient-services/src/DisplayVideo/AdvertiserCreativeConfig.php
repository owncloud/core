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
  /**
   * @var bool
   */
  public $dynamicCreativeEnabled;
  /**
   * @var string
   */
  public $iasClientId;
  /**
   * @var bool
   */
  public $obaComplianceDisabled;
  /**
   * @var bool
   */
  public $videoCreativeDataSharingAuthorized;

  /**
   * @param bool
   */
  public function setDynamicCreativeEnabled($dynamicCreativeEnabled)
  {
    $this->dynamicCreativeEnabled = $dynamicCreativeEnabled;
  }
  /**
   * @return bool
   */
  public function getDynamicCreativeEnabled()
  {
    return $this->dynamicCreativeEnabled;
  }
  /**
   * @param string
   */
  public function setIasClientId($iasClientId)
  {
    $this->iasClientId = $iasClientId;
  }
  /**
   * @return string
   */
  public function getIasClientId()
  {
    return $this->iasClientId;
  }
  /**
   * @param bool
   */
  public function setObaComplianceDisabled($obaComplianceDisabled)
  {
    $this->obaComplianceDisabled = $obaComplianceDisabled;
  }
  /**
   * @return bool
   */
  public function getObaComplianceDisabled()
  {
    return $this->obaComplianceDisabled;
  }
  /**
   * @param bool
   */
  public function setVideoCreativeDataSharingAuthorized($videoCreativeDataSharingAuthorized)
  {
    $this->videoCreativeDataSharingAuthorized = $videoCreativeDataSharingAuthorized;
  }
  /**
   * @return bool
   */
  public function getVideoCreativeDataSharingAuthorized()
  {
    return $this->videoCreativeDataSharingAuthorized;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvertiserCreativeConfig::class, 'Google_Service_DisplayVideo_AdvertiserCreativeConfig');
