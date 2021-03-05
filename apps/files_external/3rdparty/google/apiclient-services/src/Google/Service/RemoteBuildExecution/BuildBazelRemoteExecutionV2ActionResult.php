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

class Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ActionResult extends Google_Collection
{
  protected $collection_key = 'outputSymlinks';
  protected $executionMetadataType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutedActionMetadata';
  protected $executionMetadataDataType = '';
  public $exitCode;
  protected $outputDirectoriesType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputDirectory';
  protected $outputDirectoriesDataType = 'array';
  protected $outputDirectorySymlinksType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputSymlink';
  protected $outputDirectorySymlinksDataType = 'array';
  protected $outputFileSymlinksType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputSymlink';
  protected $outputFileSymlinksDataType = 'array';
  protected $outputFilesType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputFile';
  protected $outputFilesDataType = 'array';
  protected $outputSymlinksType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputSymlink';
  protected $outputSymlinksDataType = 'array';
  protected $stderrDigestType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest';
  protected $stderrDigestDataType = '';
  public $stderrRaw;
  protected $stdoutDigestType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest';
  protected $stdoutDigestDataType = '';
  public $stdoutRaw;

  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutedActionMetadata
   */
  public function setExecutionMetadata(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutedActionMetadata $executionMetadata)
  {
    $this->executionMetadata = $executionMetadata;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutedActionMetadata
   */
  public function getExecutionMetadata()
  {
    return $this->executionMetadata;
  }
  public function setExitCode($exitCode)
  {
    $this->exitCode = $exitCode;
  }
  public function getExitCode()
  {
    return $this->exitCode;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputDirectory[]
   */
  public function setOutputDirectories($outputDirectories)
  {
    $this->outputDirectories = $outputDirectories;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputDirectory[]
   */
  public function getOutputDirectories()
  {
    return $this->outputDirectories;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputSymlink[]
   */
  public function setOutputDirectorySymlinks($outputDirectorySymlinks)
  {
    $this->outputDirectorySymlinks = $outputDirectorySymlinks;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputSymlink[]
   */
  public function getOutputDirectorySymlinks()
  {
    return $this->outputDirectorySymlinks;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputSymlink[]
   */
  public function setOutputFileSymlinks($outputFileSymlinks)
  {
    $this->outputFileSymlinks = $outputFileSymlinks;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputSymlink[]
   */
  public function getOutputFileSymlinks()
  {
    return $this->outputFileSymlinks;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputFile[]
   */
  public function setOutputFiles($outputFiles)
  {
    $this->outputFiles = $outputFiles;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputFile[]
   */
  public function getOutputFiles()
  {
    return $this->outputFiles;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputSymlink[]
   */
  public function setOutputSymlinks($outputSymlinks)
  {
    $this->outputSymlinks = $outputSymlinks;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputSymlink[]
   */
  public function getOutputSymlinks()
  {
    return $this->outputSymlinks;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
   */
  public function setStderrDigest(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest $stderrDigest)
  {
    $this->stderrDigest = $stderrDigest;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
   */
  public function getStderrDigest()
  {
    return $this->stderrDigest;
  }
  public function setStderrRaw($stderrRaw)
  {
    $this->stderrRaw = $stderrRaw;
  }
  public function getStderrRaw()
  {
    return $this->stderrRaw;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
   */
  public function setStdoutDigest(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest $stdoutDigest)
  {
    $this->stdoutDigest = $stdoutDigest;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Digest
   */
  public function getStdoutDigest()
  {
    return $this->stdoutDigest;
  }
  public function setStdoutRaw($stdoutRaw)
  {
    $this->stdoutRaw = $stdoutRaw;
  }
  public function getStdoutRaw()
  {
    return $this->stdoutRaw;
  }
}
