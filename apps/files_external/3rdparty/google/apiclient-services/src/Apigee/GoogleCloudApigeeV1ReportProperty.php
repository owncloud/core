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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1ReportProperty extends \Google\Collection
{
  protected $collection_key = 'value';
  /**
   * @var string
   */
  public $property;
  protected $valueType = GoogleCloudApigeeV1Attribute::class;
  protected $valueDataType = 'array';

  /**
   * @param string
   */
  public function setProperty($property)
  {
    $this->property = $property;
  }
  /**
   * @return string
   */
  public function getProperty()
  {
    return $this->property;
  }
  /**
   * @param GoogleCloudApigeeV1Attribute[]
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return GoogleCloudApigeeV1Attribute[]
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1ReportProperty::class, 'Google_Service_Apigee_GoogleCloudApigeeV1ReportProperty');
