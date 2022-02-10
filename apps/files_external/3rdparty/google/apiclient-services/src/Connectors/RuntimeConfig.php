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

namespace Google\Service\Connectors;

class RuntimeConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $conndSubscription;
  /**
   * @var string
   */
  public $conndTopic;
  /**
   * @var string
   */
  public $controlPlaneSubscription;
  /**
   * @var string
   */
  public $controlPlaneTopic;
  /**
   * @var string
   */
  public $locationId;
  /**
   * @var string
   */
  public $runtimeEndpoint;
  /**
   * @var string
   */
  public $schemaGcsBucket;
  /**
   * @var string
   */
  public $serviceDirectory;
  /**
   * @var string
   */
  public $state;

  /**
   * @param string
   */
  public function setConndSubscription($conndSubscription)
  {
    $this->conndSubscription = $conndSubscription;
  }
  /**
   * @return string
   */
  public function getConndSubscription()
  {
    return $this->conndSubscription;
  }
  /**
   * @param string
   */
  public function setConndTopic($conndTopic)
  {
    $this->conndTopic = $conndTopic;
  }
  /**
   * @return string
   */
  public function getConndTopic()
  {
    return $this->conndTopic;
  }
  /**
   * @param string
   */
  public function setControlPlaneSubscription($controlPlaneSubscription)
  {
    $this->controlPlaneSubscription = $controlPlaneSubscription;
  }
  /**
   * @return string
   */
  public function getControlPlaneSubscription()
  {
    return $this->controlPlaneSubscription;
  }
  /**
   * @param string
   */
  public function setControlPlaneTopic($controlPlaneTopic)
  {
    $this->controlPlaneTopic = $controlPlaneTopic;
  }
  /**
   * @return string
   */
  public function getControlPlaneTopic()
  {
    return $this->controlPlaneTopic;
  }
  /**
   * @param string
   */
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  /**
   * @return string
   */
  public function getLocationId()
  {
    return $this->locationId;
  }
  /**
   * @param string
   */
  public function setRuntimeEndpoint($runtimeEndpoint)
  {
    $this->runtimeEndpoint = $runtimeEndpoint;
  }
  /**
   * @return string
   */
  public function getRuntimeEndpoint()
  {
    return $this->runtimeEndpoint;
  }
  /**
   * @param string
   */
  public function setSchemaGcsBucket($schemaGcsBucket)
  {
    $this->schemaGcsBucket = $schemaGcsBucket;
  }
  /**
   * @return string
   */
  public function getSchemaGcsBucket()
  {
    return $this->schemaGcsBucket;
  }
  /**
   * @param string
   */
  public function setServiceDirectory($serviceDirectory)
  {
    $this->serviceDirectory = $serviceDirectory;
  }
  /**
   * @return string
   */
  public function getServiceDirectory()
  {
    return $this->serviceDirectory;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RuntimeConfig::class, 'Google_Service_Connectors_RuntimeConfig');
