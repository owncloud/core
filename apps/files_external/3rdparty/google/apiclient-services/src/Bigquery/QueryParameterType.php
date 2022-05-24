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

class QueryParameterType extends \Google\Collection
{
  protected $collection_key = 'structTypes';
  protected $arrayTypeType = QueryParameterType::class;
  protected $arrayTypeDataType = '';
  protected $structTypesType = QueryParameterTypeStructTypes::class;
  protected $structTypesDataType = 'array';
  /**
   * @var string
   */
  public $type;

  /**
   * @param QueryParameterType
   */
  public function setArrayType(QueryParameterType $arrayType)
  {
    $this->arrayType = $arrayType;
  }
  /**
   * @return QueryParameterType
   */
  public function getArrayType()
  {
    return $this->arrayType;
  }
  /**
   * @param QueryParameterTypeStructTypes[]
   */
  public function setStructTypes($structTypes)
  {
    $this->structTypes = $structTypes;
  }
  /**
   * @return QueryParameterTypeStructTypes[]
   */
  public function getStructTypes()
  {
    return $this->structTypes;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueryParameterType::class, 'Google_Service_Bigquery_QueryParameterType');
