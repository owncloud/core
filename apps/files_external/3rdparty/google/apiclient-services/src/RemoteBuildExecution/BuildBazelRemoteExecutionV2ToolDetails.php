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

class BuildBazelRemoteExecutionV2ToolDetails extends \Google\Model
{
  public $toolName;
  public $toolVersion;

  public function setToolName($toolName)
  {
    $this->toolName = $toolName;
  }
  public function getToolName()
  {
    return $this->toolName;
  }
  public function setToolVersion($toolVersion)
  {
    $this->toolVersion = $toolVersion;
  }
  public function getToolVersion()
  {
    return $this->toolVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildBazelRemoteExecutionV2ToolDetails::class, 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ToolDetails');
