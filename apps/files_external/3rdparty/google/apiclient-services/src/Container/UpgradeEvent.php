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

namespace Google\Service\Container;

class UpgradeEvent extends \Google\Model
{
  public $currentVersion;
  public $operation;
  public $operationStartTime;
  public $resource;
  public $resourceType;
  public $targetVersion;

  public function setCurrentVersion($currentVersion)
  {
    $this->currentVersion = $currentVersion;
  }
  public function getCurrentVersion()
  {
    return $this->currentVersion;
  }
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
  public function setOperationStartTime($operationStartTime)
  {
    $this->operationStartTime = $operationStartTime;
  }
  public function getOperationStartTime()
  {
    return $this->operationStartTime;
  }
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  public function getResource()
  {
    return $this->resource;
  }
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  public function getResourceType()
  {
    return $this->resourceType;
  }
  public function setTargetVersion($targetVersion)
  {
    $this->targetVersion = $targetVersion;
  }
  public function getTargetVersion()
  {
    return $this->targetVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpgradeEvent::class, 'Google_Service_Container_UpgradeEvent');
