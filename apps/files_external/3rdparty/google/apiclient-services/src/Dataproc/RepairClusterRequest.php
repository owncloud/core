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

class RepairClusterRequest extends \Google\Collection
{
  protected $collection_key = 'nodePools';
  /**
   * @var string
   */
  public $clusterUuid;
  /**
   * @var string
   */
  public $gracefulDecommissionTimeout;
  protected $nodePoolsType = NodePool::class;
  protected $nodePoolsDataType = 'array';
  /**
   * @var string
   */
  public $parentOperationId;
  /**
   * @var string
   */
  public $requestId;

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
   * @param string
   */
  public function setGracefulDecommissionTimeout($gracefulDecommissionTimeout)
  {
    $this->gracefulDecommissionTimeout = $gracefulDecommissionTimeout;
  }
  /**
   * @return string
   */
  public function getGracefulDecommissionTimeout()
  {
    return $this->gracefulDecommissionTimeout;
  }
  /**
   * @param NodePool[]
   */
  public function setNodePools($nodePools)
  {
    $this->nodePools = $nodePools;
  }
  /**
   * @return NodePool[]
   */
  public function getNodePools()
  {
    return $this->nodePools;
  }
  /**
   * @param string
   */
  public function setParentOperationId($parentOperationId)
  {
    $this->parentOperationId = $parentOperationId;
  }
  /**
   * @return string
   */
  public function getParentOperationId()
  {
    return $this->parentOperationId;
  }
  /**
   * @param string
   */
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  /**
   * @return string
   */
  public function getRequestId()
  {
    return $this->requestId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepairClusterRequest::class, 'Google_Service_Dataproc_RepairClusterRequest');
