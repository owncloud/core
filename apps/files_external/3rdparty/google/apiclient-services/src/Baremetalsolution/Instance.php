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

namespace Google\Service\Baremetalsolution;

class Instance extends \Google\Collection
{
  protected $collection_key = 'networks';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var bool
   */
  public $hyperthreadingEnabled;
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $interactiveSerialConsoleEnabled;
  /**
   * @var string[]
   */
  public $labels;
  protected $lunsType = Lun::class;
  protected $lunsDataType = 'array';
  /**
   * @var string
   */
  public $machineType;
  /**
   * @var string
   */
  public $name;
  protected $networksType = Network::class;
  protected $networksDataType = 'array';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param bool
   */
  public function setHyperthreadingEnabled($hyperthreadingEnabled)
  {
    $this->hyperthreadingEnabled = $hyperthreadingEnabled;
  }
  /**
   * @return bool
   */
  public function getHyperthreadingEnabled()
  {
    return $this->hyperthreadingEnabled;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param bool
   */
  public function setInteractiveSerialConsoleEnabled($interactiveSerialConsoleEnabled)
  {
    $this->interactiveSerialConsoleEnabled = $interactiveSerialConsoleEnabled;
  }
  /**
   * @return bool
   */
  public function getInteractiveSerialConsoleEnabled()
  {
    return $this->interactiveSerialConsoleEnabled;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Lun[]
   */
  public function setLuns($luns)
  {
    $this->luns = $luns;
  }
  /**
   * @return Lun[]
   */
  public function getLuns()
  {
    return $this->luns;
  }
  /**
   * @param string
   */
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  /**
   * @return string
   */
  public function getMachineType()
  {
    return $this->machineType;
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
   * @param Network[]
   */
  public function setNetworks($networks)
  {
    $this->networks = $networks;
  }
  /**
   * @return Network[]
   */
  public function getNetworks()
  {
    return $this->networks;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instance::class, 'Google_Service_Baremetalsolution_Instance');
