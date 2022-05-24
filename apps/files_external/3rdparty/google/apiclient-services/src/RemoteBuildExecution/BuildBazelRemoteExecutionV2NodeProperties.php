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

class BuildBazelRemoteExecutionV2NodeProperties extends \Google\Collection
{
  protected $collection_key = 'properties';
  public $mtime;
  protected $propertiesType = BuildBazelRemoteExecutionV2NodeProperty::class;
  protected $propertiesDataType = 'array';
  public $unixMode;

  public function setMtime($mtime)
  {
    $this->mtime = $mtime;
  }
  public function getMtime()
  {
    return $this->mtime;
  }
  /**
   * @param BuildBazelRemoteExecutionV2NodeProperty[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return BuildBazelRemoteExecutionV2NodeProperty[]
   */
  public function getProperties()
  {
    return $this->properties;
  }
  public function setUnixMode($unixMode)
  {
    $this->unixMode = $unixMode;
  }
  public function getUnixMode()
  {
    return $this->unixMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildBazelRemoteExecutionV2NodeProperties::class, 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2NodeProperties');
