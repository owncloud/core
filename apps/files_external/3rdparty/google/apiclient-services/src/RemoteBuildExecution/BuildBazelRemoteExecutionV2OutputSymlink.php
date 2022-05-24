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

class BuildBazelRemoteExecutionV2OutputSymlink extends \Google\Model
{
  protected $nodePropertiesType = BuildBazelRemoteExecutionV2NodeProperties::class;
  protected $nodePropertiesDataType = '';
  public $path;
  public $target;

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
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setTarget($target)
  {
    $this->target = $target;
  }
  public function getTarget()
  {
    return $this->target;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildBazelRemoteExecutionV2OutputSymlink::class, 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2OutputSymlink');
