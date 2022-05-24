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

class GoogleCloudDataplexV1TaskSparkTaskConfig extends \Google\Collection
{
  protected $collection_key = 'fileUris';
  /**
   * @var string[]
   */
  public $archiveUris;
  /**
   * @var string[]
   */
  public $fileUris;
  protected $infrastructureSpecType = GoogleCloudDataplexV1TaskInfrastructureSpec::class;
  protected $infrastructureSpecDataType = '';
  /**
   * @var string
   */
  public $mainClass;
  /**
   * @var string
   */
  public $mainJarFileUri;
  /**
   * @var string
   */
  public $pythonScriptFile;
  /**
   * @var string
   */
  public $sqlScript;
  /**
   * @var string
   */
  public $sqlScriptFile;

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
   * @param GoogleCloudDataplexV1TaskInfrastructureSpec
   */
  public function setInfrastructureSpec(GoogleCloudDataplexV1TaskInfrastructureSpec $infrastructureSpec)
  {
    $this->infrastructureSpec = $infrastructureSpec;
  }
  /**
   * @return GoogleCloudDataplexV1TaskInfrastructureSpec
   */
  public function getInfrastructureSpec()
  {
    return $this->infrastructureSpec;
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
   * @param string
   */
  public function setPythonScriptFile($pythonScriptFile)
  {
    $this->pythonScriptFile = $pythonScriptFile;
  }
  /**
   * @return string
   */
  public function getPythonScriptFile()
  {
    return $this->pythonScriptFile;
  }
  /**
   * @param string
   */
  public function setSqlScript($sqlScript)
  {
    $this->sqlScript = $sqlScript;
  }
  /**
   * @return string
   */
  public function getSqlScript()
  {
    return $this->sqlScript;
  }
  /**
   * @param string
   */
  public function setSqlScriptFile($sqlScriptFile)
  {
    $this->sqlScriptFile = $sqlScriptFile;
  }
  /**
   * @return string
   */
  public function getSqlScriptFile()
  {
    return $this->sqlScriptFile;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1TaskSparkTaskConfig::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1TaskSparkTaskConfig');
