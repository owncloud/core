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

class HomeGraphCommonRoute extends \Google\Collection
{
  protected $collection_key = 'chipEndpoint';
  /**
   * @var string
   */
  public $agentDeviceId;
  /**
   * @var string
   */
  public $agentId;
  /**
   * @var int[]
   */
  public $chipEndpoint;
  /**
   * @var string
   */
  public $targetType;

  /**
   * @param string
   */
  public function setAgentDeviceId($agentDeviceId)
  {
    $this->agentDeviceId = $agentDeviceId;
  }
  /**
   * @return string
   */
  public function getAgentDeviceId()
  {
    return $this->agentDeviceId;
  }
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
   * @param int[]
   */
  public function setChipEndpoint($chipEndpoint)
  {
    $this->chipEndpoint = $chipEndpoint;
  }
  /**
   * @return int[]
   */
  public function getChipEndpoint()
  {
    return $this->chipEndpoint;
  }
  /**
   * @param string
   */
  public function setTargetType($targetType)
  {
    $this->targetType = $targetType;
  }
  /**
   * @return string
   */
  public function getTargetType()
  {
    return $this->targetType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HomeGraphCommonRoute::class, 'Google_Service_Contentwarehouse_HomeGraphCommonRoute');
