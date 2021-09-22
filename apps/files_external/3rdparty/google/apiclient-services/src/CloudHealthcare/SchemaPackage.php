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

namespace Google\Service\CloudHealthcare;

class SchemaPackage extends \Google\Collection
{
  protected $collection_key = 'types';
  public $ignoreMinOccurs;
  protected $schemasType = Hl7SchemaConfig::class;
  protected $schemasDataType = 'array';
  public $schematizedParsingType;
  protected $typesType = Hl7TypesConfig::class;
  protected $typesDataType = 'array';
  public $unexpectedSegmentHandling;

  public function setIgnoreMinOccurs($ignoreMinOccurs)
  {
    $this->ignoreMinOccurs = $ignoreMinOccurs;
  }
  public function getIgnoreMinOccurs()
  {
    return $this->ignoreMinOccurs;
  }
  /**
   * @param Hl7SchemaConfig[]
   */
  public function setSchemas($schemas)
  {
    $this->schemas = $schemas;
  }
  /**
   * @return Hl7SchemaConfig[]
   */
  public function getSchemas()
  {
    return $this->schemas;
  }
  public function setSchematizedParsingType($schematizedParsingType)
  {
    $this->schematizedParsingType = $schematizedParsingType;
  }
  public function getSchematizedParsingType()
  {
    return $this->schematizedParsingType;
  }
  /**
   * @param Hl7TypesConfig[]
   */
  public function setTypes($types)
  {
    $this->types = $types;
  }
  /**
   * @return Hl7TypesConfig[]
   */
  public function getTypes()
  {
    return $this->types;
  }
  public function setUnexpectedSegmentHandling($unexpectedSegmentHandling)
  {
    $this->unexpectedSegmentHandling = $unexpectedSegmentHandling;
  }
  public function getUnexpectedSegmentHandling()
  {
    return $this->unexpectedSegmentHandling;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SchemaPackage::class, 'Google_Service_CloudHealthcare_SchemaPackage');
