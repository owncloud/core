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

namespace Google\Service\BigtableAdmin;

class ListClustersResponse extends \Google\Collection
{
  protected $collection_key = 'failedLocations';
  protected $clustersType = Cluster::class;
  protected $clustersDataType = 'array';
  public $failedLocations;
  public $nextPageToken;

  /**
   * @param Cluster[]
   */
  public function setClusters($clusters)
  {
    $this->clusters = $clusters;
  }
  /**
   * @return Cluster[]
   */
  public function getClusters()
  {
    return $this->clusters;
  }
  public function setFailedLocations($failedLocations)
  {
    $this->failedLocations = $failedLocations;
  }
  public function getFailedLocations()
  {
    return $this->failedLocations;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListClustersResponse::class, 'Google_Service_BigtableAdmin_ListClustersResponse');
