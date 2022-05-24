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

namespace Google\Service\Monitoring;

class CollectdValue extends \Google\Model
{
  /**
   * @var string
   */
  public $dataSourceName;
  /**
   * @var string
   */
  public $dataSourceType;
  protected $valueType = TypedValue::class;
  protected $valueDataType = '';

  /**
   * @param string
   */
  public function setDataSourceName($dataSourceName)
  {
    $this->dataSourceName = $dataSourceName;
  }
  /**
   * @return string
   */
  public function getDataSourceName()
  {
    return $this->dataSourceName;
  }
  /**
   * @param string
   */
  public function setDataSourceType($dataSourceType)
  {
    $this->dataSourceType = $dataSourceType;
  }
  /**
   * @return string
   */
  public function getDataSourceType()
  {
    return $this->dataSourceType;
  }
  /**
   * @param TypedValue
   */
  public function setValue(TypedValue $value)
  {
    $this->value = $value;
  }
  /**
   * @return TypedValue
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CollectdValue::class, 'Google_Service_Monitoring_CollectdValue');
