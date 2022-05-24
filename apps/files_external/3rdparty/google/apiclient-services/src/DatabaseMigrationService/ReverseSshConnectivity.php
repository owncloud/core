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

namespace Google\Service\DatabaseMigrationService;

class ReverseSshConnectivity extends \Google\Model
{
  /**
   * @var string
   */
  public $vm;
  /**
   * @var string
   */
  public $vmIp;
  /**
   * @var int
   */
  public $vmPort;
  /**
   * @var string
   */
  public $vpc;

  /**
   * @param string
   */
  public function setVm($vm)
  {
    $this->vm = $vm;
  }
  /**
   * @return string
   */
  public function getVm()
  {
    return $this->vm;
  }
  /**
   * @param string
   */
  public function setVmIp($vmIp)
  {
    $this->vmIp = $vmIp;
  }
  /**
   * @return string
   */
  public function getVmIp()
  {
    return $this->vmIp;
  }
  /**
   * @param int
   */
  public function setVmPort($vmPort)
  {
    $this->vmPort = $vmPort;
  }
  /**
   * @return int
   */
  public function getVmPort()
  {
    return $this->vmPort;
  }
  /**
   * @param string
   */
  public function setVpc($vpc)
  {
    $this->vpc = $vpc;
  }
  /**
   * @return string
   */
  public function getVpc()
  {
    return $this->vpc;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReverseSshConnectivity::class, 'Google_Service_DatabaseMigrationService_ReverseSshConnectivity');
