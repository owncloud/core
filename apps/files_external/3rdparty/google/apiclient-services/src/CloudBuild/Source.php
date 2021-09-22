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

namespace Google\Service\CloudBuild;

class Source extends \Google\Model
{
  protected $repoSourceType = RepoSource::class;
  protected $repoSourceDataType = '';
  protected $storageSourceType = StorageSource::class;
  protected $storageSourceDataType = '';
  protected $storageSourceManifestType = StorageSourceManifest::class;
  protected $storageSourceManifestDataType = '';

  /**
   * @param RepoSource
   */
  public function setRepoSource(RepoSource $repoSource)
  {
    $this->repoSource = $repoSource;
  }
  /**
   * @return RepoSource
   */
  public function getRepoSource()
  {
    return $this->repoSource;
  }
  /**
   * @param StorageSource
   */
  public function setStorageSource(StorageSource $storageSource)
  {
    $this->storageSource = $storageSource;
  }
  /**
   * @return StorageSource
   */
  public function getStorageSource()
  {
    return $this->storageSource;
  }
  /**
   * @param StorageSourceManifest
   */
  public function setStorageSourceManifest(StorageSourceManifest $storageSourceManifest)
  {
    $this->storageSourceManifest = $storageSourceManifest;
  }
  /**
   * @return StorageSourceManifest
   */
  public function getStorageSourceManifest()
  {
    return $this->storageSourceManifest;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Source::class, 'Google_Service_CloudBuild_Source');
