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

namespace Google\Service\NetworkManagement;

class GKEMasterInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $clusterNetworkUri;
  /**
   * @var string
   */
  public $clusterUri;
  /**
   * @var string
   */
  public $externalIp;
  /**
   * @var string
   */
  public $internalIp;

  /**
   * @param string
   */
  public function setClusterNetworkUri($clusterNetworkUri)
  {
    $this->clusterNetworkUri = $clusterNetworkUri;
  }
  /**
   * @return string
   */
  public function getClusterNetworkUri()
  {
    return $this->clusterNetworkUri;
  }
  /**
   * @param string
   */
  public function setClusterUri($clusterUri)
  {
    $this->clusterUri = $clusterUri;
  }
  /**
   * @return string
   */
  public function getClusterUri()
  {
    return $this->clusterUri;
  }
  /**
   * @param string
   */
  public function setExternalIp($externalIp)
  {
    $this->externalIp = $externalIp;
  }
  /**
   * @return string
   */
  public function getExternalIp()
  {
    return $this->externalIp;
  }
  /**
   * @param string
   */
  public function setInternalIp($internalIp)
  {
    $this->internalIp = $internalIp;
  }
  /**
   * @return string
   */
  public function getInternalIp()
  {
    return $this->internalIp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GKEMasterInfo::class, 'Google_Service_NetworkManagement_GKEMasterInfo');
