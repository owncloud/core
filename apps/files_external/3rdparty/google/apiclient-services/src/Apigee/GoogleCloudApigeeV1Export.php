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

class GoogleCloudApigeeV1Export extends \Google\Model
{
  public $created;
  public $datastoreName;
  public $description;
  public $error;
  public $executionTime;
  public $name;
  public $self;
  public $state;
  public $updated;

  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setDatastoreName($datastoreName)
  {
    $this->datastoreName = $datastoreName;
  }
  public function getDatastoreName()
  {
    return $this->datastoreName;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setError($error)
  {
    $this->error = $error;
  }
  public function getError()
  {
    return $this->error;
  }
  public function setExecutionTime($executionTime)
  {
    $this->executionTime = $executionTime;
  }
  public function getExecutionTime()
  {
    return $this->executionTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSelf($self)
  {
    $this->self = $self;
  }
  public function getSelf()
  {
    return $this->self;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Export::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Export');
