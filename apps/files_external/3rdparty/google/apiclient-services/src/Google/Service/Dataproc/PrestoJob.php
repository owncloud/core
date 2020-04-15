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

class Google_Service_Dataproc_PrestoJob extends Google_Collection
{
  protected $collection_key = 'clientTags';
  public $clientTags;
  public $continueOnFailure;
  protected $loggingConfigType = 'Google_Service_Dataproc_LoggingConfig';
  protected $loggingConfigDataType = '';
  public $outputFormat;
  public $properties;
  public $queryFileUri;
  protected $queryListType = 'Google_Service_Dataproc_QueryList';
  protected $queryListDataType = '';

  public function setClientTags($clientTags)
  {
    $this->clientTags = $clientTags;
  }
  public function getClientTags()
  {
    return $this->clientTags;
  }
  public function setContinueOnFailure($continueOnFailure)
  {
    $this->continueOnFailure = $continueOnFailure;
  }
  public function getContinueOnFailure()
  {
    return $this->continueOnFailure;
  }
  /**
   * @param Google_Service_Dataproc_LoggingConfig
   */
  public function setLoggingConfig(Google_Service_Dataproc_LoggingConfig $loggingConfig)
  {
    $this->loggingConfig = $loggingConfig;
  }
  /**
   * @return Google_Service_Dataproc_LoggingConfig
   */
  public function getLoggingConfig()
  {
    return $this->loggingConfig;
  }
  public function setOutputFormat($outputFormat)
  {
    $this->outputFormat = $outputFormat;
  }
  public function getOutputFormat()
  {
    return $this->outputFormat;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
  public function setQueryFileUri($queryFileUri)
  {
    $this->queryFileUri = $queryFileUri;
  }
  public function getQueryFileUri()
  {
    return $this->queryFileUri;
  }
  /**
   * @param Google_Service_Dataproc_QueryList
   */
  public function setQueryList(Google_Service_Dataproc_QueryList $queryList)
  {
    $this->queryList = $queryList;
  }
  /**
   * @return Google_Service_Dataproc_QueryList
   */
  public function getQueryList()
  {
    return $this->queryList;
  }
}
