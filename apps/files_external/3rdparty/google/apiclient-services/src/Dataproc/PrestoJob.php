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

namespace Google\Service\Dataproc;

class PrestoJob extends \Google\Collection
{
  protected $collection_key = 'clientTags';
  /**
   * @var string[]
   */
  public $clientTags;
  /**
   * @var bool
   */
  public $continueOnFailure;
  protected $loggingConfigType = LoggingConfig::class;
  protected $loggingConfigDataType = '';
  /**
   * @var string
   */
  public $outputFormat;
  /**
   * @var string[]
   */
  public $properties;
  /**
   * @var string
   */
  public $queryFileUri;
  protected $queryListType = QueryList::class;
  protected $queryListDataType = '';

  /**
   * @param string[]
   */
  public function setClientTags($clientTags)
  {
    $this->clientTags = $clientTags;
  }
  /**
   * @return string[]
   */
  public function getClientTags()
  {
    return $this->clientTags;
  }
  /**
   * @param bool
   */
  public function setContinueOnFailure($continueOnFailure)
  {
    $this->continueOnFailure = $continueOnFailure;
  }
  /**
   * @return bool
   */
  public function getContinueOnFailure()
  {
    return $this->continueOnFailure;
  }
  /**
   * @param LoggingConfig
   */
  public function setLoggingConfig(LoggingConfig $loggingConfig)
  {
    $this->loggingConfig = $loggingConfig;
  }
  /**
   * @return LoggingConfig
   */
  public function getLoggingConfig()
  {
    return $this->loggingConfig;
  }
  /**
   * @param string
   */
  public function setOutputFormat($outputFormat)
  {
    $this->outputFormat = $outputFormat;
  }
  /**
   * @return string
   */
  public function getOutputFormat()
  {
    return $this->outputFormat;
  }
  /**
   * @param string[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return string[]
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param string
   */
  public function setQueryFileUri($queryFileUri)
  {
    $this->queryFileUri = $queryFileUri;
  }
  /**
   * @return string
   */
  public function getQueryFileUri()
  {
    return $this->queryFileUri;
  }
  /**
   * @param QueryList
   */
  public function setQueryList(QueryList $queryList)
  {
    $this->queryList = $queryList;
  }
  /**
   * @return QueryList
   */
  public function getQueryList()
  {
    return $this->queryList;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PrestoJob::class, 'Google_Service_Dataproc_PrestoJob');
