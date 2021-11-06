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

class ClusterOperationMetadata extends \Google\Collection
{
  protected $collection_key = 'warnings';
  public $clusterName;
  public $clusterUuid;
  public $description;
  public $labels;
  public $operationType;
  protected $statusType = ClusterOperationStatus::class;
  protected $statusDataType = '';
  protected $statusHistoryType = ClusterOperationStatus::class;
  protected $statusHistoryDataType = 'array';
  public $warnings;

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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  public function getOperationType()
  {
    return $this->operationType;
  }
  /**
   * @param ClusterOperationStatus
   */
  public function setStatus(ClusterOperationStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return ClusterOperationStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param ClusterOperationStatus[]
   */
  public function setStatusHistory($statusHistory)
  {
    $this->statusHistory = $statusHistory;
  }
  /**
   * @return ClusterOperationStatus[]
   */
  public function getStatusHistory()
  {
    return $this->statusHistory;
  }
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClusterOperationMetadata::class, 'Google_Service_Dataproc_ClusterOperationMetadata');
