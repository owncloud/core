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

class IndexingEmbeddedContentEmbeddedContentInfo extends \Google\Collection
{
  protected $collection_key = 'referencedResource';
  /**
   * @var string
   */
  public $compressedDocumentTrees;
  /**
   * @var string
   */
  public $convertedContents;
  protected $embeddedLinksInfoType = IndexingEmbeddedContentEmbeddedLinksInfo::class;
  protected $embeddedLinksInfoDataType = '';
  protected $headlessResponseType = HtmlrenderWebkitHeadlessProtoRenderResponse::class;
  protected $headlessResponseDataType = '';
  /**
   * @var bool
   */
  public $isAlternateSnapshot;
  /**
   * @var int
   */
  public $originalEncoding;
  protected $rawRedirectInfoType = IndexingConverterRawRedirectInfo::class;
  protected $rawRedirectInfoDataType = '';
  protected $referencedResourceType = HtmlrenderWebkitHeadlessProtoReferencedResource::class;
  protected $referencedResourceDataType = 'array';
  protected $renderedSnapshotType = HtmlrenderWebkitHeadlessProtoImage::class;
  protected $renderedSnapshotDataType = '';
  /**
   * @var string
   */
  public $renderedSnapshotImage;
  protected $renderedSnapshotMetadataType = SnapshotSnapshotMetadata::class;
  protected $renderedSnapshotMetadataDataType = '';
  public $renderedSnapshotQualityScore;
  protected $renderingOutputMetadataType = IndexingEmbeddedContentRenderingOutputMetadata::class;
  protected $renderingOutputMetadataDataType = '';
  protected $richcontentDataType = IndexingConverterRichContentData::class;
  protected $richcontentDataDataType = '';

  /**
   * @param string
   */
  public function setCompressedDocumentTrees($compressedDocumentTrees)
  {
    $this->compressedDocumentTrees = $compressedDocumentTrees;
  }
  /**
   * @return string
   */
  public function getCompressedDocumentTrees()
  {
    return $this->compressedDocumentTrees;
  }
  /**
   * @param string
   */
  public function setConvertedContents($convertedContents)
  {
    $this->convertedContents = $convertedContents;
  }
  /**
   * @return string
   */
  public function getConvertedContents()
  {
    return $this->convertedContents;
  }
  /**
   * @param IndexingEmbeddedContentEmbeddedLinksInfo
   */
  public function setEmbeddedLinksInfo(IndexingEmbeddedContentEmbeddedLinksInfo $embeddedLinksInfo)
  {
    $this->embeddedLinksInfo = $embeddedLinksInfo;
  }
  /**
   * @return IndexingEmbeddedContentEmbeddedLinksInfo
   */
  public function getEmbeddedLinksInfo()
  {
    return $this->embeddedLinksInfo;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoRenderResponse
   */
  public function setHeadlessResponse(HtmlrenderWebkitHeadlessProtoRenderResponse $headlessResponse)
  {
    $this->headlessResponse = $headlessResponse;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoRenderResponse
   */
  public function getHeadlessResponse()
  {
    return $this->headlessResponse;
  }
  /**
   * @param bool
   */
  public function setIsAlternateSnapshot($isAlternateSnapshot)
  {
    $this->isAlternateSnapshot = $isAlternateSnapshot;
  }
  /**
   * @return bool
   */
  public function getIsAlternateSnapshot()
  {
    return $this->isAlternateSnapshot;
  }
  /**
   * @param int
   */
  public function setOriginalEncoding($originalEncoding)
  {
    $this->originalEncoding = $originalEncoding;
  }
  /**
   * @return int
   */
  public function getOriginalEncoding()
  {
    return $this->originalEncoding;
  }
  /**
   * @param IndexingConverterRawRedirectInfo
   */
  public function setRawRedirectInfo(IndexingConverterRawRedirectInfo $rawRedirectInfo)
  {
    $this->rawRedirectInfo = $rawRedirectInfo;
  }
  /**
   * @return IndexingConverterRawRedirectInfo
   */
  public function getRawRedirectInfo()
  {
    return $this->rawRedirectInfo;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoReferencedResource[]
   */
  public function setReferencedResource($referencedResource)
  {
    $this->referencedResource = $referencedResource;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoReferencedResource[]
   */
  public function getReferencedResource()
  {
    return $this->referencedResource;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoImage
   */
  public function setRenderedSnapshot(HtmlrenderWebkitHeadlessProtoImage $renderedSnapshot)
  {
    $this->renderedSnapshot = $renderedSnapshot;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoImage
   */
  public function getRenderedSnapshot()
  {
    return $this->renderedSnapshot;
  }
  /**
   * @param string
   */
  public function setRenderedSnapshotImage($renderedSnapshotImage)
  {
    $this->renderedSnapshotImage = $renderedSnapshotImage;
  }
  /**
   * @return string
   */
  public function getRenderedSnapshotImage()
  {
    return $this->renderedSnapshotImage;
  }
  /**
   * @param SnapshotSnapshotMetadata
   */
  public function setRenderedSnapshotMetadata(SnapshotSnapshotMetadata $renderedSnapshotMetadata)
  {
    $this->renderedSnapshotMetadata = $renderedSnapshotMetadata;
  }
  /**
   * @return SnapshotSnapshotMetadata
   */
  public function getRenderedSnapshotMetadata()
  {
    return $this->renderedSnapshotMetadata;
  }
  public function setRenderedSnapshotQualityScore($renderedSnapshotQualityScore)
  {
    $this->renderedSnapshotQualityScore = $renderedSnapshotQualityScore;
  }
  public function getRenderedSnapshotQualityScore()
  {
    return $this->renderedSnapshotQualityScore;
  }
  /**
   * @param IndexingEmbeddedContentRenderingOutputMetadata
   */
  public function setRenderingOutputMetadata(IndexingEmbeddedContentRenderingOutputMetadata $renderingOutputMetadata)
  {
    $this->renderingOutputMetadata = $renderingOutputMetadata;
  }
  /**
   * @return IndexingEmbeddedContentRenderingOutputMetadata
   */
  public function getRenderingOutputMetadata()
  {
    return $this->renderingOutputMetadata;
  }
  /**
   * @param IndexingConverterRichContentData
   */
  public function setRichcontentData(IndexingConverterRichContentData $richcontentData)
  {
    $this->richcontentData = $richcontentData;
  }
  /**
   * @return IndexingConverterRichContentData
   */
  public function getRichcontentData()
  {
    return $this->richcontentData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingEmbeddedContentEmbeddedContentInfo::class, 'Google_Service_Contentwarehouse_IndexingEmbeddedContentEmbeddedContentInfo');
