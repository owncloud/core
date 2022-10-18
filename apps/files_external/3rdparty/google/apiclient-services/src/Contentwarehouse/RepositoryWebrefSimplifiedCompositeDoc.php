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

class RepositoryWebrefSimplifiedCompositeDoc extends \Google\Model
{
  protected $anchorsType = RepositoryWebrefSimplifiedAnchors::class;
  protected $anchorsDataType = '';
  protected $cdocContainerType = Proto2BridgeMessageSet::class;
  protected $cdocContainerDataType = '';
  protected $documentMentionSpansType = RepositoryWebrefRefconDocumentMentionSpans::class;
  protected $documentMentionSpansDataType = '';
  protected $matchingMetadataType = RepositoryWebrefPreprocessingUrlMatchingMetadata::class;
  protected $matchingMetadataDataType = '';
  protected $obsoleteAnchorsWithoutInterwikiType = RepositoryWebrefSimplifiedAnchors::class;
  protected $obsoleteAnchorsWithoutInterwikiDataType = '';
  protected $refconDocumentMetadataType = RepositoryWebrefRefconRefconDocumentMetadata::class;
  protected $refconDocumentMetadataDataType = '';
  /**
   * @var string
   */
  public $sourceSnapshotType;
  /**
   * @var string
   */
  public $url;
  protected $webrefOutlinksType = Proto2BridgeMessageSet::class;
  protected $webrefOutlinksDataType = '';

  /**
   * @param RepositoryWebrefSimplifiedAnchors
   */
  public function setAnchors(RepositoryWebrefSimplifiedAnchors $anchors)
  {
    $this->anchors = $anchors;
  }
  /**
   * @return RepositoryWebrefSimplifiedAnchors
   */
  public function getAnchors()
  {
    return $this->anchors;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setCdocContainer(Proto2BridgeMessageSet $cdocContainer)
  {
    $this->cdocContainer = $cdocContainer;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getCdocContainer()
  {
    return $this->cdocContainer;
  }
  /**
   * @param RepositoryWebrefRefconDocumentMentionSpans
   */
  public function setDocumentMentionSpans(RepositoryWebrefRefconDocumentMentionSpans $documentMentionSpans)
  {
    $this->documentMentionSpans = $documentMentionSpans;
  }
  /**
   * @return RepositoryWebrefRefconDocumentMentionSpans
   */
  public function getDocumentMentionSpans()
  {
    return $this->documentMentionSpans;
  }
  /**
   * @param RepositoryWebrefPreprocessingUrlMatchingMetadata
   */
  public function setMatchingMetadata(RepositoryWebrefPreprocessingUrlMatchingMetadata $matchingMetadata)
  {
    $this->matchingMetadata = $matchingMetadata;
  }
  /**
   * @return RepositoryWebrefPreprocessingUrlMatchingMetadata
   */
  public function getMatchingMetadata()
  {
    return $this->matchingMetadata;
  }
  /**
   * @param RepositoryWebrefSimplifiedAnchors
   */
  public function setObsoleteAnchorsWithoutInterwiki(RepositoryWebrefSimplifiedAnchors $obsoleteAnchorsWithoutInterwiki)
  {
    $this->obsoleteAnchorsWithoutInterwiki = $obsoleteAnchorsWithoutInterwiki;
  }
  /**
   * @return RepositoryWebrefSimplifiedAnchors
   */
  public function getObsoleteAnchorsWithoutInterwiki()
  {
    return $this->obsoleteAnchorsWithoutInterwiki;
  }
  /**
   * @param RepositoryWebrefRefconRefconDocumentMetadata
   */
  public function setRefconDocumentMetadata(RepositoryWebrefRefconRefconDocumentMetadata $refconDocumentMetadata)
  {
    $this->refconDocumentMetadata = $refconDocumentMetadata;
  }
  /**
   * @return RepositoryWebrefRefconRefconDocumentMetadata
   */
  public function getRefconDocumentMetadata()
  {
    return $this->refconDocumentMetadata;
  }
  /**
   * @param string
   */
  public function setSourceSnapshotType($sourceSnapshotType)
  {
    $this->sourceSnapshotType = $sourceSnapshotType;
  }
  /**
   * @return string
   */
  public function getSourceSnapshotType()
  {
    return $this->sourceSnapshotType;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setWebrefOutlinks(Proto2BridgeMessageSet $webrefOutlinks)
  {
    $this->webrefOutlinks = $webrefOutlinks;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getWebrefOutlinks()
  {
    return $this->webrefOutlinks;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefSimplifiedCompositeDoc::class, 'Google_Service_Contentwarehouse_RepositoryWebrefSimplifiedCompositeDoc');
