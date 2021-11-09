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

namespace Google\Service\VMMigrationService;

class VmwareSourceDetails extends \Google\Model
{
  public $password;
  public $thumbprint;
  public $username;
  public $vcenterIp;

  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function setThumbprint($thumbprint)
  {
    $this->thumbprint = $thumbprint;
  }
  public function getThumbprint()
  {
    return $this->thumbprint;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
  public function setVcenterIp($vcenterIp)
  {
    $this->vcenterIp = $vcenterIp;
  }
  public function getVcenterIp()
  {
    return $this->vcenterIp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VmwareSourceDetails::class, 'Google_Service_VMMigrationService_VmwareSourceDetails');
