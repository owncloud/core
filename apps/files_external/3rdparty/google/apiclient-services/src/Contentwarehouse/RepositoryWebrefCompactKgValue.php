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

class RepositoryWebrefCompactKgValue extends \Google\Model
{
  /**
   * @var bool
   */
  public $boolValue;
  protected $compoundValueType = RepositoryWebrefCompactKgTopic::class;
  protected $compoundValueDataType = '';
  /**
   * @var string
   */
  public $datetimeValue;
  /**
   * @var string
   */
  public $enumValue;
  public $floatValue;
  /**
   * @var string
   */
  public $idValue;
  /**
   * @var string
   */
  public $intValue;
  /**
   * @var string
   */
  public $serializedProtoValue;
  /**
   * @var string
   */
  public $textValue;
  /**
   * @var string
   */
  public $uriValue;
  /**
   * @var string
   */
  public $uriValueFprint32;

  /**
   * @param bool
   */
  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  /**
   * @return bool
   */
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  /**
   * @param RepositoryWebrefCompactKgTopic
   */
  public function setCompoundValue(RepositoryWebrefCompactKgTopic $compoundValue)
  {
    $this->compoundValue = $compoundValue;
  }
  /**
   * @return RepositoryWebrefCompactKgTopic
   */
  public function getCompoundValue()
  {
    return $this->compoundValue;
  }
  /**
   * @param string
   */
  public function setDatetimeValue($datetimeValue)
  {
    $this->datetimeValue = $datetimeValue;
  }
  /**
   * @return string
   */
  public function getDatetimeValue()
  {
    return $this->datetimeValue;
  }
  /**
   * @param string
   */
  public function setEnumValue($enumValue)
  {
    $this->enumValue = $enumValue;
  }
  /**
   * @return string
   */
  public function getEnumValue()
  {
    return $this->enumValue;
  }
  public function setFloatValue($floatValue)
  {
    $this->floatValue = $floatValue;
  }
  public function getFloatValue()
  {
    return $this->floatValue;
  }
  /**
   * @param string
   */
  public function setIdValue($idValue)
  {
    $this->idValue = $idValue;
  }
  /**
   * @return string
   */
  public function getIdValue()
  {
    return $this->idValue;
  }
  /**
   * @param string
   */
  public function setIntValue($intValue)
  {
    $this->intValue = $intValue;
  }
  /**
   * @return string
   */
  public function getIntValue()
  {
    return $this->intValue;
  }
  /**
   * @param string
   */
  public function setSerializedProtoValue($serializedProtoValue)
  {
    $this->serializedProtoValue = $serializedProtoValue;
  }
  /**
   * @return string
   */
  public function getSerializedProtoValue()
  {
    return $this->serializedProtoValue;
  }
  /**
   * @param string
   */
  public function setTextValue($textValue)
  {
    $this->textValue = $textValue;
  }
  /**
   * @return string
   */
  public function getTextValue()
  {
    return $this->textValue;
  }
  /**
   * @param string
   */
  public function setUriValue($uriValue)
  {
    $this->uriValue = $uriValue;
  }
  /**
   * @return string
   */
  public function getUriValue()
  {
    return $this->uriValue;
  }
  /**
   * @param string
   */
  public function setUriValueFprint32($uriValueFprint32)
  {
    $this->uriValueFprint32 = $uriValueFprint32;
  }
  /**
   * @return string
   */
  public function getUriValueFprint32()
  {
    return $this->uriValueFprint32;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefCompactKgValue::class, 'Google_Service_Contentwarehouse_RepositoryWebrefCompactKgValue');
