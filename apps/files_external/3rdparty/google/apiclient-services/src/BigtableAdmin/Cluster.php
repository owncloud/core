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

namespace Google\Service\BigtableAdmin;

class Cluster extends \Google\Model
{
  public $defaultStorageType;
  protected $encryptionConfigType = EncryptionConfig::class;
  protected $encryptionConfigDataType = '';
  public $location;
  public $name;
  public $serveNodes;
  public $state;

  public function setDefaultStorageType($defaultStorageType)
  {
    $this->defaultStorageType = $defaultStorageType;
  }
  public function getDefaultStorageType()
  {
    return $this->defaultStorageType;
  }
  /**
   * @param EncryptionConfig
   */
  public function setEncryptionConfig(EncryptionConfig $encryptionConfig)
  {
    $this->encryptionConfig = $encryptionConfig;
  }
  /**
   * @return EncryptionConfig
   */
  public function getEncryptionConfig()
  {
    return $this->encryptionConfig;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setServeNodes($serveNodes)
  {
    $this->serveNodes = $serveNodes;
  }
  public function getServeNodes()
  {
    return $this->serveNodes;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Cluster::class, 'Google_Service_BigtableAdmin_Cluster');
