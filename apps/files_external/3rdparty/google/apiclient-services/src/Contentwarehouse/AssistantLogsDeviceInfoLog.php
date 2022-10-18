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

namespace Google\Service\Contentwarehouse;

class AssistantLogsDeviceInfoLog extends \Google\Collection
{
  protected $collection_key = 'sessions';
  /**
   * @var string
   */
  public $arbitrationDeviceId;
  /**
   * @var string
   */
  public $connectivity;
  /**
   * @var string
   */
  public $deviceId;
  /**
   * @var int
   */
  public $deviceIndex;
  /**
   * @var string
   */
  public $deviceModelId;
  /**
   * @var string
   */
  public $distance;
  /**
   * @var string
   */
  public $eliminatingLumosProcessor;
  /**
   * @var bool
   */
  public $isRemote;
  /**
   * @var bool
   */
  public $isTethered;
  protected $mediaCapabilitiesType = AssistantLogsMediaCapabilities::class;
  protected $mediaCapabilitiesDataType = '';
  /**
   * @var string
   */
  public $mediaDeviceType;
  /**
   * @var string
   */
  public $name;
  protected $sessionsType = AssistantLogsDeviceMediaSessionLog::class;
  protected $sessionsDataType = 'array';
  /**
   * @var string
   */
  public $surfaceType;

  /**
   * @param string
   */
  public function setArbitrationDeviceId($arbitrationDeviceId)
  {
    $this->arbitrationDeviceId = $arbitrationDeviceId;
  }
  /**
   * @return string
   */
  public function getArbitrationDeviceId()
  {
    return $this->arbitrationDeviceId;
  }
  /**
   * @param string
   */
  public function setConnectivity($connectivity)
  {
    $this->connectivity = $connectivity;
  }
  /**
   * @return string
   */
  public function getConnectivity()
  {
    return $this->connectivity;
  }
  /**
   * @param string
   */
  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }
  /**
   * @return string
   */
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  /**
   * @param int
   */
  public function setDeviceIndex($deviceIndex)
  {
    $this->deviceIndex = $deviceIndex;
  }
  /**
   * @return int
   */
  public function getDeviceIndex()
  {
    return $this->deviceIndex;
  }
  /**
   * @param string
   */
  public function setDeviceModelId($deviceModelId)
  {
    $this->deviceModelId = $deviceModelId;
  }
  /**
   * @return string
   */
  public function getDeviceModelId()
  {
    return $this->deviceModelId;
  }
  /**
   * @param string
   */
  public function setDistance($distance)
  {
    $this->distance = $distance;
  }
  /**
   * @return string
   */
  public function getDistance()
  {
    return $this->distance;
  }
  /**
   * @param string
   */
  public function setEliminatingLumosProcessor($eliminatingLumosProcessor)
  {
    $this->eliminatingLumosProcessor = $eliminatingLumosProcessor;
  }
  /**
   * @return string
   */
  public function getEliminatingLumosProcessor()
  {
    return $this->eliminatingLumosProcessor;
  }
  /**
   * @param bool
   */
  public function setIsRemote($isRemote)
  {
    $this->isRemote = $isRemote;
  }
  /**
   * @return bool
   */
  public function getIsRemote()
  {
    return $this->isRemote;
  }
  /**
   * @param bool
   */
  public function setIsTethered($isTethered)
  {
    $this->isTethered = $isTethered;
  }
  /**
   * @return bool
   */
  public function getIsTethered()
  {
    return $this->isTethered;
  }
  /**
   * @param AssistantLogsMediaCapabilities
   */
  public function setMediaCapabilities(AssistantLogsMediaCapabilities $mediaCapabilities)
  {
    $this->mediaCapabilities = $mediaCapabilities;
  }
  /**
   * @return AssistantLogsMediaCapabilities
   */
  public function getMediaCapabilities()
  {
    return $this->mediaCapabilities;
  }
  /**
   * @param string
   */
  public function setMediaDeviceType($mediaDeviceType)
  {
    $this->mediaDeviceType = $mediaDeviceType;
  }
  /**
   * @return string
   */
  public function getMediaDeviceType()
  {
    return $this->mediaDeviceType;
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
   * @param AssistantLogsDeviceMediaSessionLog[]
   */
  public function setSessions($sessions)
  {
    $this->sessions = $sessions;
  }
  /**
   * @return AssistantLogsDeviceMediaSessionLog[]
   */
  public function getSessions()
  {
    return $this->sessions;
  }
  /**
   * @param string
   */
  public function setSurfaceType($surfaceType)
  {
    $this->surfaceType = $surfaceType;
  }
  /**
   * @return string
   */
  public function getSurfaceType()
  {
    return $this->surfaceType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsDeviceInfoLog::class, 'Google_Service_Contentwarehouse_AssistantLogsDeviceInfoLog');
