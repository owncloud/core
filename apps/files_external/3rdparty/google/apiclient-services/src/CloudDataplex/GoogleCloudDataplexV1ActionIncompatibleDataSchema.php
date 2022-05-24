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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1ActionIncompatibleDataSchema extends \Google\Collection
{
  protected $collection_key = 'sampledDataLocations';
  /**
   * @var string
   */
  public $existingSchema;
  /**
   * @var string
   */
  public $newSchema;
  /**
   * @var string[]
   */
  public $sampledDataLocations;
  /**
   * @var string
   */
  public $schemaChange;
  /**
   * @var string
   */
  public $table;

  /**
   * @param string
   */
  public function setExistingSchema($existingSchema)
  {
    $this->existingSchema = $existingSchema;
  }
  /**
   * @return string
   */
  public function getExistingSchema()
  {
    return $this->existingSchema;
  }
  /**
   * @param string
   */
  public function setNewSchema($newSchema)
  {
    $this->newSchema = $newSchema;
  }
  /**
   * @return string
   */
  public function getNewSchema()
  {
    return $this->newSchema;
  }
  /**
   * @param string[]
   */
  public function setSampledDataLocations($sampledDataLocations)
  {
    $this->sampledDataLocations = $sampledDataLocations;
  }
  /**
   * @return string[]
   */
  public function getSampledDataLocations()
  {
    return $this->sampledDataLocations;
  }
  /**
   * @param string
   */
  public function setSchemaChange($schemaChange)
  {
    $this->schemaChange = $schemaChange;
  }
  /**
   * @return string
   */
  public function getSchemaChange()
  {
    return $this->schemaChange;
  }
  /**
   * @param string
   */
  public function setTable($table)
  {
    $this->table = $table;
  }
  /**
   * @return string
   */
  public function getTable()
  {
    return $this->table;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1ActionIncompatibleDataSchema::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1ActionIncompatibleDataSchema');
