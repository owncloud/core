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

class SparkSqlBatch extends \Google\Collection
{
  protected $collection_key = 'jarFileUris';
  /**
   * @var string[]
   */
  public $jarFileUris;
  /**
   * @var string
   */
  public $queryFileUri;
  /**
   * @var string[]
   */
  public $queryVariables;

  /**
   * @param string[]
   */
  public function setJarFileUris($jarFileUris)
  {
    $this->jarFileUris = $jarFileUris;
  }
  /**
   * @return string[]
   */
  public function getJarFileUris()
  {
    return $this->jarFileUris;
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
   * @param string[]
   */
  public function setQueryVariables($queryVariables)
  {
    $this->queryVariables = $queryVariables;
  }
  /**
   * @return string[]
   */
  public function getQueryVariables()
  {
    return $this->queryVariables;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SparkSqlBatch::class, 'Google_Service_Dataproc_SparkSqlBatch');
