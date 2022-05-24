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

class BuildBazelRemoteExecutionV2ActionResult extends \Google\Collection
{
  protected $collection_key = 'outputSymlinks';
  protected $executionMetadataType = BuildBazelRemoteExecutionV2ExecutedActionMetadata::class;
  protected $executionMetadataDataType = '';
  public $exitCode;
  protected $outputDirectoriesType = BuildBazelRemoteExecutionV2OutputDirectory::class;
  protected $outputDirectoriesDataType = 'array';
  protected $outputDirectorySymlinksType = BuildBazelRemoteExecutionV2OutputSymlink::class;
  protected $outputDirectorySymlinksDataType = 'array';
  protected $outputFileSymlinksType = BuildBazelRemoteExecutionV2OutputSymlink::class;
  protected $outputFileSymlinksDataType = 'array';
  protected $outputFilesType = BuildBazelRemoteExecutionV2OutputFile::class;
  protected $outputFilesDataType = 'array';
  protected $outputSymlinksType = BuildBazelRemoteExecutionV2OutputSymlink::class;
  protected $outputSymlinksDataType = 'array';
  protected $stderrDigestType = BuildBazelRemoteExecutionV2Digest::class;
  protected $stderrDigestDataType = '';
  public $stderrRaw;
  protected $stdoutDigestType = BuildBazelRemoteExecutionV2Digest::class;
  protected $stdoutDigestDataType = '';
  public $stdoutRaw;

  /**
   * @param BuildBazelRemoteExecutionV2ExecutedActionMetadata
   */
  public function setExecutionMetadata(BuildBazelRemoteExecutionV2ExecutedActionMetadata $executionMetadata)
  {
    $this->executionMetadata = $executionMetadata;
  }
  /**
   * @return BuildBazelRemoteExecutionV2ExecutedActionMetadata
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
   * @param BuildBazelRemoteExecutionV2OutputDirectory[]
   */
  public function setOutputDirectories($outputDirectories)
  {
    $this->outputDirectories = $outputDirectories;
  }
  /**
   * @return BuildBazelRemoteExecutionV2OutputDirectory[]
   */
  public function getOutputDirectories()
  {
    return $this->outputDirectories;
  }
  /**
   * @param BuildBazelRemoteExecutionV2OutputSymlink[]
   */
  public function setOutputDirectorySymlinks($outputDirectorySymlinks)
  {
    $this->outputDirectorySymlinks = $outputDirectorySymlinks;
  }
  /**
   * @return BuildBazelRemoteExecutionV2OutputSymlink[]
   */
  public function getOutputDirectorySymlinks()
  {
    return $this->outputDirectorySymlinks;
  }
  /**
   * @param BuildBazelRemoteExecutionV2OutputSymlink[]
   */
  public function setOutputFileSymlinks($outputFileSymlinks)
  {
    $this->outputFileSymlinks = $outputFileSymlinks;
  }
  /**
   * @return BuildBazelRemoteExecutionV2OutputSymlink[]
   */
  public function getOutputFileSymlinks()
  {
    return $this->outputFileSymlinks;
  }
  /**
   * @param BuildBazelRemoteExecutionV2OutputFile[]
   */
  public function setOutputFiles($outputFiles)
  {
    $this->outputFiles = $outputFiles;
  }
  /**
   * @return BuildBazelRemoteExecutionV2OutputFile[]
   */
  public function getOutputFiles()
  {
    return $this->outputFiles;
  }
  /**
   * @param BuildBazelRemoteExecutionV2OutputSymlink[]
   */
  public function setOutputSymlinks($outputSymlinks)
  {
    $this->outputSymlinks = $outputSymlinks;
  }
  /**
   * @return BuildBazelRemoteExecutionV2OutputSymlink[]
   */
  public function getOutputSymlinks()
  {
    return $this->outputSymlinks;
  }
  /**
   * @param BuildBazelRemoteExecutionV2Digest
   */
  public function setStderrDigest(BuildBazelRemoteExecutionV2Digest $stderrDigest)
  {
    $this->stderrDigest = $stderrDigest;
  }
  /**
   * @return BuildBazelRemoteExecutionV2Digest
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
   * @param BuildBazelRemoteExecutionV2Digest
   */
  public function setStdoutDigest(BuildBazelRemoteExecutionV2Digest $stdoutDigest)
  {
    $this->stdoutDigest = $stdoutDigest;
  }
  /**
   * @return BuildBazelRemoteExecutionV2Digest
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildBazelRemoteExecutionV2ActionResult::class, 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ActionResult');
