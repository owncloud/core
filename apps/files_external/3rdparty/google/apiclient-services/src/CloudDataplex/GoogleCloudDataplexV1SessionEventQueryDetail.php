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

class GoogleCloudDataplexV1SessionEventQueryDetail extends \Google\Model
{
  /**
   * @var string
   */
  public $dataProcessedBytes;
  /**
   * @var string
   */
  public $duration;
  /**
   * @var string
   */
  public $engine;
  /**
   * @var string
   */
  public $queryId;
  /**
   * @var string
   */
  public $queryText;
  /**
   * @var string
   */
  public $resultSizeBytes;

  /**
   * @param string
   */
  public function setDataProcessedBytes($dataProcessedBytes)
  {
    $this->dataProcessedBytes = $dataProcessedBytes;
  }
  /**
   * @return string
   */
  public function getDataProcessedBytes()
  {
    return $this->dataProcessedBytes;
  }
  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param string
   */
  public function setEngine($engine)
  {
    $this->engine = $engine;
  }
  /**
   * @return string
   */
  public function getEngine()
  {
    return $this->engine;
  }
  /**
   * @param string
   */
  public function setQueryId($queryId)
  {
    $this->queryId = $queryId;
  }
  /**
   * @return string
   */
  public function getQueryId()
  {
    return $this->queryId;
  }
  /**
   * @param string
   */
  public function setQueryText($queryText)
  {
    $this->queryText = $queryText;
  }
  /**
   * @return string
   */
  public function getQueryText()
  {
    return $this->queryText;
  }
  /**
   * @param string
   */
  public function setResultSizeBytes($resultSizeBytes)
  {
    $this->resultSizeBytes = $resultSizeBytes;
  }
  /**
   * @return string
   */
  public function getResultSizeBytes()
  {
    return $this->resultSizeBytes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1SessionEventQueryDetail::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1SessionEventQueryDetail');
