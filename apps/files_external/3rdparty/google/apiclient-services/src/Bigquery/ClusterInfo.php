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

namespace Google\Service\Bigquery;

class ClusterInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $centroidId;
  public $clusterRadius;
  /**
   * @var string
   */
  public $clusterSize;

  /**
   * @param string
   */
  public function setCentroidId($centroidId)
  {
    $this->centroidId = $centroidId;
  }
  /**
   * @return string
   */
  public function getCentroidId()
  {
    return $this->centroidId;
  }
  public function setClusterRadius($clusterRadius)
  {
    $this->clusterRadius = $clusterRadius;
  }
  public function getClusterRadius()
  {
    return $this->clusterRadius;
  }
  /**
   * @param string
   */
  public function setClusterSize($clusterSize)
  {
    $this->clusterSize = $clusterSize;
  }
  /**
   * @return string
   */
  public function getClusterSize()
  {
    return $this->clusterSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClusterInfo::class, 'Google_Service_Bigquery_ClusterInfo');
