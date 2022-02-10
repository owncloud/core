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

namespace Google\Service\ContainerAnalysis;

class ContaineranalysisGoogleDevtoolsCloudbuildV1SourceProvenance extends \Google\Model
{
  protected $fileHashesType = ContaineranalysisGoogleDevtoolsCloudbuildV1FileHashes::class;
  protected $fileHashesDataType = 'map';
  protected $resolvedRepoSourceType = ContaineranalysisGoogleDevtoolsCloudbuildV1RepoSource::class;
  protected $resolvedRepoSourceDataType = '';
  protected $resolvedStorageSourceType = ContaineranalysisGoogleDevtoolsCloudbuildV1StorageSource::class;
  protected $resolvedStorageSourceDataType = '';
  protected $resolvedStorageSourceManifestType = ContaineranalysisGoogleDevtoolsCloudbuildV1StorageSourceManifest::class;
  protected $resolvedStorageSourceManifestDataType = '';

  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1FileHashes[]
   */
  public function setFileHashes($fileHashes)
  {
    $this->fileHashes = $fileHashes;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1FileHashes[]
   */
  public function getFileHashes()
  {
    return $this->fileHashes;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1RepoSource
   */
  public function setResolvedRepoSource(ContaineranalysisGoogleDevtoolsCloudbuildV1RepoSource $resolvedRepoSource)
  {
    $this->resolvedRepoSource = $resolvedRepoSource;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1RepoSource
   */
  public function getResolvedRepoSource()
  {
    return $this->resolvedRepoSource;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1StorageSource
   */
  public function setResolvedStorageSource(ContaineranalysisGoogleDevtoolsCloudbuildV1StorageSource $resolvedStorageSource)
  {
    $this->resolvedStorageSource = $resolvedStorageSource;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1StorageSource
   */
  public function getResolvedStorageSource()
  {
    return $this->resolvedStorageSource;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1StorageSourceManifest
   */
  public function setResolvedStorageSourceManifest(ContaineranalysisGoogleDevtoolsCloudbuildV1StorageSourceManifest $resolvedStorageSourceManifest)
  {
    $this->resolvedStorageSourceManifest = $resolvedStorageSourceManifest;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1StorageSourceManifest
   */
  public function getResolvedStorageSourceManifest()
  {
    return $this->resolvedStorageSourceManifest;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContaineranalysisGoogleDevtoolsCloudbuildV1SourceProvenance::class, 'Google_Service_ContainerAnalysis_ContaineranalysisGoogleDevtoolsCloudbuildV1SourceProvenance');
