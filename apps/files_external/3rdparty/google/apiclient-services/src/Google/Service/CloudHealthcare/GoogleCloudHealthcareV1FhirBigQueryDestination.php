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

class Google_Service_CloudHealthcare_GoogleCloudHealthcareV1FhirBigQueryDestination extends Google_Model
{
  public $datasetUri;
  public $force;
  protected $schemaConfigType = 'Google_Service_CloudHealthcare_SchemaConfig';
  protected $schemaConfigDataType = '';

  public function setDatasetUri($datasetUri)
  {
    $this->datasetUri = $datasetUri;
  }
  public function getDatasetUri()
  {
    return $this->datasetUri;
  }
  public function setForce($force)
  {
    $this->force = $force;
  }
  public function getForce()
  {
    return $this->force;
  }
  /**
   * @param Google_Service_CloudHealthcare_SchemaConfig
   */
  public function setSchemaConfig(Google_Service_CloudHealthcare_SchemaConfig $schemaConfig)
  {
    $this->schemaConfig = $schemaConfig;
  }
  /**
   * @return Google_Service_CloudHealthcare_SchemaConfig
   */
  public function getSchemaConfig()
  {
    return $this->schemaConfig;
  }
}
