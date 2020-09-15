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

class Google_Service_TrafficDirectorService_PerXdsConfig extends Google_Model
{
  protected $clusterConfigType = 'Google_Service_TrafficDirectorService_ClustersConfigDump';
  protected $clusterConfigDataType = '';
  protected $listenerConfigType = 'Google_Service_TrafficDirectorService_ListenersConfigDump';
  protected $listenerConfigDataType = '';
  protected $routeConfigType = 'Google_Service_TrafficDirectorService_RoutesConfigDump';
  protected $routeConfigDataType = '';
  protected $scopedRouteConfigType = 'Google_Service_TrafficDirectorService_ScopedRoutesConfigDump';
  protected $scopedRouteConfigDataType = '';
  public $status;

  /**
   * @param Google_Service_TrafficDirectorService_ClustersConfigDump
   */
  public function setClusterConfig(Google_Service_TrafficDirectorService_ClustersConfigDump $clusterConfig)
  {
    $this->clusterConfig = $clusterConfig;
  }
  /**
   * @return Google_Service_TrafficDirectorService_ClustersConfigDump
   */
  public function getClusterConfig()
  {
    return $this->clusterConfig;
  }
  /**
   * @param Google_Service_TrafficDirectorService_ListenersConfigDump
   */
  public function setListenerConfig(Google_Service_TrafficDirectorService_ListenersConfigDump $listenerConfig)
  {
    $this->listenerConfig = $listenerConfig;
  }
  /**
   * @return Google_Service_TrafficDirectorService_ListenersConfigDump
   */
  public function getListenerConfig()
  {
    return $this->listenerConfig;
  }
  /**
   * @param Google_Service_TrafficDirectorService_RoutesConfigDump
   */
  public function setRouteConfig(Google_Service_TrafficDirectorService_RoutesConfigDump $routeConfig)
  {
    $this->routeConfig = $routeConfig;
  }
  /**
   * @return Google_Service_TrafficDirectorService_RoutesConfigDump
   */
  public function getRouteConfig()
  {
    return $this->routeConfig;
  }
  /**
   * @param Google_Service_TrafficDirectorService_ScopedRoutesConfigDump
   */
  public function setScopedRouteConfig(Google_Service_TrafficDirectorService_ScopedRoutesConfigDump $scopedRouteConfig)
  {
    $this->scopedRouteConfig = $scopedRouteConfig;
  }
  /**
   * @return Google_Service_TrafficDirectorService_ScopedRoutesConfigDump
   */
  public function getScopedRouteConfig()
  {
    return $this->scopedRouteConfig;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}
