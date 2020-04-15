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

class Google_Service_Bigquery_ClusterInfo extends Google_Model
{
  public $centroidId;
  public $clusterRadius;
  public $clusterSize;

  public function setCentroidId($centroidId)
  {
    $this->centroidId = $centroidId;
  }
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
  public function setClusterSize($clusterSize)
  {
    $this->clusterSize = $clusterSize;
  }
  public function getClusterSize()
  {
    return $this->clusterSize;
  }
}
