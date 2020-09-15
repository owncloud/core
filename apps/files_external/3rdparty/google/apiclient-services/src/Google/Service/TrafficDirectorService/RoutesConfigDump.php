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

class Google_Service_TrafficDirectorService_RoutesConfigDump extends Google_Collection
{
  protected $collection_key = 'staticRouteConfigs';
  protected $dynamicRouteConfigsType = 'Google_Service_TrafficDirectorService_DynamicRouteConfig';
  protected $dynamicRouteConfigsDataType = 'array';
  protected $staticRouteConfigsType = 'Google_Service_TrafficDirectorService_StaticRouteConfig';
  protected $staticRouteConfigsDataType = 'array';

  /**
   * @param Google_Service_TrafficDirectorService_DynamicRouteConfig
   */
  public function setDynamicRouteConfigs($dynamicRouteConfigs)
  {
    $this->dynamicRouteConfigs = $dynamicRouteConfigs;
  }
  /**
   * @return Google_Service_TrafficDirectorService_DynamicRouteConfig
   */
  public function getDynamicRouteConfigs()
  {
    return $this->dynamicRouteConfigs;
  }
  /**
   * @param Google_Service_TrafficDirectorService_StaticRouteConfig
   */
  public function setStaticRouteConfigs($staticRouteConfigs)
  {
    $this->staticRouteConfigs = $staticRouteConfigs;
  }
  /**
   * @return Google_Service_TrafficDirectorService_StaticRouteConfig
   */
  public function getStaticRouteConfigs()
  {
    return $this->staticRouteConfigs;
  }
}
