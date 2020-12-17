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

class Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Directory extends Google_Collection
{
  protected $collection_key = 'symlinks';
  protected $directoriesType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2DirectoryNode';
  protected $directoriesDataType = 'array';
  protected $filesType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2FileNode';
  protected $filesDataType = 'array';
  protected $nodePropertiesType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2NodeProperty';
  protected $nodePropertiesDataType = 'array';
  protected $symlinksType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2SymlinkNode';
  protected $symlinksDataType = 'array';

  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2DirectoryNode[]
   */
  public function setDirectories($directories)
  {
    $this->directories = $directories;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2DirectoryNode[]
   */
  public function getDirectories()
  {
    return $this->directories;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2FileNode[]
   */
  public function setFiles($files)
  {
    $this->files = $files;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2FileNode[]
   */
  public function getFiles()
  {
    return $this->files;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2NodeProperty[]
   */
  public function setNodeProperties($nodeProperties)
  {
    $this->nodeProperties = $nodeProperties;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2NodeProperty[]
   */
  public function getNodeProperties()
  {
    return $this->nodeProperties;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2SymlinkNode[]
   */
  public function setSymlinks($symlinks)
  {
    $this->symlinks = $symlinks;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2SymlinkNode[]
   */
  public function getSymlinks()
  {
    return $this->symlinks;
  }
}
