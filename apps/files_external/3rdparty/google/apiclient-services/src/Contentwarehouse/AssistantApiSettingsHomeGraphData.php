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

class AssistantApiSettingsHomeGraphData extends \Google\Collection
{
  protected $collection_key = 'supportedTraits';
  /**
   * @var string
   */
  public $agentId;
  /**
   * @var array[]
   */
  public $attributes;
  /**
   * @var string
   */
  public $deviceId;
  /**
   * @var string
   */
  public $deviceType;
  /**
   * @var bool
   */
  public $shouldWriteToHomeGraph;
  /**
   * @var string[]
   */
  public $supportedTraits;
  /**
   * @var bool
   */
  public $supportsDirectResponse;

  /**
   * @param string
   */
  public function setAgentId($agentId)
  {
    $this->agentId = $agentId;
  }
  /**
   * @return string
   */
  public function getAgentId()
  {
    return $this->agentId;
  }
  /**
   * @param array[]
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return array[]
   */
  public function getAttributes()
  {
    return $this->attributes;
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
   * @param string
   */
  public function setDeviceType($deviceType)
  {
    $this->deviceType = $deviceType;
  }
  /**
   * @return string
   */
  public function getDeviceType()
  {
    return $this->deviceType;
  }
  /**
   * @param bool
   */
  public function setShouldWriteToHomeGraph($shouldWriteToHomeGraph)
  {
    $this->shouldWriteToHomeGraph = $shouldWriteToHomeGraph;
  }
  /**
   * @return bool
   */
  public function getShouldWriteToHomeGraph()
  {
    return $this->shouldWriteToHomeGraph;
  }
  /**
   * @param string[]
   */
  public function setSupportedTraits($supportedTraits)
  {
    $this->supportedTraits = $supportedTraits;
  }
  /**
   * @return string[]
   */
  public function getSupportedTraits()
  {
    return $this->supportedTraits;
  }
  /**
   * @param bool
   */
  public function setSupportsDirectResponse($supportsDirectResponse)
  {
    $this->supportsDirectResponse = $supportsDirectResponse;
  }
  /**
   * @return bool
   */
  public function getSupportsDirectResponse()
  {
    return $this->supportsDirectResponse;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSettingsHomeGraphData::class, 'Google_Service_Contentwarehouse_AssistantApiSettingsHomeGraphData');
