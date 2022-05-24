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

class AdvertiserAdServerConfig extends \Google\Model
{
  protected $cmHybridConfigType = CmHybridConfig::class;
  protected $cmHybridConfigDataType = '';
  protected $thirdPartyOnlyConfigType = ThirdPartyOnlyConfig::class;
  protected $thirdPartyOnlyConfigDataType = '';

  /**
   * @param CmHybridConfig
   */
  public function setCmHybridConfig(CmHybridConfig $cmHybridConfig)
  {
    $this->cmHybridConfig = $cmHybridConfig;
  }
  /**
   * @return CmHybridConfig
   */
  public function getCmHybridConfig()
  {
    return $this->cmHybridConfig;
  }
  /**
   * @param ThirdPartyOnlyConfig
   */
  public function setThirdPartyOnlyConfig(ThirdPartyOnlyConfig $thirdPartyOnlyConfig)
  {
    $this->thirdPartyOnlyConfig = $thirdPartyOnlyConfig;
  }
  /**
   * @return ThirdPartyOnlyConfig
   */
  public function getThirdPartyOnlyConfig()
  {
    return $this->thirdPartyOnlyConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvertiserAdServerConfig::class, 'Google_Service_DisplayVideo_AdvertiserAdServerConfig');
