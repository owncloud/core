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

namespace Google\Service\Contentwarehouse;

class CrowdingPerDocDataNewsCluster extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "clusterId" => "ClusterId",
        "clusterSize" => "ClusterSize",
        "clusterTimeStamp" => "ClusterTimeStamp",
  ];
  /**
   * @var string
   */
  public $clusterId;
  /**
   * @var int
   */
  public $clusterSize;
  /**
   * @var int
   */
  public $clusterTimeStamp;

  /**
   * @param string
   */
  public function setClusterId($clusterId)
  {
    $this->clusterId = $clusterId;
  }
  /**
   * @return string
   */
  public function getClusterId()
  {
    return $this->clusterId;
  }
  /**
   * @param int
   */
  public function setClusterSize($clusterSize)
  {
    $this->clusterSize = $clusterSize;
  }
  /**
   * @return int
   */
  public function getClusterSize()
  {
    return $this->clusterSize;
  }
  /**
   * @param int
   */
  public function setClusterTimeStamp($clusterTimeStamp)
  {
    $this->clusterTimeStamp = $clusterTimeStamp;
  }
  /**
   * @return int
   */
  public function getClusterTimeStamp()
  {
    return $this->clusterTimeStamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CrowdingPerDocDataNewsCluster::class, 'Google_Service_Contentwarehouse_CrowdingPerDocDataNewsCluster');
