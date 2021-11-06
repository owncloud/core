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

class QueryParameterTypeStructTypes extends \Google\Model
{
  public $description;
  public $name;
  protected $typeType = QueryParameterType::class;
  protected $typeDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param QueryParameterType
   */
  public function setType(QueryParameterType $type)
  {
    $this->type = $type;
  }
  /**
   * @return QueryParameterType
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueryParameterTypeStructTypes::class, 'Google_Service_Bigquery_QueryParameterTypeStructTypes');
