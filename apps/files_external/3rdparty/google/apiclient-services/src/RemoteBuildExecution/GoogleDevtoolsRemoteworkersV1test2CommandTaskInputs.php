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

namespace Google\Service\RemoteBuildExecution;

class GoogleDevtoolsRemoteworkersV1test2CommandTaskInputs extends \Google\Collection
{
  protected $collection_key = 'inlineBlobs';
  public $arguments;
  protected $environmentVariablesType = GoogleDevtoolsRemoteworkersV1test2CommandTaskInputsEnvironmentVariable::class;
  protected $environmentVariablesDataType = 'array';
  protected $filesType = GoogleDevtoolsRemoteworkersV1test2Digest::class;
  protected $filesDataType = 'array';
  protected $inlineBlobsType = GoogleDevtoolsRemoteworkersV1test2Blob::class;
  protected $inlineBlobsDataType = 'array';
  public $workingDirectory;

  public function setArguments($arguments)
  {
    $this->arguments = $arguments;
  }
  public function getArguments()
  {
    return $this->arguments;
  }
  /**
   * @param GoogleDevtoolsRemoteworkersV1test2CommandTaskInputsEnvironmentVariable[]
   */
  public function setEnvironmentVariables($environmentVariables)
  {
    $this->environmentVariables = $environmentVariables;
  }
  /**
   * @return GoogleDevtoolsRemoteworkersV1test2CommandTaskInputsEnvironmentVariable[]
   */
  public function getEnvironmentVariables()
  {
    return $this->environmentVariables;
  }
  /**
   * @param GoogleDevtoolsRemoteworkersV1test2Digest[]
   */
  public function setFiles($files)
  {
    $this->files = $files;
  }
  /**
   * @return GoogleDevtoolsRemoteworkersV1test2Digest[]
   */
  public function getFiles()
  {
    return $this->files;
  }
  /**
   * @param GoogleDevtoolsRemoteworkersV1test2Blob[]
   */
  public function setInlineBlobs($inlineBlobs)
  {
    $this->inlineBlobs = $inlineBlobs;
  }
  /**
   * @return GoogleDevtoolsRemoteworkersV1test2Blob[]
   */
  public function getInlineBlobs()
  {
    return $this->inlineBlobs;
  }
  public function setWorkingDirectory($workingDirectory)
  {
    $this->workingDirectory = $workingDirectory;
  }
  public function getWorkingDirectory()
  {
    return $this->workingDirectory;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDevtoolsRemoteworkersV1test2CommandTaskInputs::class, 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2CommandTaskInputs');
