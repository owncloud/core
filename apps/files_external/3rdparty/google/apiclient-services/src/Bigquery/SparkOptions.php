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

class SparkOptions extends \Google\Collection
{
  protected $collection_key = 'pyFileUris';
  /**
   * @var string[]
   */
  public $archiveUris;
  /**
   * @var string
   */
  public $connection;
  /**
   * @var string
   */
  public $containerImage;
  /**
   * @var string[]
   */
  public $fileUris;
  /**
   * @var string[]
   */
  public $jarUris;
  /**
   * @var string
   */
  public $mainFileUri;
  /**
   * @var string[]
   */
  public $properties;
  /**
   * @var string[]
   */
  public $pyFileUris;
  /**
   * @var string
   */
  public $runtimeVersion;

  /**
   * @param string[]
   */
  public function setArchiveUris($archiveUris)
  {
    $this->archiveUris = $archiveUris;
  }
  /**
   * @return string[]
   */
  public function getArchiveUris()
  {
    return $this->archiveUris;
  }
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
  public function setContainerImage($containerImage)
  {
    $this->containerImage = $containerImage;
  }
  /**
   * @return string
   */
  public function getContainerImage()
  {
    return $this->containerImage;
  }
  /**
   * @param string[]
   */
  public function setFileUris($fileUris)
  {
    $this->fileUris = $fileUris;
  }
  /**
   * @return string[]
   */
  public function getFileUris()
  {
    return $this->fileUris;
  }
  /**
   * @param string[]
   */
  public function setJarUris($jarUris)
  {
    $this->jarUris = $jarUris;
  }
  /**
   * @return string[]
   */
  public function getJarUris()
  {
    return $this->jarUris;
  }
  /**
   * @param string
   */
  public function setMainFileUri($mainFileUri)
  {
    $this->mainFileUri = $mainFileUri;
  }
  /**
   * @return string
   */
  public function getMainFileUri()
  {
    return $this->mainFileUri;
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
   * @param string[]
   */
  public function setPyFileUris($pyFileUris)
  {
    $this->pyFileUris = $pyFileUris;
  }
  /**
   * @return string[]
   */
  public function getPyFileUris()
  {
    return $this->pyFileUris;
  }
  /**
   * @param string
   */
  public function setRuntimeVersion($runtimeVersion)
  {
    $this->runtimeVersion = $runtimeVersion;
  }
  /**
   * @return string
   */
  public function getRuntimeVersion()
  {
    return $this->runtimeVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SparkOptions::class, 'Google_Service_Bigquery_SparkOptions');
