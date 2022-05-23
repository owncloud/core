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

namespace Google\Service\Bigquery;

class RemoteFunctionOptions extends \Google\Model
{
  /**
   * @var string
   */
  public $connection;
  /**
   * @var string
   */
  public $endpoint;
  /**
   * @var string
   */
  public $maxBatchingRows;
  /**
   * @var string[]
   */
  public $userDefinedContext;

  /**
   * @param string
   */
  public function setConnection($connection)
  {
    $this->connection = $connection;
  }
  /**
   * @return string
   */
  public function getConnection()
  {
    return $this->connection;
  }
  /**
   * @param string
   */
  public function setEndpoint($endpoint)
  {
    $this->endpoint = $endpoint;
  }
  /**
   * @return string
   */
  public function getEndpoint()
  {
    return $this->endpoint;
  }
  /**
   * @param string
   */
  public function setMaxBatchingRows($maxBatchingRows)
  {
    $this->maxBatchingRows = $maxBatchingRows;
  }
  /**
   * @return string
   */
  public function getMaxBatchingRows()
  {
    return $this->maxBatchingRows;
  }
  /**
   * @param string[]
   */
  public function setUserDefinedContext($userDefinedContext)
  {
    $this->userDefinedContext = $userDefinedContext;
  }
  /**
   * @return string[]
   */
  public function getUserDefinedContext()
  {
    return $this->userDefinedContext;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RemoteFunctionOptions::class, 'Google_Service_Bigquery_RemoteFunctionOptions');
