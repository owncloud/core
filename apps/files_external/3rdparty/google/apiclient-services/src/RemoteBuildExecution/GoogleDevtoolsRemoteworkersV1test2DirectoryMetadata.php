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

class GoogleDevtoolsRemoteworkersV1test2DirectoryMetadata extends \Google\Model
{
  protected $digestType = GoogleDevtoolsRemoteworkersV1test2Digest::class;
  protected $digestDataType = '';
  public $path;

  /**
   * @param GoogleDevtoolsRemoteworkersV1test2Digest
   */
  public function setDigest(GoogleDevtoolsRemoteworkersV1test2Digest $digest)
  {
    $this->digest = $digest;
  }
  /**
   * @return GoogleDevtoolsRemoteworkersV1test2Digest
   */
  public function getDigest()
  {
    return $this->digest;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDevtoolsRemoteworkersV1test2DirectoryMetadata::class, 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2DirectoryMetadata');
