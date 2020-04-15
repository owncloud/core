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

class Google_Service_Container_PrivateClusterConfig extends Google_Model
{
  public $enablePrivateEndpoint;
  public $enablePrivateNodes;
  public $masterIpv4CidrBlock;
  public $peeringName;
  public $privateEndpoint;
  public $publicEndpoint;

  public function setEnablePrivateEndpoint($enablePrivateEndpoint)
  {
    $this->enablePrivateEndpoint = $enablePrivateEndpoint;
  }
  public function getEnablePrivateEndpoint()
  {
    return $this->enablePrivateEndpoint;
  }
  public function setEnablePrivateNodes($enablePrivateNodes)
  {
    $this->enablePrivateNodes = $enablePrivateNodes;
  }
  public function getEnablePrivateNodes()
  {
    return $this->enablePrivateNodes;
  }
  public function setMasterIpv4CidrBlock($masterIpv4CidrBlock)
  {
    $this->masterIpv4CidrBlock = $masterIpv4CidrBlock;
  }
  public function getMasterIpv4CidrBlock()
  {
    return $this->masterIpv4CidrBlock;
  }
  public function setPeeringName($peeringName)
  {
    $this->peeringName = $peeringName;
  }
  public function getPeeringName()
  {
    return $this->peeringName;
  }
  public function setPrivateEndpoint($privateEndpoint)
  {
    $this->privateEndpoint = $privateEndpoint;
  }
  public function getPrivateEndpoint()
  {
    return $this->privateEndpoint;
  }
  public function setPublicEndpoint($publicEndpoint)
  {
    $this->publicEndpoint = $publicEndpoint;
  }
  public function getPublicEndpoint()
  {
    return $this->publicEndpoint;
  }
}
