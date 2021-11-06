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

class GoogleDevtoolsRemoteworkersV1test2Directory extends \Google\Collection
{
  protected $collection_key = 'files';
  protected $directoriesType = GoogleDevtoolsRemoteworkersV1test2DirectoryMetadata::class;
  protected $directoriesDataType = 'array';
  protected $filesType = GoogleDevtoolsRemoteworkersV1test2FileMetadata::class;
  protected $filesDataType = 'array';

  /**
   * @param GoogleDevtoolsRemoteworkersV1test2DirectoryMetadata[]
   */
  public function setDirectories($directories)
  {
    $this->directories = $directories;
  }
  /**
   * @return GoogleDevtoolsRemoteworkersV1test2DirectoryMetadata[]
   */
  public function getDirectories()
  {
    return $this->directories;
  }
  /**
   * @param GoogleDevtoolsRemoteworkersV1test2FileMetadata[]
   */
  public function setFiles($files)
  {
    $this->files = $files;
  }
  /**
   * @return GoogleDevtoolsRemoteworkersV1test2FileMetadata[]
   */
  public function getFiles()
  {
    return $this->files;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDevtoolsRemoteworkersV1test2Directory::class, 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteworkersV1test2Directory');
