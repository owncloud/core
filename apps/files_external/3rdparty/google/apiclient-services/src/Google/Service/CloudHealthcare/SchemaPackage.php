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

class Google_Service_CloudHealthcare_SchemaPackage extends Google_Collection
{
  protected $collection_key = 'types';
  public $ignoreMinOccurs;
  protected $schemasType = 'Google_Service_CloudHealthcare_Hl7SchemaConfig';
  protected $schemasDataType = 'array';
  public $schematizedParsingType;
  protected $typesType = 'Google_Service_CloudHealthcare_Hl7TypesConfig';
  protected $typesDataType = 'array';

  public function setIgnoreMinOccurs($ignoreMinOccurs)
  {
    $this->ignoreMinOccurs = $ignoreMinOccurs;
  }
  public function getIgnoreMinOccurs()
  {
    return $this->ignoreMinOccurs;
  }
  /**
   * @param Google_Service_CloudHealthcare_Hl7SchemaConfig[]
   */
  public function setSchemas($schemas)
  {
    $this->schemas = $schemas;
  }
  /**
   * @return Google_Service_CloudHealthcare_Hl7SchemaConfig[]
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
   * @param Google_Service_CloudHealthcare_Hl7TypesConfig[]
   */
  public function setTypes($types)
  {
    $this->types = $types;
  }
  /**
   * @return Google_Service_CloudHealthcare_Hl7TypesConfig[]
   */
  public function getTypes()
  {
    return $this->types;
  }
}
