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

class EnterpriseCrmEventbusProtoAttributes extends \Google\Collection
{
  protected $collection_key = 'taskVisibility';
  /**
   * @var string
   */
  public $dataType;
  protected $defaultValueType = EnterpriseCrmEventbusProtoValueType::class;
  protected $defaultValueDataType = '';
  /**
   * @var bool
   */
  public $isRequired;
  /**
   * @var bool
   */
  public $isSearchable;
  protected $logSettingsType = EnterpriseCrmEventbusProtoLogSettings::class;
  protected $logSettingsDataType = '';
  /**
   * @var string
   */
  public $searchable;
  /**
   * @var string[]
   */
  public $taskVisibility;

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
   * @param EnterpriseCrmEventbusProtoValueType
   */
  public function setDefaultValue(EnterpriseCrmEventbusProtoValueType $defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  /**
   * @return EnterpriseCrmEventbusProtoValueType
   */
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  /**
   * @param bool
   */
  public function setIsRequired($isRequired)
  {
    $this->isRequired = $isRequired;
  }
  /**
   * @return bool
   */
  public function getIsRequired()
  {
    return $this->isRequired;
  }
  /**
   * @param bool
   */
  public function setIsSearchable($isSearchable)
  {
    $this->isSearchable = $isSearchable;
  }
  /**
   * @return bool
   */
  public function getIsSearchable()
  {
    return $this->isSearchable;
  }
  /**
   * @param EnterpriseCrmEventbusProtoLogSettings
   */
  public function setLogSettings(EnterpriseCrmEventbusProtoLogSettings $logSettings)
  {
    $this->logSettings = $logSettings;
  }
  /**
   * @return EnterpriseCrmEventbusProtoLogSettings
   */
  public function getLogSettings()
  {
    return $this->logSettings;
  }
  /**
   * @param string
   */
  public function setSearchable($searchable)
  {
    $this->searchable = $searchable;
  }
  /**
   * @return string
   */
  public function getSearchable()
  {
    return $this->searchable;
  }
  /**
   * @param string[]
   */
  public function setTaskVisibility($taskVisibility)
  {
    $this->taskVisibility = $taskVisibility;
  }
  /**
   * @return string[]
   */
  public function getTaskVisibility()
  {
    return $this->taskVisibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoAttributes::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoAttributes');
