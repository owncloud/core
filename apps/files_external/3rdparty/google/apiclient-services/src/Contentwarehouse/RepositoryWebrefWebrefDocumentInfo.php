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

namespace Google\Service\Contentwarehouse;

class RepositoryWebrefWebrefDocumentInfo extends \Google\Collection
{
  protected $collection_key = 'webrefParsedContentSentence';
  protected $documentMetadataType = RepositoryWebrefDocumentMetadata::class;
  protected $documentMetadataDataType = '';
  protected $extensionsType = Proto2BridgeMessageSet::class;
  protected $extensionsDataType = '';
  protected $outlinkInfosType = RepositoryWebrefWebrefOutlinkInfos::class;
  protected $outlinkInfosDataType = '';
  /**
   * @var string[]
   */
  public $webrefParsedContentSentence;

  /**
   * @param RepositoryWebrefDocumentMetadata
   */
  public function setDocumentMetadata(RepositoryWebrefDocumentMetadata $documentMetadata)
  {
    $this->documentMetadata = $documentMetadata;
  }
  /**
   * @return RepositoryWebrefDocumentMetadata
   */
  public function getDocumentMetadata()
  {
    return $this->documentMetadata;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setExtensions(Proto2BridgeMessageSet $extensions)
  {
    $this->extensions = $extensions;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getExtensions()
  {
    return $this->extensions;
  }
  /**
   * @param RepositoryWebrefWebrefOutlinkInfos
   */
  public function setOutlinkInfos(RepositoryWebrefWebrefOutlinkInfos $outlinkInfos)
  {
    $this->outlinkInfos = $outlinkInfos;
  }
  /**
   * @return RepositoryWebrefWebrefOutlinkInfos
   */
  public function getOutlinkInfos()
  {
    return $this->outlinkInfos;
  }
  /**
   * @param string[]
   */
  public function setWebrefParsedContentSentence($webrefParsedContentSentence)
  {
    $this->webrefParsedContentSentence = $webrefParsedContentSentence;
  }
  /**
   * @return string[]
   */
  public function getWebrefParsedContentSentence()
  {
    return $this->webrefParsedContentSentence;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefWebrefDocumentInfo::class, 'Google_Service_Contentwarehouse_RepositoryWebrefWebrefDocumentInfo');
