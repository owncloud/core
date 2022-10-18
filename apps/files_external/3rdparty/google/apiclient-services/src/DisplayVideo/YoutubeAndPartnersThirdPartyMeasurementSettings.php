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

class YoutubeAndPartnersThirdPartyMeasurementSettings extends \Google\Collection
{
  protected $collection_key = 'viewabilityVendorConfigs';
  protected $brandLiftVendorConfigsType = ThirdPartyVendorConfig::class;
  protected $brandLiftVendorConfigsDataType = 'array';
  protected $brandSafetyVendorConfigsType = ThirdPartyVendorConfig::class;
  protected $brandSafetyVendorConfigsDataType = 'array';
  protected $reachVendorConfigsType = ThirdPartyVendorConfig::class;
  protected $reachVendorConfigsDataType = 'array';
  protected $viewabilityVendorConfigsType = ThirdPartyVendorConfig::class;
  protected $viewabilityVendorConfigsDataType = 'array';

  /**
   * @param ThirdPartyVendorConfig[]
   */
  public function setBrandLiftVendorConfigs($brandLiftVendorConfigs)
  {
    $this->brandLiftVendorConfigs = $brandLiftVendorConfigs;
  }
  /**
   * @return ThirdPartyVendorConfig[]
   */
  public function getBrandLiftVendorConfigs()
  {
    return $this->brandLiftVendorConfigs;
  }
  /**
   * @param ThirdPartyVendorConfig[]
   */
  public function setBrandSafetyVendorConfigs($brandSafetyVendorConfigs)
  {
    $this->brandSafetyVendorConfigs = $brandSafetyVendorConfigs;
  }
  /**
   * @return ThirdPartyVendorConfig[]
   */
  public function getBrandSafetyVendorConfigs()
  {
    return $this->brandSafetyVendorConfigs;
  }
  /**
   * @param ThirdPartyVendorConfig[]
   */
  public function setReachVendorConfigs($reachVendorConfigs)
  {
    $this->reachVendorConfigs = $reachVendorConfigs;
  }
  /**
   * @return ThirdPartyVendorConfig[]
   */
  public function getReachVendorConfigs()
  {
    return $this->reachVendorConfigs;
  }
  /**
   * @param ThirdPartyVendorConfig[]
   */
  public function setViewabilityVendorConfigs($viewabilityVendorConfigs)
  {
    $this->viewabilityVendorConfigs = $viewabilityVendorConfigs;
  }
  /**
   * @return ThirdPartyVendorConfig[]
   */
  public function getViewabilityVendorConfigs()
  {
    return $this->viewabilityVendorConfigs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YoutubeAndPartnersThirdPartyMeasurementSettings::class, 'Google_Service_DisplayVideo_YoutubeAndPartnersThirdPartyMeasurementSettings');
