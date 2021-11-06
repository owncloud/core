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

class BuildBazelRemoteExecutionV2Directory extends \Google\Collection
{
  protected $collection_key = 'symlinks';
  protected $directoriesType = BuildBazelRemoteExecutionV2DirectoryNode::class;
  protected $directoriesDataType = 'array';
  protected $filesType = BuildBazelRemoteExecutionV2FileNode::class;
  protected $filesDataType = 'array';
  protected $nodePropertiesType = BuildBazelRemoteExecutionV2NodeProperties::class;
  protected $nodePropertiesDataType = '';
  protected $symlinksType = BuildBazelRemoteExecutionV2SymlinkNode::class;
  protected $symlinksDataType = 'array';

  /**
   * @param BuildBazelRemoteExecutionV2DirectoryNode[]
   */
  public function setDirectories($directories)
  {
    $this->directories = $directories;
  }
  /**
   * @return BuildBazelRemoteExecutionV2DirectoryNode[]
   */
  public function getDirectories()
  {
    return $this->directories;
  }
  /**
   * @param BuildBazelRemoteExecutionV2FileNode[]
   */
  public function setFiles($files)
  {
    $this->files = $files;
  }
  /**
   * @return BuildBazelRemoteExecutionV2FileNode[]
   */
  public function getFiles()
  {
    return $this->files;
  }
  /**
   * @param BuildBazelRemoteExecutionV2NodeProperties
   */
  public function setNodeProperties(BuildBazelRemoteExecutionV2NodeProperties $nodeProperties)
  {
    $this->nodeProperties = $nodeProperties;
  }
  /**
   * @return BuildBazelRemoteExecutionV2NodeProperties
   */
  public function getNodeProperties()
  {
    return $this->nodeProperties;
  }
  /**
   * @param BuildBazelRemoteExecutionV2SymlinkNode[]
   */
  public function setSymlinks($symlinks)
  {
    $this->symlinks = $symlinks;
  }
  /**
   * @return BuildBazelRemoteExecutionV2SymlinkNode[]
   */
  public function getSymlinks()
  {
    return $this->symlinks;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildBazelRemoteExecutionV2Directory::class, 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Directory');
