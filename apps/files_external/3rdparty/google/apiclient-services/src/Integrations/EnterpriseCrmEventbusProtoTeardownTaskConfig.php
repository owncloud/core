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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoTeardownTaskConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $creatorEmail;
  /**
   * @var string
   */
  public $name;
  protected $nextTeardownTaskType = EnterpriseCrmEventbusProtoNextTeardownTask::class;
  protected $nextTeardownTaskDataType = '';
  protected $parametersType = EnterpriseCrmEventbusProtoEventParameters::class;
  protected $parametersDataType = '';
  protected $propertiesType = EnterpriseCrmEventbusProtoEventBusProperties::class;
  protected $propertiesDataType = '';
  /**
   * @var string
   */
  public $teardownTaskImplementationClassName;

  /**
   * @param string
   */
  public function setCreatorEmail($creatorEmail)
  {
    $this->creatorEmail = $creatorEmail;
  }
  /**
   * @return string
   */
  public function getCreatorEmail()
  {
    return $this->creatorEmail;
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
   * @param EnterpriseCrmEventbusProtoNextTeardownTask
   */
  public function setNextTeardownTask(EnterpriseCrmEventbusProtoNextTeardownTask $nextTeardownTask)
  {
    $this->nextTeardownTask = $nextTeardownTask;
  }
  /**
   * @return EnterpriseCrmEventbusProtoNextTeardownTask
   */
  public function getNextTeardownTask()
  {
    return $this->nextTeardownTask;
  }
  /**
   * @param EnterpriseCrmEventbusProtoEventParameters
   */
  public function setParameters(EnterpriseCrmEventbusProtoEventParameters $parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return EnterpriseCrmEventbusProtoEventParameters
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param EnterpriseCrmEventbusProtoEventBusProperties
   */
  public function setProperties(EnterpriseCrmEventbusProtoEventBusProperties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return EnterpriseCrmEventbusProtoEventBusProperties
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param string
   */
  public function setTeardownTaskImplementationClassName($teardownTaskImplementationClassName)
  {
    $this->teardownTaskImplementationClassName = $teardownTaskImplementationClassName;
  }
  /**
   * @return string
   */
  public function getTeardownTaskImplementationClassName()
  {
    return $this->teardownTaskImplementationClassName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoTeardownTaskConfig::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoTeardownTaskConfig');
