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

namespace Google\Service\Bigquery;

class QueryParameter extends \Google\Model
{
  /**
   * @var string
   */
  public $name;
  protected $parameterTypeType = QueryParameterType::class;
  protected $parameterTypeDataType = '';
  protected $parameterValueType = QueryParameterValue::class;
  protected $parameterValueDataType = '';

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
   * @param QueryParameterType
   */
  public function setParameterType(QueryParameterType $parameterType)
  {
    $this->parameterType = $parameterType;
  }
  /**
   * @return QueryParameterType
   */
  public function getParameterType()
  {
    return $this->parameterType;
  }
  /**
   * @param QueryParameterValue
   */
  public function setParameterValue(QueryParameterValue $parameterValue)
  {
    $this->parameterValue = $parameterValue;
  }
  /**
   * @return QueryParameterValue
   */
  public function getParameterValue()
  {
    return $this->parameterValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueryParameter::class, 'Google_Service_Bigquery_QueryParameter');
