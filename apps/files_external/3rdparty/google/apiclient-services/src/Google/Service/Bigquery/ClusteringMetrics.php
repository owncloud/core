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

class Google_Service_Bigquery_ClusteringMetrics extends Google_Collection
{
  protected $collection_key = 'clusters';
  protected $clustersType = 'Google_Service_Bigquery_Cluster';
  protected $clustersDataType = 'array';
  public $daviesBouldinIndex;
  public $meanSquaredDistance;

  /**
   * @param Google_Service_Bigquery_Cluster
   */
  public function setClusters($clusters)
  {
    $this->clusters = $clusters;
  }
  /**
   * @return Google_Service_Bigquery_Cluster
   */
  public function getClusters()
  {
    return $this->clusters;
  }
  public function setDaviesBouldinIndex($daviesBouldinIndex)
  {
    $this->daviesBouldinIndex = $daviesBouldinIndex;
  }
  public function getDaviesBouldinIndex()
  {
    return $this->daviesBouldinIndex;
  }
  public function setMeanSquaredDistance($meanSquaredDistance)
  {
    $this->meanSquaredDistance = $meanSquaredDistance;
  }
  public function getMeanSquaredDistance()
  {
    return $this->meanSquaredDistance;
  }
}
