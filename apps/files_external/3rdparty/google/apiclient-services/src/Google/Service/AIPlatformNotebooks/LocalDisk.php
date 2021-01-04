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

class Google_Service_AIPlatformNotebooks_LocalDisk extends Google_Collection
{
  protected $collection_key = 'licenses';
  public $autoDelete;
  public $boot;
  public $deviceName;
  protected $guestOsFeaturesType = 'Google_Service_AIPlatformNotebooks_RuntimeGuestOsFeature';
  protected $guestOsFeaturesDataType = 'array';
  public $index;
  protected $initializeParamsType = 'Google_Service_AIPlatformNotebooks_LocalDiskInitializeParams';
  protected $initializeParamsDataType = '';
  public $interface;
  public $kind;
  public $licenses;
  public $mode;
  public $source;
  public $type;

  public function setAutoDelete($autoDelete)
  {
    $this->autoDelete = $autoDelete;
  }
  public function getAutoDelete()
  {
    return $this->autoDelete;
  }
  public function setBoot($boot)
  {
    $this->boot = $boot;
  }
  public function getBoot()
  {
    return $this->boot;
  }
  public function setDeviceName($deviceName)
  {
    $this->deviceName = $deviceName;
  }
  public function getDeviceName()
  {
    return $this->deviceName;
  }
  /**
   * @param Google_Service_AIPlatformNotebooks_RuntimeGuestOsFeature[]
   */
  public function setGuestOsFeatures($guestOsFeatures)
  {
    $this->guestOsFeatures = $guestOsFeatures;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_RuntimeGuestOsFeature[]
   */
  public function getGuestOsFeatures()
  {
    return $this->guestOsFeatures;
  }
  public function setIndex($index)
  {
    $this->index = $index;
  }
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param Google_Service_AIPlatformNotebooks_LocalDiskInitializeParams
   */
  public function setInitializeParams(Google_Service_AIPlatformNotebooks_LocalDiskInitializeParams $initializeParams)
  {
    $this->initializeParams = $initializeParams;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_LocalDiskInitializeParams
   */
  public function getInitializeParams()
  {
    return $this->initializeParams;
  }
  public function setInterface($interface)
  {
    $this->interface = $interface;
  }
  public function getInterface()
  {
    return $this->interface;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLicenses($licenses)
  {
    $this->licenses = $licenses;
  }
  public function getLicenses()
  {
    return $this->licenses;
  }
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  public function getMode()
  {
    return $this->mode;
  }
  public function setSource($source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
