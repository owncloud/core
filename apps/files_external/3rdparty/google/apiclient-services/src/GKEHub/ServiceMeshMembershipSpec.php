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

namespace Google\Service\GKEHub;

class ServiceMeshMembershipSpec extends \Google\Model
{
  /**
   * @var string
   */
  public $controlPlane;
  /**
   * @var string
   */
  public $management;

  /**
   * @param string
   */
  public function setControlPlane($controlPlane)
  {
    $this->controlPlane = $controlPlane;
  }
  /**
   * @return string
   */
  public function getControlPlane()
  {
    return $this->controlPlane;
  }
  /**
   * @param string
   */
  public function setManagement($management)
  {
    $this->management = $management;
  }
  /**
   * @return string
   */
  public function getManagement()
  {
    return $this->management;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceMeshMembershipSpec::class, 'Google_Service_GKEHub_ServiceMeshMembershipSpec');
