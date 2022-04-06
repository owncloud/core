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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1TaskInfrastructureSpecVpcNetwork extends \Google\Collection
{
  protected $collection_key = 'networkTags';
  /**
   * @var string
   */
  public $network;
  /**
   * @var string[]
   */
  public $networkTags;
  /**
   * @var string
   */
  public $subNetwork;

  /**
   * @param string
   */
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  /**
   * @return string
   */
  public function getNetwork()
  {
    return $this->network;
  }
  /**
   * @param string[]
   */
  public function setNetworkTags($networkTags)
  {
    $this->networkTags = $networkTags;
  }
  /**
   * @return string[]
   */
  public function getNetworkTags()
  {
    return $this->networkTags;
  }
  /**
   * @param string
   */
  public function setSubNetwork($subNetwork)
  {
    $this->subNetwork = $subNetwork;
  }
  /**
   * @return string
   */
  public function getSubNetwork()
  {
    return $this->subNetwork;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1TaskInfrastructureSpecVpcNetwork::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1TaskInfrastructureSpecVpcNetwork');
