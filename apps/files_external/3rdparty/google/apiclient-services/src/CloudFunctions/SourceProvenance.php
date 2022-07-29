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

namespace Google\Service\CloudFunctions;

class SourceProvenance extends \Google\Model
{
  protected $resolvedRepoSourceType = RepoSource::class;
  protected $resolvedRepoSourceDataType = '';
  protected $resolvedStorageSourceType = StorageSource::class;
  protected $resolvedStorageSourceDataType = '';

  /**
   * @param RepoSource
   */
  public function setResolvedRepoSource(RepoSource $resolvedRepoSource)
  {
    $this->resolvedRepoSource = $resolvedRepoSource;
  }
  /**
   * @return RepoSource
   */
  public function getResolvedRepoSource()
  {
    return $this->resolvedRepoSource;
  }
  /**
   * @param StorageSource
   */
  public function setResolvedStorageSource(StorageSource $resolvedStorageSource)
  {
    $this->resolvedStorageSource = $resolvedStorageSource;
  }
  /**
   * @return StorageSource
   */
  public function getResolvedStorageSource()
  {
    return $this->resolvedStorageSource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SourceProvenance::class, 'Google_Service_CloudFunctions_SourceProvenance');
