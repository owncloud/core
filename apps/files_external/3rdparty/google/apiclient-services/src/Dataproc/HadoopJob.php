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

class HadoopJob extends \Google\Collection
{
  protected $collection_key = 'jarFileUris';
  /**
   * @var string[]
   */
  public $archiveUris;
  /**
   * @var string[]
   */
  public $args;
  /**
   * @var string[]
   */
  public $fileUris;
  /**
   * @var string[]
   */
  public $jarFileUris;
  protected $loggingConfigType = LoggingConfig::class;
  protected $loggingConfigDataType = '';
  /**
   * @var string
   */
  public $mainClass;
  /**
   * @var string
   */
  public $mainJarFileUri;
  /**
   * @var string[]
   */
  public $properties;

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
   * @param string[]
   */
  public function setArgs($args)
  {
    $this->args = $args;
  }
  /**
   * @return string[]
   */
  public function getArgs()
  {
    return $this->args;
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
  public function setMainClass($mainClass)
  {
    $this->mainClass = $mainClass;
  }
  /**
   * @return string
   */
  public function getMainClass()
  {
    return $this->mainClass;
  }
  /**
   * @param string
   */
  public function setMainJarFileUri($mainJarFileUri)
  {
    $this->mainJarFileUri = $mainJarFileUri;
  }
  /**
   * @return string
   */
  public function getMainJarFileUri()
  {
    return $this->mainJarFileUri;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HadoopJob::class, 'Google_Service_Dataproc_HadoopJob');
