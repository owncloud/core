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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1RoutingRule extends \Google\Model
{
  /**
   * @var string
   */
  public $basepath;
  /**
   * @var string
   */
  public $envGroupRevision;
  /**
   * @var string
   */
  public $environment;
  /**
   * @var string
   */
  public $receiver;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setBasepath($basepath)
  {
    $this->basepath = $basepath;
  }
  /**
   * @return string
   */
  public function getBasepath()
  {
    return $this->basepath;
  }
  /**
   * @param string
   */
  public function setEnvGroupRevision($envGroupRevision)
  {
    $this->envGroupRevision = $envGroupRevision;
  }
  /**
   * @return string
   */
  public function getEnvGroupRevision()
  {
    return $this->envGroupRevision;
  }
  /**
   * @param string
   */
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return string
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param string
   */
  public function setReceiver($receiver)
  {
    $this->receiver = $receiver;
  }
  /**
   * @return string
   */
  public function getReceiver()
  {
    return $this->receiver;
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
class_alias(GoogleCloudApigeeV1RoutingRule::class, 'Google_Service_Apigee_GoogleCloudApigeeV1RoutingRule');
