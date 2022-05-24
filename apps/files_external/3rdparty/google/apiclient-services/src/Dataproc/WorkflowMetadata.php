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

class WorkflowMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $clusterName;
  /**
   * @var string
   */
  public $clusterUuid;
  protected $createClusterType = ClusterOperation::class;
  protected $createClusterDataType = '';
  /**
   * @var string
   */
  public $dagEndTime;
  /**
   * @var string
   */
  public $dagStartTime;
  /**
   * @var string
   */
  public $dagTimeout;
  protected $deleteClusterType = ClusterOperation::class;
  protected $deleteClusterDataType = '';
  /**
   * @var string
   */
  public $endTime;
  protected $graphType = WorkflowGraph::class;
  protected $graphDataType = '';
  /**
   * @var string[]
   */
  public $parameters;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $template;
  /**
   * @var int
   */
  public $version;

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
   * @param ClusterOperation
   */
  public function setCreateCluster(ClusterOperation $createCluster)
  {
    $this->createCluster = $createCluster;
  }
  /**
   * @return ClusterOperation
   */
  public function getCreateCluster()
  {
    return $this->createCluster;
  }
  /**
   * @param string
   */
  public function setDagEndTime($dagEndTime)
  {
    $this->dagEndTime = $dagEndTime;
  }
  /**
   * @return string
   */
  public function getDagEndTime()
  {
    return $this->dagEndTime;
  }
  /**
   * @param string
   */
  public function setDagStartTime($dagStartTime)
  {
    $this->dagStartTime = $dagStartTime;
  }
  /**
   * @return string
   */
  public function getDagStartTime()
  {
    return $this->dagStartTime;
  }
  /**
   * @param string
   */
  public function setDagTimeout($dagTimeout)
  {
    $this->dagTimeout = $dagTimeout;
  }
  /**
   * @return string
   */
  public function getDagTimeout()
  {
    return $this->dagTimeout;
  }
  /**
   * @param ClusterOperation
   */
  public function setDeleteCluster(ClusterOperation $deleteCluster)
  {
    $this->deleteCluster = $deleteCluster;
  }
  /**
   * @return ClusterOperation
   */
  public function getDeleteCluster()
  {
    return $this->deleteCluster;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param WorkflowGraph
   */
  public function setGraph(WorkflowGraph $graph)
  {
    $this->graph = $graph;
  }
  /**
   * @return WorkflowGraph
   */
  public function getGraph()
  {
    return $this->graph;
  }
  /**
   * @param string[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return string[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setTemplate($template)
  {
    $this->template = $template;
  }
  /**
   * @return string
   */
  public function getTemplate()
  {
    return $this->template;
  }
  /**
   * @param int
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return int
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkflowMetadata::class, 'Google_Service_Dataproc_WorkflowMetadata');
