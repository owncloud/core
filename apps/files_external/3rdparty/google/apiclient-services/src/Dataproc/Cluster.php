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

namespace Google\Service\Dataproc;

class Cluster extends \Google\Collection
{
  protected $collection_key = 'statusHistory';
  /**
   * @var string
   */
  public $clusterName;
  /**
   * @var string
   */
  public $clusterUuid;
  protected $configType = ClusterConfig::class;
  protected $configDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  protected $metricsType = ClusterMetrics::class;
  protected $metricsDataType = '';
  /**
   * @var string
   */
  public $projectId;
  protected $statusType = ClusterStatus::class;
  protected $statusDataType = '';
  protected $statusHistoryType = ClusterStatus::class;
  protected $statusHistoryDataType = 'array';

  /**
   * @param string
   */
  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  /**
   * @return string
   */
  public function getClusterName()
  {
    return $this->clusterName;
  }
  /**
   * @param string
   */
  public function setClusterUuid($clusterUuid)
  {
    $this->clusterUuid = $clusterUuid;
  }
  /**
   * @return string
   */
  public function getClusterUuid()
  {
    return $this->clusterUuid;
  }
  /**
   * @param ClusterConfig
   */
  public function setConfig(ClusterConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return ClusterConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param ClusterMetrics
   */
  public function setMetrics(ClusterMetrics $metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return ClusterMetrics
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param ClusterStatus
   */
  public function setStatus(ClusterStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return ClusterStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param ClusterStatus[]
   */
  public function setStatusHistory($statusHistory)
  {
    $this->statusHistory = $statusHistory;
  }
  /**
   * @return ClusterStatus[]
   */
  public function getStatusHistory()
  {
    return $this->statusHistory;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Cluster::class, 'Google_Service_Dataproc_Cluster');
