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

class Google_Service_Dataproc_WorkflowTemplatePlacement extends Google_Model
{
  protected $clusterSelectorType = 'Google_Service_Dataproc_ClusterSelector';
  protected $clusterSelectorDataType = '';
  protected $managedClusterType = 'Google_Service_Dataproc_ManagedCluster';
  protected $managedClusterDataType = '';

  /**
   * @param Google_Service_Dataproc_ClusterSelector
   */
  public function setClusterSelector(Google_Service_Dataproc_ClusterSelector $clusterSelector)
  {
    $this->clusterSelector = $clusterSelector;
  }
  /**
   * @return Google_Service_Dataproc_ClusterSelector
   */
  public function getClusterSelector()
  {
    return $this->clusterSelector;
  }
  /**
   * @param Google_Service_Dataproc_ManagedCluster
   */
  public function setManagedCluster(Google_Service_Dataproc_ManagedCluster $managedCluster)
  {
    $this->managedCluster = $managedCluster;
  }
  /**
   * @return Google_Service_Dataproc_ManagedCluster
   */
  public function getManagedCluster()
  {
    return $this->managedCluster;
  }
}
