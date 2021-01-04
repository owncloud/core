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

class Google_Service_Apigee_GoogleCloudApigeeV1AsyncQueryResultView extends Google_Collection
{
  protected $collection_key = 'rows';
  public $code;
  public $error;
  protected $metadataType = 'Google_Service_Apigee_GoogleCloudApigeeV1QueryMetadata';
  protected $metadataDataType = '';
  public $rows;
  public $state;

  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
  }
  public function setError($error)
  {
    $this->error = $error;
  }
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1QueryMetadata
   */
  public function setMetadata(Google_Service_Apigee_GoogleCloudApigeeV1QueryMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1QueryMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  public function getRows()
  {
    return $this->rows;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
