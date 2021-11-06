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

class BuildBazelRemoteExecutionV2Tree extends \Google\Collection
{
  protected $collection_key = 'children';
  protected $childrenType = BuildBazelRemoteExecutionV2Directory::class;
  protected $childrenDataType = 'array';
  protected $rootType = BuildBazelRemoteExecutionV2Directory::class;
  protected $rootDataType = '';

  /**
   * @param BuildBazelRemoteExecutionV2Directory[]
   */
  public function setChildren($children)
  {
    $this->children = $children;
  }
  /**
   * @return BuildBazelRemoteExecutionV2Directory[]
   */
  public function getChildren()
  {
    return $this->children;
  }
  /**
   * @param BuildBazelRemoteExecutionV2Directory
   */
  public function setRoot(BuildBazelRemoteExecutionV2Directory $root)
  {
    $this->root = $root;
  }
  /**
   * @return BuildBazelRemoteExecutionV2Directory
   */
  public function getRoot()
  {
    return $this->root;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildBazelRemoteExecutionV2Tree::class, 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Tree');
