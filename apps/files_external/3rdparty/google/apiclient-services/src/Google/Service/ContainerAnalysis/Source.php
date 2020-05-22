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

class Google_Service_ContainerAnalysis_Source extends Google_Collection
{
  protected $collection_key = 'additionalContexts';
  protected $additionalContextsType = 'Google_Service_ContainerAnalysis_GoogleDevtoolsContaineranalysisV1alpha1SourceContext';
  protected $additionalContextsDataType = 'array';
  protected $artifactStorageSourceType = 'Google_Service_ContainerAnalysis_StorageSource';
  protected $artifactStorageSourceDataType = '';
  protected $contextType = 'Google_Service_ContainerAnalysis_GoogleDevtoolsContaineranalysisV1alpha1SourceContext';
  protected $contextDataType = '';
  protected $fileHashesType = 'Google_Service_ContainerAnalysis_FileHashes';
  protected $fileHashesDataType = 'map';
  protected $repoSourceType = 'Google_Service_ContainerAnalysis_RepoSource';
  protected $repoSourceDataType = '';
  protected $storageSourceType = 'Google_Service_ContainerAnalysis_StorageSource';
  protected $storageSourceDataType = '';

  /**
   * @param Google_Service_ContainerAnalysis_GoogleDevtoolsContaineranalysisV1alpha1SourceContext
   */
  public function setAdditionalContexts($additionalContexts)
  {
    $this->additionalContexts = $additionalContexts;
  }
  /**
   * @return Google_Service_ContainerAnalysis_GoogleDevtoolsContaineranalysisV1alpha1SourceContext
   */
  public function getAdditionalContexts()
  {
    return $this->additionalContexts;
  }
  /**
   * @param Google_Service_ContainerAnalysis_StorageSource
   */
  public function setArtifactStorageSource(Google_Service_ContainerAnalysis_StorageSource $artifactStorageSource)
  {
    $this->artifactStorageSource = $artifactStorageSource;
  }
  /**
   * @return Google_Service_ContainerAnalysis_StorageSource
   */
  public function getArtifactStorageSource()
  {
    return $this->artifactStorageSource;
  }
  /**
   * @param Google_Service_ContainerAnalysis_GoogleDevtoolsContaineranalysisV1alpha1SourceContext
   */
  public function setContext(Google_Service_ContainerAnalysis_GoogleDevtoolsContaineranalysisV1alpha1SourceContext $context)
  {
    $this->context = $context;
  }
  /**
   * @return Google_Service_ContainerAnalysis_GoogleDevtoolsContaineranalysisV1alpha1SourceContext
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param Google_Service_ContainerAnalysis_FileHashes
   */
  public function setFileHashes($fileHashes)
  {
    $this->fileHashes = $fileHashes;
  }
  /**
   * @return Google_Service_ContainerAnalysis_FileHashes
   */
  public function getFileHashes()
  {
    return $this->fileHashes;
  }
  /**
   * @param Google_Service_ContainerAnalysis_RepoSource
   */
  public function setRepoSource(Google_Service_ContainerAnalysis_RepoSource $repoSource)
  {
    $this->repoSource = $repoSource;
  }
  /**
   * @return Google_Service_ContainerAnalysis_RepoSource
   */
  public function getRepoSource()
  {
    return $this->repoSource;
  }
  /**
   * @param Google_Service_ContainerAnalysis_StorageSource
   */
  public function setStorageSource(Google_Service_ContainerAnalysis_StorageSource $storageSource)
  {
    $this->storageSource = $storageSource;
  }
  /**
   * @return Google_Service_ContainerAnalysis_StorageSource
   */
  public function getStorageSource()
  {
    return $this->storageSource;
  }
}
