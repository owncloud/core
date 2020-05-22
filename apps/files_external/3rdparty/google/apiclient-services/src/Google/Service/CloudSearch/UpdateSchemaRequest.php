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

class Google_Service_CloudSearch_UpdateSchemaRequest extends Google_Model
{
  protected $debugOptionsType = 'Google_Service_CloudSearch_DebugOptions';
  protected $debugOptionsDataType = '';
  protected $schemaType = 'Google_Service_CloudSearch_Schema';
  protected $schemaDataType = '';
  public $validateOnly;

  /**
   * @param Google_Service_CloudSearch_DebugOptions
   */
  public function setDebugOptions(Google_Service_CloudSearch_DebugOptions $debugOptions)
  {
    $this->debugOptions = $debugOptions;
  }
  /**
   * @return Google_Service_CloudSearch_DebugOptions
   */
  public function getDebugOptions()
  {
    return $this->debugOptions;
  }
  /**
   * @param Google_Service_CloudSearch_Schema
   */
  public function setSchema(Google_Service_CloudSearch_Schema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return Google_Service_CloudSearch_Schema
   */
  public function getSchema()
  {
    return $this->schema;
  }
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
}
