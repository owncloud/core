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

class ClustersConfigDump extends \Google\Collection
{
  protected $collection_key = 'staticClusters';
  protected $dynamicActiveClustersType = DynamicCluster::class;
  protected $dynamicActiveClustersDataType = 'array';
  protected $dynamicWarmingClustersType = DynamicCluster::class;
  protected $dynamicWarmingClustersDataType = 'array';
  protected $staticClustersType = StaticCluster::class;
  protected $staticClustersDataType = 'array';
  public $versionInfo;

  /**
   * @param DynamicCluster[]
   */
  public function setDynamicActiveClusters($dynamicActiveClusters)
  {
    $this->dynamicActiveClusters = $dynamicActiveClusters;
  }
  /**
   * @return DynamicCluster[]
   */
  public function getDynamicActiveClusters()
  {
    return $this->dynamicActiveClusters;
  }
  /**
   * @param DynamicCluster[]
   */
  public function setDynamicWarmingClusters($dynamicWarmingClusters)
  {
    $this->dynamicWarmingClusters = $dynamicWarmingClusters;
  }
  /**
   * @return DynamicCluster[]
   */
  public function getDynamicWarmingClusters()
  {
    return $this->dynamicWarmingClusters;
  }
  /**
   * @param StaticCluster[]
   */
  public function setStaticClusters($staticClusters)
  {
    $this->staticClusters = $staticClusters;
  }
  /**
   * @return StaticCluster[]
   */
  public function getStaticClusters()
  {
    return $this->staticClusters;
  }
  public function setVersionInfo($versionInfo)
  {
    $this->versionInfo = $versionInfo;
  }
  public function getVersionInfo()
  {
    return $this->versionInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClustersConfigDump::class, 'Google_Service_TrafficDirectorService_ClustersConfigDump');
