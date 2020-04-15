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

class Google_Service_Container_CreateClusterRequest extends Google_Model
{
  protected $clusterType = 'Google_Service_Container_Cluster';
  protected $clusterDataType = '';
  public $parent;
  public $projectId;
  public $zone;

  /**
   * @param Google_Service_Container_Cluster
   */
  public function setCluster(Google_Service_Container_Cluster $cluster)
  {
    $this->cluster = $cluster;
  }
  /**
   * @return Google_Service_Container_Cluster
   */
  public function getCluster()
  {
    return $this->cluster;
  }
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  public function getParent()
  {
    return $this->parent;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}
