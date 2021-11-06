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
  public $conndSubscription;
  public $conndTopic;
  public $controlPlaneSubscription;
  public $controlPlaneTopic;
  public $locationId;
  public $runtimeEndpoint;
  public $schemaGcsBucket;
  public $serviceDirectory;
  public $state;

  public function setConndSubscription($conndSubscription)
  {
    $this->conndSubscription = $conndSubscription;
  }
  public function getConndSubscription()
  {
    return $this->conndSubscription;
  }
  public function setConndTopic($conndTopic)
  {
    $this->conndTopic = $conndTopic;
  }
  public function getConndTopic()
  {
    return $this->conndTopic;
  }
  public function setControlPlaneSubscription($controlPlaneSubscription)
  {
    $this->controlPlaneSubscription = $controlPlaneSubscription;
  }
  public function getControlPlaneSubscription()
  {
    return $this->controlPlaneSubscription;
  }
  public function setControlPlaneTopic($controlPlaneTopic)
  {
    $this->controlPlaneTopic = $controlPlaneTopic;
  }
  public function getControlPlaneTopic()
  {
    return $this->controlPlaneTopic;
  }
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  public function getLocationId()
  {
    return $this->locationId;
  }
  public function setRuntimeEndpoint($runtimeEndpoint)
  {
    $this->runtimeEndpoint = $runtimeEndpoint;
  }
  public function getRuntimeEndpoint()
  {
    return $this->runtimeEndpoint;
  }
  public function setSchemaGcsBucket($schemaGcsBucket)
  {
    $this->schemaGcsBucket = $schemaGcsBucket;
  }
  public function getSchemaGcsBucket()
  {
    return $this->schemaGcsBucket;
  }
  public function setServiceDirectory($serviceDirectory)
  {
    $this->serviceDirectory = $serviceDirectory;
  }
  public function getServiceDirectory()
  {
    return $this->serviceDirectory;
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
class_alias(RuntimeConfig::class, 'Google_Service_Connectors_RuntimeConfig');
