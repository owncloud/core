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

class Google_Service_DisplayVideo_AdvertiserAdServerConfig extends Google_Model
{
  protected $cmHybridConfigType = 'Google_Service_DisplayVideo_CmHybridConfig';
  protected $cmHybridConfigDataType = '';
  protected $thirdPartyOnlyConfigType = 'Google_Service_DisplayVideo_ThirdPartyOnlyConfig';
  protected $thirdPartyOnlyConfigDataType = '';

  /**
   * @param Google_Service_DisplayVideo_CmHybridConfig
   */
  public function setCmHybridConfig(Google_Service_DisplayVideo_CmHybridConfig $cmHybridConfig)
  {
    $this->cmHybridConfig = $cmHybridConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_CmHybridConfig
   */
  public function getCmHybridConfig()
  {
    return $this->cmHybridConfig;
  }
  /**
   * @param Google_Service_DisplayVideo_ThirdPartyOnlyConfig
   */
  public function setThirdPartyOnlyConfig(Google_Service_DisplayVideo_ThirdPartyOnlyConfig $thirdPartyOnlyConfig)
  {
    $this->thirdPartyOnlyConfig = $thirdPartyOnlyConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_ThirdPartyOnlyConfig
   */
  public function getThirdPartyOnlyConfig()
  {
    return $this->thirdPartyOnlyConfig;
  }
}
