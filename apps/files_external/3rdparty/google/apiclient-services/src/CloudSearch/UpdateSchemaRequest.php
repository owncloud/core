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

namespace Google\Service\CloudSearch;

class UpdateSchemaRequest extends \Google\Model
{
  protected $debugOptionsType = DebugOptions::class;
  protected $debugOptionsDataType = '';
  protected $schemaType = Schema::class;
  protected $schemaDataType = '';
  /**
   * @var bool
   */
  public $validateOnly;

  /**
   * @param DebugOptions
   */
  public function setDebugOptions(DebugOptions $debugOptions)
  {
    $this->debugOptions = $debugOptions;
  }
  /**
   * @return DebugOptions
   */
  public function getDebugOptions()
  {
    return $this->debugOptions;
  }
  /**
   * @param Schema
   */
  public function setSchema(Schema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return Schema
   */
  public function getSchema()
  {
    return $this->schema;
  }
  /**
   * @param bool
   */
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  /**
   * @return bool
   */
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateSchemaRequest::class, 'Google_Service_CloudSearch_UpdateSchemaRequest');
