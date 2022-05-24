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

namespace Google\Service\BigQueryDataTransfer;

class DataSourceParameter extends \Google\Collection
{
  protected $collection_key = 'fields';
  /**
   * @var string[]
   */
  public $allowedValues;
  /**
   * @var bool
   */
  public $deprecated;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  protected $fieldsType = DataSourceParameter::class;
  protected $fieldsDataType = 'array';
  /**
   * @var bool
   */
  public $immutable;
  public $maxValue;
  public $minValue;
  /**
   * @var string
   */
  public $paramId;
  /**
   * @var bool
   */
  public $recurse;
  /**
   * @var bool
   */
  public $repeated;
  /**
   * @var bool
   */
  public $required;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $validationDescription;
  /**
   * @var string
   */
  public $validationHelpUrl;
  /**
   * @var string
   */
  public $validationRegex;

  /**
   * @param string[]
   */
  public function setAllowedValues($allowedValues)
  {
    $this->allowedValues = $allowedValues;
  }
  /**
   * @return string[]
   */
  public function getAllowedValues()
  {
    return $this->allowedValues;
  }
  /**
   * @param bool
   */
  public function setDeprecated($deprecated)
  {
    $this->deprecated = $deprecated;
  }
  /**
   * @return bool
   */
  public function getDeprecated()
  {
    return $this->deprecated;
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
   * @param DataSourceParameter[]
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return DataSourceParameter[]
   */
  public function getFields()
  {
    return $this->fields;
  }
  /**
   * @param bool
   */
  public function setImmutable($immutable)
  {
    $this->immutable = $immutable;
  }
  /**
   * @return bool
   */
  public function getImmutable()
  {
    return $this->immutable;
  }
  public function setMaxValue($maxValue)
  {
    $this->maxValue = $maxValue;
  }
  public function getMaxValue()
  {
    return $this->maxValue;
  }
  public function setMinValue($minValue)
  {
    $this->minValue = $minValue;
  }
  public function getMinValue()
  {
    return $this->minValue;
  }
  /**
   * @param string
   */
  public function setParamId($paramId)
  {
    $this->paramId = $paramId;
  }
  /**
   * @return string
   */
  public function getParamId()
  {
    return $this->paramId;
  }
  /**
   * @param bool
   */
  public function setRecurse($recurse)
  {
    $this->recurse = $recurse;
  }
  /**
   * @return bool
   */
  public function getRecurse()
  {
    return $this->recurse;
  }
  /**
   * @param bool
   */
  public function setRepeated($repeated)
  {
    $this->repeated = $repeated;
  }
  /**
   * @return bool
   */
  public function getRepeated()
  {
    return $this->repeated;
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
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setValidationDescription($validationDescription)
  {
    $this->validationDescription = $validationDescription;
  }
  /**
   * @return string
   */
  public function getValidationDescription()
  {
    return $this->validationDescription;
  }
  /**
   * @param string
   */
  public function setValidationHelpUrl($validationHelpUrl)
  {
    $this->validationHelpUrl = $validationHelpUrl;
  }
  /**
   * @return string
   */
  public function getValidationHelpUrl()
  {
    return $this->validationHelpUrl;
  }
  /**
   * @param string
   */
  public function setValidationRegex($validationRegex)
  {
    $this->validationRegex = $validationRegex;
  }
  /**
   * @return string
   */
  public function getValidationRegex()
  {
    return $this->validationRegex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataSourceParameter::class, 'Google_Service_BigQueryDataTransfer_DataSourceParameter');
