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

class ParserConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowNullHeader;
  protected $schemaType = SchemaPackage::class;
  protected $schemaDataType = '';
  /**
   * @var string
   */
  public $segmentTerminator;
  /**
   * @var string
   */
  public $version;

  /**
   * @param bool
   */
  public function setAllowNullHeader($allowNullHeader)
  {
    $this->allowNullHeader = $allowNullHeader;
  }
  /**
   * @return bool
   */
  public function getAllowNullHeader()
  {
    return $this->allowNullHeader;
  }
  /**
   * @param SchemaPackage
   */
  public function setSchema(SchemaPackage $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return SchemaPackage
   */
  public function getSchema()
  {
    return $this->schema;
  }
  /**
   * @param string
   */
  public function setSegmentTerminator($segmentTerminator)
  {
    $this->segmentTerminator = $segmentTerminator;
  }
  /**
   * @return string
   */
  public function getSegmentTerminator()
  {
    return $this->segmentTerminator;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ParserConfig::class, 'Google_Service_CloudHealthcare_ParserConfig');
