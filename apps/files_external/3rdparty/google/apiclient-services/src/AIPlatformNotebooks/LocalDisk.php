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

namespace Google\Service\AIPlatformNotebooks;

class LocalDisk extends \Google\Collection
{
  protected $collection_key = 'licenses';
  /**
   * @var bool
   */
  public $autoDelete;
  /**
   * @var bool
   */
  public $boot;
  /**
   * @var string
   */
  public $deviceName;
  protected $guestOsFeaturesType = RuntimeGuestOsFeature::class;
  protected $guestOsFeaturesDataType = 'array';
  /**
   * @var int
   */
  public $index;
  protected $initializeParamsType = LocalDiskInitializeParams::class;
  protected $initializeParamsDataType = '';
  /**
   * @var string
   */
  public $interface;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $licenses;
  /**
   * @var string
   */
  public $mode;
  /**
   * @var string
   */
  public $source;
  /**
   * @var string
   */
  public $type;

  /**
   * @param bool
   */
  public function setAutoDelete($autoDelete)
  {
    $this->autoDelete = $autoDelete;
  }
  /**
   * @return bool
   */
  public function getAutoDelete()
  {
    return $this->autoDelete;
  }
  /**
   * @param bool
   */
  public function setBoot($boot)
  {
    $this->boot = $boot;
  }
  /**
   * @return bool
   */
  public function getBoot()
  {
    return $this->boot;
  }
  /**
   * @param string
   */
  public function setDeviceName($deviceName)
  {
    $this->deviceName = $deviceName;
  }
  /**
   * @return string
   */
  public function getDeviceName()
  {
    return $this->deviceName;
  }
  /**
   * @param RuntimeGuestOsFeature[]
   */
  public function setGuestOsFeatures($guestOsFeatures)
  {
    $this->guestOsFeatures = $guestOsFeatures;
  }
  /**
   * @return RuntimeGuestOsFeature[]
   */
  public function getGuestOsFeatures()
  {
    return $this->guestOsFeatures;
  }
  /**
   * @param int
   */
  public function setIndex($index)
  {
    $this->index = $index;
  }
  /**
   * @return int
   */
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param LocalDiskInitializeParams
   */
  public function setInitializeParams(LocalDiskInitializeParams $initializeParams)
  {
    $this->initializeParams = $initializeParams;
  }
  /**
   * @return LocalDiskInitializeParams
   */
  public function getInitializeParams()
  {
    return $this->initializeParams;
  }
  /**
   * @param string
   */
  public function setInterface($interface)
  {
    $this->interface = $interface;
  }
  /**
   * @return string
   */
  public function getInterface()
  {
    return $this->interface;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string[]
   */
  public function setLicenses($licenses)
  {
    $this->licenses = $licenses;
  }
  /**
   * @return string[]
   */
  public function getLicenses()
  {
    return $this->licenses;
  }
  /**
   * @param string
   */
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  /**
   * @return string
   */
  public function getMode()
  {
    return $this->mode;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocalDisk::class, 'Google_Service_AIPlatformNotebooks_LocalDisk');
