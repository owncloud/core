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

namespace Google\Service\Games;

class Instance extends \Google\Model
{
  /**
   * @var string
   */
  public $acquisitionUri;
  protected $androidInstanceType = InstanceAndroidDetails::class;
  protected $androidInstanceDataType = '';
  protected $iosInstanceType = InstanceIosDetails::class;
  protected $iosInstanceDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $platformType;
  /**
   * @var bool
   */
  public $realtimePlay;
  /**
   * @var bool
   */
  public $turnBasedPlay;
  protected $webInstanceType = InstanceWebDetails::class;
  protected $webInstanceDataType = '';

  /**
   * @param string
   */
  public function setAcquisitionUri($acquisitionUri)
  {
    $this->acquisitionUri = $acquisitionUri;
  }
  /**
   * @return string
   */
  public function getAcquisitionUri()
  {
    return $this->acquisitionUri;
  }
  /**
   * @param InstanceAndroidDetails
   */
  public function setAndroidInstance(InstanceAndroidDetails $androidInstance)
  {
    $this->androidInstance = $androidInstance;
  }
  /**
   * @return InstanceAndroidDetails
   */
  public function getAndroidInstance()
  {
    return $this->androidInstance;
  }
  /**
   * @param InstanceIosDetails
   */
  public function setIosInstance(InstanceIosDetails $iosInstance)
  {
    $this->iosInstance = $iosInstance;
  }
  /**
   * @return InstanceIosDetails
   */
  public function getIosInstance()
  {
    return $this->iosInstance;
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
  public function setPlatformType($platformType)
  {
    $this->platformType = $platformType;
  }
  /**
   * @return string
   */
  public function getPlatformType()
  {
    return $this->platformType;
  }
  /**
   * @param bool
   */
  public function setRealtimePlay($realtimePlay)
  {
    $this->realtimePlay = $realtimePlay;
  }
  /**
   * @return bool
   */
  public function getRealtimePlay()
  {
    return $this->realtimePlay;
  }
  /**
   * @param bool
   */
  public function setTurnBasedPlay($turnBasedPlay)
  {
    $this->turnBasedPlay = $turnBasedPlay;
  }
  /**
   * @return bool
   */
  public function getTurnBasedPlay()
  {
    return $this->turnBasedPlay;
  }
  /**
   * @param InstanceWebDetails
   */
  public function setWebInstance(InstanceWebDetails $webInstance)
  {
    $this->webInstance = $webInstance;
  }
  /**
   * @return InstanceWebDetails
   */
  public function getWebInstance()
  {
    return $this->webInstance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instance::class, 'Google_Service_Games_Instance');
