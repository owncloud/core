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

namespace Google\Service\TrafficDirectorService;

class PerXdsConfig extends \Google\Model
{
  protected $clusterConfigType = ClustersConfigDump::class;
  protected $clusterConfigDataType = '';
  protected $listenerConfigType = ListenersConfigDump::class;
  protected $listenerConfigDataType = '';
  protected $routeConfigType = RoutesConfigDump::class;
  protected $routeConfigDataType = '';
  protected $scopedRouteConfigType = ScopedRoutesConfigDump::class;
  protected $scopedRouteConfigDataType = '';
  public $status;

  /**
   * @param ClustersConfigDump
   */
  public function setClusterConfig(ClustersConfigDump $clusterConfig)
  {
    $this->clusterConfig = $clusterConfig;
  }
  /**
   * @return ClustersConfigDump
   */
  public function getClusterConfig()
  {
    return $this->clusterConfig;
  }
  /**
   * @param ListenersConfigDump
   */
  public function setListenerConfig(ListenersConfigDump $listenerConfig)
  {
    $this->listenerConfig = $listenerConfig;
  }
  /**
   * @return ListenersConfigDump
   */
  public function getListenerConfig()
  {
    return $this->listenerConfig;
  }
  /**
   * @param RoutesConfigDump
   */
  public function setRouteConfig(RoutesConfigDump $routeConfig)
  {
    $this->routeConfig = $routeConfig;
  }
  /**
   * @return RoutesConfigDump
   */
  public function getRouteConfig()
  {
    return $this->routeConfig;
  }
  /**
   * @param ScopedRoutesConfigDump
   */
  public function setScopedRouteConfig(ScopedRoutesConfigDump $scopedRouteConfig)
  {
    $this->scopedRouteConfig = $scopedRouteConfig;
  }
  /**
   * @return ScopedRoutesConfigDump
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PerXdsConfig::class, 'Google_Service_TrafficDirectorService_PerXdsConfig');
