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
  /**
   * @var string
   */
  public $created;
  /**
   * @var string
   */
  public $datastoreName;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $error;
  /**
   * @var string
   */
  public $executionTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $self;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $updated;

  /**
   * @param string
   */
  public function setCreated($created)
  {
    $this->created = $created;
  }
  /**
   * @return string
   */
  public function getCreated()
  {
    return $this->created;
  }
  /**
   * @param string
   */
  public function setDatastoreName($datastoreName)
  {
    $this->datastoreName = $datastoreName;
  }
  /**
   * @return string
   */
  public function getDatastoreName()
  {
    return $this->datastoreName;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setError($error)
  {
    $this->error = $error;
  }
  /**
   * @return string
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param string
   */
  public function setExecutionTime($executionTime)
  {
    $this->executionTime = $executionTime;
  }
  /**
   * @return string
   */
  public function getExecutionTime()
  {
    return $this->executionTime;
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
  public function setSelf($self)
  {
    $this->self = $self;
  }
  /**
   * @return string
   */
  public function getSelf()
  {
    return $this->self;
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
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Export::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Export');
