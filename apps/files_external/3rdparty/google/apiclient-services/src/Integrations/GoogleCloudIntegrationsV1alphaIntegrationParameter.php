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

class GoogleCloudIntegrationsV1alphaIntegrationParameter extends \Google\Model
{
  /**
   * @var string
   */
  public $dataType;
  protected $defaultValueType = GoogleCloudIntegrationsV1alphaValueType::class;
  protected $defaultValueDataType = '';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $inputOutputType;
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
  public $producer;
  /**
   * @var bool
   */
  public $searchable;

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
   * @param GoogleCloudIntegrationsV1alphaValueType
   */
  public function setDefaultValue(GoogleCloudIntegrationsV1alphaValueType $defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaValueType
   */
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setInputOutputType($inputOutputType)
  {
    $this->inputOutputType = $inputOutputType;
  }
  /**
   * @return string
   */
  public function getInputOutputType()
  {
    return $this->inputOutputType;
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
   * @param bool
   */
  public function setSearchable($searchable)
  {
    $this->searchable = $searchable;
  }
  /**
   * @return bool
   */
  public function getSearchable()
  {
    return $this->searchable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaIntegrationParameter::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaIntegrationParameter');
