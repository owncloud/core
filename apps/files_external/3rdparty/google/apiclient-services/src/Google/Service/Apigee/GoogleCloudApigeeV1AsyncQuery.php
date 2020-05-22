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

class Google_Service_Apigee_GoogleCloudApigeeV1AsyncQuery extends Google_Model
{
  public $created;
  public $error;
  public $executionTime;
  public $name;
  protected $queryParamsType = 'Google_Service_Apigee_GoogleCloudApigeeV1QueryMetadata';
  protected $queryParamsDataType = '';
  public $reportDefinitionId;
  protected $resultType = 'Google_Service_Apigee_GoogleCloudApigeeV1AsyncQueryResult';
  protected $resultDataType = '';
  public $resultFileSize;
  public $resultRows;
  public $self;
  public $state;
  public $updated;

  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setError($error)
  {
    $this->error = $error;
  }
  public function getError()
  {
    return $this->error;
  }
  public function setExecutionTime($executionTime)
  {
    $this->executionTime = $executionTime;
  }
  public function getExecutionTime()
  {
    return $this->executionTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1QueryMetadata
   */
  public function setQueryParams(Google_Service_Apigee_GoogleCloudApigeeV1QueryMetadata $queryParams)
  {
    $this->queryParams = $queryParams;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1QueryMetadata
   */
  public function getQueryParams()
  {
    return $this->queryParams;
  }
  public function setReportDefinitionId($reportDefinitionId)
  {
    $this->reportDefinitionId = $reportDefinitionId;
  }
  public function getReportDefinitionId()
  {
    return $this->reportDefinitionId;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1AsyncQueryResult
   */
  public function setResult(Google_Service_Apigee_GoogleCloudApigeeV1AsyncQueryResult $result)
  {
    $this->result = $result;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1AsyncQueryResult
   */
  public function getResult()
  {
    return $this->result;
  }
  public function setResultFileSize($resultFileSize)
  {
    $this->resultFileSize = $resultFileSize;
  }
  public function getResultFileSize()
  {
    return $this->resultFileSize;
  }
  public function setResultRows($resultRows)
  {
    $this->resultRows = $resultRows;
  }
  public function getResultRows()
  {
    return $this->resultRows;
  }
  public function setSelf($self)
  {
    $this->self = $self;
  }
  public function getSelf()
  {
    return $this->self;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
}
