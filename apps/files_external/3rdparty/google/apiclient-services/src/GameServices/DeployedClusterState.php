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

namespace Google\Service\GameServices;

class DeployedClusterState extends \Google\Collection
{
  protected $collection_key = 'fleetDetails';
  /**
   * @var string
   */
  public $cluster;
  protected $fleetDetailsType = DeployedFleetDetails::class;
  protected $fleetDetailsDataType = 'array';

  /**
   * @param string
   */
  public function setCluster($cluster)
  {
    $this->cluster = $cluster;
  }
  /**
   * @return string
   */
  public function getCluster()
  {
    return $this->cluster;
  }
  /**
   * @param DeployedFleetDetails[]
   */
  public function setFleetDetails($fleetDetails)
  {
    $this->fleetDetails = $fleetDetails;
  }
  /**
   * @return DeployedFleetDetails[]
   */
  public function getFleetDetails()
  {
    return $this->fleetDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeployedClusterState::class, 'Google_Service_GameServices_DeployedClusterState');
