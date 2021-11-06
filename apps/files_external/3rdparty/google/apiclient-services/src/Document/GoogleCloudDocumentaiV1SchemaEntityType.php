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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1SchemaEntityType extends \Google\Collection
{
  protected $collection_key = 'properties';
  public $baseType;
  public $description;
  public $enumValues;
  public $occurrenceType;
  protected $propertiesType = GoogleCloudDocumentaiV1SchemaEntityType::class;
  protected $propertiesDataType = 'array';
  public $source;
  public $type;

  public function setBaseType($baseType)
  {
    $this->baseType = $baseType;
  }
  public function getBaseType()
  {
    return $this->baseType;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEnumValues($enumValues)
  {
    $this->enumValues = $enumValues;
  }
  public function getEnumValues()
  {
    return $this->enumValues;
  }
  public function setOccurrenceType($occurrenceType)
  {
    $this->occurrenceType = $occurrenceType;
  }
  public function getOccurrenceType()
  {
    return $this->occurrenceType;
  }
  /**
   * @param GoogleCloudDocumentaiV1SchemaEntityType[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return GoogleCloudDocumentaiV1SchemaEntityType[]
   */
  public function getProperties()
  {
    return $this->properties;
  }
  public function setSource($source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1SchemaEntityType::class, 'Google_Service_Document_GoogleCloudDocumentaiV1SchemaEntityType');
