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

class Google_Service_TrafficDirectorService_ClustersConfigDump extends Google_Collection
{
  protected $collection_key = 'staticClusters';
  protected $dynamicActiveClustersType = 'Google_Service_TrafficDirectorService_DynamicCluster';
  protected $dynamicActiveClustersDataType = 'array';
  protected $dynamicWarmingClustersType = 'Google_Service_TrafficDirectorService_DynamicCluster';
  protected $dynamicWarmingClustersDataType = 'array';
  protected $staticClustersType = 'Google_Service_TrafficDirectorService_StaticCluster';
  protected $staticClustersDataType = 'array';
  public $versionInfo;

  /**
   * @param Google_Service_TrafficDirectorService_DynamicCluster[]
   */
  public function setDynamicActiveClusters($dynamicActiveClusters)
  {
    $this->dynamicActiveClusters = $dynamicActiveClusters;
  }
  /**
   * @return Google_Service_TrafficDirectorService_DynamicCluster[]
   */
  public function getDynamicActiveClusters()
  {
    return $this->dynamicActiveClusters;
  }
  /**
   * @param Google_Service_TrafficDirectorService_DynamicCluster[]
   */
  public function setDynamicWarmingClusters($dynamicWarmingClusters)
  {
    $this->dynamicWarmingClusters = $dynamicWarmingClusters;
  }
  /**
   * @return Google_Service_TrafficDirectorService_DynamicCluster[]
   */
  public function getDynamicWarmingClusters()
  {
    return $this->dynamicWarmingClusters;
  }
  /**
   * @param Google_Service_TrafficDirectorService_StaticCluster[]
   */
  public function setStaticClusters($staticClusters)
  {
    $this->staticClusters = $staticClusters;
  }
  /**
   * @return Google_Service_TrafficDirectorService_StaticCluster[]
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
