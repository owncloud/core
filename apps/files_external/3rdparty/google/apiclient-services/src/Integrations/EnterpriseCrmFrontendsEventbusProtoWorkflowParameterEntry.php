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

class EnterpriseCrmFrontendsEventbusProtoWorkflowParameterEntry extends \Google\Collection
{
  protected $collection_key = 'children';
  protected $attributesType = EnterpriseCrmEventbusProtoAttributes::class;
  protected $attributesDataType = '';
  protected $childrenType = EnterpriseCrmFrontendsEventbusProtoWorkflowParameterEntry::class;
  protected $childrenDataType = 'array';
  /**
   * @var string
   */
  public $dataType;
  protected $defaultValueType = EnterpriseCrmFrontendsEventbusProtoParameterValueType::class;
  protected $defaultValueDataType = '';
  /**
   * @var string
   */
  public $inOutType;
  /**
   * @var bool
   */
  public $isTransient;
  /**
   * @var string
   */
  public $jsonSchema;
  /**
   * @var string
   */
  public $key;
  /**
   * @var string
   */
  public $name;
  protected $producedByType = EnterpriseCrmEventbusProtoNodeIdentifier::class;
  protected $producedByDataType = '';
  /**
   * @var string
   */
  public $producer;
  /**
   * @var string
   */
  public $protoDefName;
  /**
   * @var string
   */
  public $protoDefPath;

  /**
   * @param EnterpriseCrmEventbusProtoAttributes
   */
  public function setAttributes(EnterpriseCrmEventbusProtoAttributes $attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return EnterpriseCrmEventbusProtoAttributes
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoWorkflowParameterEntry[]
   */
  public function setChildren($children)
  {
    $this->children = $children;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoWorkflowParameterEntry[]
   */
  public function getChildren()
  {
    return $this->children;
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
   * @param string
   */
  public function setInOutType($inOutType)
  {
    $this->inOutType = $inOutType;
  }
  /**
   * @return string
   */
  public function getInOutType()
  {
    return $this->inOutType;
  }
  /**
   * @param bool
   */
  public function setIsTransient($isTransient)
  {
    $this->isTransient = $isTransient;
  }
  /**
   * @return bool
   */
  public function getIsTransient()
  {
    return $this->isTransient;
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
   * @param EnterpriseCrmEventbusProtoNodeIdentifier
   */
  public function setProducedBy(EnterpriseCrmEventbusProtoNodeIdentifier $producedBy)
  {
    $this->producedBy = $producedBy;
  }
  /**
   * @return EnterpriseCrmEventbusProtoNodeIdentifier
   */
  public function getProducedBy()
  {
    return $this->producedBy;
  }
  /**
   * @param string
   */
  public function setProducer($producer)
  {
    $this->producer = $producer;
  }
  /**
   * @return string
   */
  public function getProducer()
  {
    return $this->producer;
  }
  /**
   * @param string
   */
  public function setProtoDefName($protoDefName)
  {
    $this->protoDefName = $protoDefName;
  }
  /**
   * @return string
   */
  public function getProtoDefName()
  {
    return $this->protoDefName;
  }
  /**
   * @param string
   */
  public function setProtoDefPath($protoDefPath)
  {
    $this->protoDefPath = $protoDefPath;
  }
  /**
   * @return string
   */
  public function getProtoDefPath()
  {
    return $this->protoDefPath;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmFrontendsEventbusProtoWorkflowParameterEntry::class, 'Google_Service_Integrations_EnterpriseCrmFrontendsEventbusProtoWorkflowParameterEntry');
