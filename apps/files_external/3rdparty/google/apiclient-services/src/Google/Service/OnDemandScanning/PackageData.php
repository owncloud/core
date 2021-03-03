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

class Google_Service_OnDemandScanning_PackageData extends Google_Model
{
  public $cpeUri;
  public $os;
  public $osVersion;
  public $package;
  public $version;

  public function setCpeUri($cpeUri)
  {
    $this->cpeUri = $cpeUri;
  }
  public function getCpeUri()
  {
    return $this->cpeUri;
  }
  public function setOs($os)
  {
    $this->os = $os;
  }
  public function getOs()
  {
    return $this->os;
  }
  public function setOsVersion($osVersion)
  {
    $this->osVersion = $osVersion;
  }
  public function getOsVersion()
  {
    return $this->osVersion;
  }
  public function setPackage($package)
  {
    $this->package = $package;
  }
  public function getPackage()
  {
    return $this->package;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
