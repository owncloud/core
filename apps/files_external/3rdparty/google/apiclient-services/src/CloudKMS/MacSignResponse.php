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

namespace Google\Service\CloudKMS;

class MacSignResponse extends \Google\Model
{
  public $mac;
  public $macCrc32c;
  public $name;
  public $protectionLevel;
  public $verifiedDataCrc32c;

  public function setMac($mac)
  {
    $this->mac = $mac;
  }
  public function getMac()
  {
    return $this->mac;
  }
  public function setMacCrc32c($macCrc32c)
  {
    $this->macCrc32c = $macCrc32c;
  }
  public function getMacCrc32c()
  {
    return $this->macCrc32c;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProtectionLevel($protectionLevel)
  {
    $this->protectionLevel = $protectionLevel;
  }
  public function getProtectionLevel()
  {
    return $this->protectionLevel;
  }
  public function setVerifiedDataCrc32c($verifiedDataCrc32c)
  {
    $this->verifiedDataCrc32c = $verifiedDataCrc32c;
  }
  public function getVerifiedDataCrc32c()
  {
    return $this->verifiedDataCrc32c;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MacSignResponse::class, 'Google_Service_CloudKMS_MacSignResponse');
