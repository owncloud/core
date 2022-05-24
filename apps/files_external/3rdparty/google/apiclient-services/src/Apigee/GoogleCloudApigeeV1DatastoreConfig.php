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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1DatastoreConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $bucketName;
  /**
   * @var string
   */
  public $datasetName;
  /**
   * @var string
   */
  public $path;
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $tablePrefix;

  /**
   * @param string
   */
  public function setBucketName($bucketName)
  {
    $this->bucketName = $bucketName;
  }
  /**
   * @return string
   */
  public function getBucketName()
  {
    return $this->bucketName;
  }
  /**
   * @param string
   */
  public function setDatasetName($datasetName)
  {
    $this->datasetName = $datasetName;
  }
  /**
   * @return string
   */
  public function getDatasetName()
  {
    return $this->datasetName;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param string
   */
  public function setTablePrefix($tablePrefix)
  {
    $this->tablePrefix = $tablePrefix;
  }
  /**
   * @return string
   */
  public function getTablePrefix()
  {
    return $this->tablePrefix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1DatastoreConfig::class, 'Google_Service_Apigee_GoogleCloudApigeeV1DatastoreConfig');
