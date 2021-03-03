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

class Google_Service_Dataproc_WorkflowMetadata extends Google_Model
{
  public $clusterName;
  public $clusterUuid;
  protected $createClusterType = 'Google_Service_Dataproc_ClusterOperation';
  protected $createClusterDataType = '';
  public $dagEndTime;
  public $dagStartTime;
  public $dagTimeout;
  protected $deleteClusterType = 'Google_Service_Dataproc_ClusterOperation';
  protected $deleteClusterDataType = '';
  public $endTime;
  protected $graphType = 'Google_Service_Dataproc_WorkflowGraph';
  protected $graphDataType = '';
  public $parameters;
  public $startTime;
  public $state;
  public $template;
  public $version;

  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  public function getClusterName()
  {
    return $this->clusterName;
  }
  public function setClusterUuid($clusterUuid)
  {
    $this->clusterUuid = $clusterUuid;
  }
  public function getClusterUuid()
  {
    return $this->clusterUuid;
  }
  /**
   * @param Google_Service_Dataproc_ClusterOperation
   */
  public function setCreateCluster(Google_Service_Dataproc_ClusterOperation $createCluster)
  {
    $this->createCluster = $createCluster;
  }
  /**
   * @return Google_Service_Dataproc_ClusterOperation
   */
  public function getCreateCluster()
  {
    return $this->createCluster;
  }
  public function setDagEndTime($dagEndTime)
  {
    $this->dagEndTime = $dagEndTime;
  }
  public function getDagEndTime()
  {
    return $this->dagEndTime;
  }
  public function setDagStartTime($dagStartTime)
  {
    $this->dagStartTime = $dagStartTime;
  }
  public function getDagStartTime()
  {
    return $this->dagStartTime;
  }
  public function setDagTimeout($dagTimeout)
  {
    $this->dagTimeout = $dagTimeout;
  }
  public function getDagTimeout()
  {
    return $this->dagTimeout;
  }
  /**
   * @param Google_Service_Dataproc_ClusterOperation
   */
  public function setDeleteCluster(Google_Service_Dataproc_ClusterOperation $deleteCluster)
  {
    $this->deleteCluster = $deleteCluster;
  }
  /**
   * @return Google_Service_Dataproc_ClusterOperation
   */
  public function getDeleteCluster()
  {
    return $this->deleteCluster;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param Google_Service_Dataproc_WorkflowGraph
   */
  public function setGraph(Google_Service_Dataproc_WorkflowGraph $graph)
  {
    $this->graph = $graph;
  }
  /**
   * @return Google_Service_Dataproc_WorkflowGraph
   */
  public function getGraph()
  {
    return $this->graph;
  }
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTemplate($template)
  {
    $this->template = $template;
  }
  public function getTemplate()
  {
    return $this->template;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
