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

class AssistantDevicesPlatformProtoIntent extends \Google\Collection
{
  protected $collection_key = 'triggerConditions';
  protected $argSpecsType = AssistantDevicesPlatformProtoArgSpec::class;
  protected $argSpecsDataType = 'map';
  protected $executionConfigType = AssistantDevicesPlatformProtoExecutionConfig::class;
  protected $executionConfigDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $providedDataNames;
  protected $securityConfigType = AssistantDevicesPlatformProtoSecurityConfig::class;
  protected $securityConfigDataType = '';
  protected $triggerConditionsType = AssistantDevicesPlatformProtoTriggerCondition::class;
  protected $triggerConditionsDataType = 'array';

  /**
   * @param AssistantDevicesPlatformProtoArgSpec[]
   */
  public function setArgSpecs($argSpecs)
  {
    $this->argSpecs = $argSpecs;
  }
  /**
   * @return AssistantDevicesPlatformProtoArgSpec[]
   */
  public function getArgSpecs()
  {
    return $this->argSpecs;
  }
  /**
   * @param AssistantDevicesPlatformProtoExecutionConfig
   */
  public function setExecutionConfig(AssistantDevicesPlatformProtoExecutionConfig $executionConfig)
  {
    $this->executionConfig = $executionConfig;
  }
  /**
   * @return AssistantDevicesPlatformProtoExecutionConfig
   */
  public function getExecutionConfig()
  {
    return $this->executionConfig;
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
   * @param string[]
   */
  public function setProvidedDataNames($providedDataNames)
  {
    $this->providedDataNames = $providedDataNames;
  }
  /**
   * @return string[]
   */
  public function getProvidedDataNames()
  {
    return $this->providedDataNames;
  }
  /**
   * @param AssistantDevicesPlatformProtoSecurityConfig
   */
  public function setSecurityConfig(AssistantDevicesPlatformProtoSecurityConfig $securityConfig)
  {
    $this->securityConfig = $securityConfig;
  }
  /**
   * @return AssistantDevicesPlatformProtoSecurityConfig
   */
  public function getSecurityConfig()
  {
    return $this->securityConfig;
  }
  /**
   * @param AssistantDevicesPlatformProtoTriggerCondition[]
   */
  public function setTriggerConditions($triggerConditions)
  {
    $this->triggerConditions = $triggerConditions;
  }
  /**
   * @return AssistantDevicesPlatformProtoTriggerCondition[]
   */
  public function getTriggerConditions()
  {
    return $this->triggerConditions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantDevicesPlatformProtoIntent::class, 'Google_Service_Contentwarehouse_AssistantDevicesPlatformProtoIntent');
