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
  protected $additionalContextsType = 'Google_Service_ContainerAnalysis_SourceContext';
  protected $additionalContextsDataType = 'array';
  public $artifactStorageSourceUri;
  protected $contextType = 'Google_Service_ContainerAnalysis_SourceContext';
  protected $contextDataType = '';
  protected $fileHashesType = 'Google_Service_ContainerAnalysis_FileHashes';
  protected $fileHashesDataType = 'map';

  /**
   * @param Google_Service_ContainerAnalysis_SourceContext[]
   */
  public function setAdditionalContexts($additionalContexts)
  {
    $this->additionalContexts = $additionalContexts;
  }
  /**
   * @return Google_Service_ContainerAnalysis_SourceContext[]
   */
  public function getAdditionalContexts()
  {
    return $this->additionalContexts;
  }
  public function setArtifactStorageSourceUri($artifactStorageSourceUri)
  {
    $this->artifactStorageSourceUri = $artifactStorageSourceUri;
  }
  public function getArtifactStorageSourceUri()
  {
    return $this->artifactStorageSourceUri;
  }
  /**
   * @param Google_Service_ContainerAnalysis_SourceContext
   */
  public function setContext(Google_Service_ContainerAnalysis_SourceContext $context)
  {
    $this->context = $context;
  }
  /**
   * @return Google_Service_ContainerAnalysis_SourceContext
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param Google_Service_ContainerAnalysis_FileHashes[]
   */
  public function setFileHashes($fileHashes)
  {
    $this->fileHashes = $fileHashes;
  }
  /**
   * @return Google_Service_ContainerAnalysis_FileHashes[]
   */
  public function getFileHashes()
  {
    return $this->fileHashes;
  }
}
