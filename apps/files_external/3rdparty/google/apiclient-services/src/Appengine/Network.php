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

namespace Google\Service\Appengine;

class Network extends \Google\Collection
{
  protected $collection_key = 'forwardedPorts';
  /**
   * @var string[]
   */
  public $forwardedPorts;
  /**
   * @var string
   */
  public $instanceTag;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $sessionAffinity;
  /**
   * @var string
   */
  public $subnetworkName;

  /**
   * @param string[]
   */
  public function setForwardedPorts($forwardedPorts)
  {
    $this->forwardedPorts = $forwardedPorts;
  }
  /**
   * @return string[]
   */
  public function getForwardedPorts()
  {
    return $this->forwardedPorts;
  }
  /**
   * @param string
   */
  public function setInstanceTag($instanceTag)
  {
    $this->instanceTag = $instanceTag;
  }
  /**
   * @return string
   */
  public function getInstanceTag()
  {
    return $this->instanceTag;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param bool
   */
  public function setSessionAffinity($sessionAffinity)
  {
    $this->sessionAffinity = $sessionAffinity;
  }
  /**
   * @return bool
   */
  public function getSessionAffinity()
  {
    return $this->sessionAffinity;
  }
  /**
   * @param string
   */
  public function setSubnetworkName($subnetworkName)
  {
    $this->subnetworkName = $subnetworkName;
  }
  /**
   * @return string
   */
  public function getSubnetworkName()
  {
    return $this->subnetworkName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Network::class, 'Google_Service_Appengine_Network');
