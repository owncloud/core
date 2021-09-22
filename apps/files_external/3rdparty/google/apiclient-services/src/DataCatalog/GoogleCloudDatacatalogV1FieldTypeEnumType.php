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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1FieldTypeEnumType extends \Google\Collection
{
  protected $collection_key = 'allowedValues';
  protected $allowedValuesType = GoogleCloudDatacatalogV1FieldTypeEnumTypeEnumValue::class;
  protected $allowedValuesDataType = 'array';

  /**
   * @param GoogleCloudDatacatalogV1FieldTypeEnumTypeEnumValue[]
   */
  public function setAllowedValues($allowedValues)
  {
    $this->allowedValues = $allowedValues;
  }
  /**
   * @return GoogleCloudDatacatalogV1FieldTypeEnumTypeEnumValue[]
   */
  public function getAllowedValues()
  {
    return $this->allowedValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1FieldTypeEnumType::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1FieldTypeEnumType');
