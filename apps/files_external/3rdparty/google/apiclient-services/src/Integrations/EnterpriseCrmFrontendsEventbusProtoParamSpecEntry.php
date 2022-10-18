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

class EnterpriseCrmFrontendsEventbusProtoParamSpecEntry extends \Google\Model
{
  /**
   * @var string
   */
  public $className;
  /**
   * @var string
   */
  public $collectionElementClassName;
  protected $configType = EnterpriseCrmEventbusProtoParamSpecEntryConfig::class;
  protected $configDataType = '';
  /**
   * @var string
   */
  public $dataType;
  protected $defaultValueType = EnterpriseCrmFrontendsEventbusProtoParameterValueType::class;
  protected $defaultValueDataType = '';
  /**
   * @var bool
   */
  public $isDeprecated;
  /**
   * @var bool
   */
  public $isOutput;
  /**
   * @var string
   */
  public $jsonSchema;
  /**
   * @var string
   */
  public $key;
  protected $protoDefType = EnterpriseCrmEventbusProtoParamSpecEntryProtoDefinition::class;
  protected $protoDefDataType = '';
  /**
   * @var bool
   */
  public $required;
  protected $validationRuleType = EnterpriseCrmEventbusProtoParamSpecEntryValidationRule::class;
  protected $validationRuleDataType = '';

  /**
   * @param string
   */
  public function setClassName($className)
  {
    $this->className = $className;
  }
  /**
   * @return string
   */
  public function getClassName()
  {
    return $this->className;
  }
  /**
   * @param string
   */
  public function setCollectionElementClassName($collectionElementClassName)
  {
    $this->collectionElementClassName = $collectionElementClassName;
  }
  /**
   * @return string
   */
  public function getCollectionElementClassName()
  {
    return $this->collectionElementClassName;
  }
  /**
   * @param EnterpriseCrmEventbusProtoParamSpecEntryConfig
   */
  public function setConfig(EnterpriseCrmEventbusProtoParamSpecEntryConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return EnterpriseCrmEventbusProtoParamSpecEntryConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  /**
   * @param string
   */
  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  /**
   * @return string
   */
  public function getDataType()
  {
    return $this->dataType;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoParameterValueType
   */
  public function setDefaultValue(EnterpriseCrmFrontendsEventbusProtoParameterValueType $defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoParameterValueType
   */
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  /**
   * @param bool
   */
  public function setIsDeprecated($isDeprecated)
  {
    $this->isDeprecated = $isDeprecated;
  }
  /**
   * @return bool
   */
  public function getIsDeprecated()
  {
    return $this->isDeprecated;
  }
  /**
   * @param bool
   */
  public function setIsOutput($isOutput)
  {
    $this->isOutput = $isOutput;
  }
  /**
   * @return bool
   */
  public function getIsOutput()
  {
    return $this->isOutput;
  }
  /**
   * @param string
   */
  public function setJsonSchema($jsonSchema)
  {
    $this->jsonSchema = $jsonSchema;
  }
  /**
   * @return string
   */
  public function getJsonSchema()
  {
    return $this->jsonSchema;
  }
  /**
   * @param string
   */
  public function setKey($key)
  {
    $this->key = $key;
  }
  /**
   * @return string
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param EnterpriseCrmEventbusProtoParamSpecEntryProtoDefinition
   */
  public function setProtoDef(EnterpriseCrmEventbusProtoParamSpecEntryProtoDefinition $protoDef)
  {
    $this->protoDef = $protoDef;
  }
  /**
   * @return EnterpriseCrmEventbusProtoParamSpecEntryProtoDefinition
   */
  public function getProtoDef()
  {
    return $this->protoDef;
  }
  /**
   * @param bool
   */
  public function setRequired($required)
  {
    $this->required = $required;
  }
  /**
   * @return bool
   */
  public function getRequired()
  {
    return $this->required;
  }
  /**
   * @param EnterpriseCrmEventbusProtoParamSpecEntryValidationRule
   */
  public function setValidationRule(EnterpriseCrmEventbusProtoParamSpecEntryValidationRule $validationRule)
  {
    $this->validationRule = $validationRule;
  }
  /**
   * @return EnterpriseCrmEventbusProtoParamSpecEntryValidationRule
   */
  public function getValidationRule()
  {
    return $this->validationRule;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmFrontendsEventbusProtoParamSpecEntry::class, 'Google_Service_Integrations_EnterpriseCrmFrontendsEventbusProtoParamSpecEntry');
