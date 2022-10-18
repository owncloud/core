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

class NfsShare extends \Google\Collection
{
  protected $collection_key = 'allowedClients';
  protected $allowedClientsType = AllowedClient::class;
  protected $allowedClientsDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $nfsShareId;
  /**
   * @var string
   */
  public $requestedSizeGib;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $storageType;
  /**
   * @var string
   */
  public $volume;

  /**
   * @param AllowedClient[]
   */
  public function setAllowedClients($allowedClients)
  {
    $this->allowedClients = $allowedClients;
  }
  /**
   * @return AllowedClient[]
   */
  public function getAllowedClients()
  {
    return $this->allowedClients;
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
   * @param string
   */
  public function setNfsShareId($nfsShareId)
  {
    $this->nfsShareId = $nfsShareId;
  }
  /**
   * @return string
   */
  public function getNfsShareId()
  {
    return $this->nfsShareId;
  }
  /**
   * @param string
   */
  public function setRequestedSizeGib($requestedSizeGib)
  {
    $this->requestedSizeGib = $requestedSizeGib;
  }
  /**
   * @return string
   */
  public function getRequestedSizeGib()
  {
    return $this->requestedSizeGib;
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
  public function setStorageType($storageType)
  {
    $this->storageType = $storageType;
  }
  /**
   * @return string
   */
  public function getStorageType()
  {
    return $this->storageType;
  }
  /**
   * @param string
   */
  public function setVolume($volume)
  {
    $this->volume = $volume;
  }
  /**
   * @return string
   */
  public function getVolume()
  {
    return $this->volume;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NfsShare::class, 'Google_Service_Baremetalsolution_NfsShare');
