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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1beta2Document extends \Google\Collection
{
  protected $collection_key = 'textStyles';
  public $content;
  protected $entitiesType = GoogleCloudDocumentaiV1beta2DocumentEntity::class;
  protected $entitiesDataType = 'array';
  protected $entityRelationsType = GoogleCloudDocumentaiV1beta2DocumentEntityRelation::class;
  protected $entityRelationsDataType = 'array';
  protected $errorType = GoogleRpcStatus::class;
  protected $errorDataType = '';
  protected $labelsType = GoogleCloudDocumentaiV1beta2DocumentLabel::class;
  protected $labelsDataType = 'array';
  public $mimeType;
  protected $pagesType = GoogleCloudDocumentaiV1beta2DocumentPage::class;
  protected $pagesDataType = 'array';
  protected $revisionsType = GoogleCloudDocumentaiV1beta2DocumentRevision::class;
  protected $revisionsDataType = 'array';
  protected $shardInfoType = GoogleCloudDocumentaiV1beta2DocumentShardInfo::class;
  protected $shardInfoDataType = '';
  public $text;
  protected $textChangesType = GoogleCloudDocumentaiV1beta2DocumentTextChange::class;
  protected $textChangesDataType = 'array';
  protected $textStylesType = GoogleCloudDocumentaiV1beta2DocumentStyle::class;
  protected $textStylesDataType = 'array';
  public $uri;

  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentEntity[]
   */
  public function setEntities($entities)
  {
    $this->entities = $entities;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentEntity[]
   */
  public function getEntities()
  {
    return $this->entities;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentEntityRelation[]
   */
  public function setEntityRelations($entityRelations)
  {
    $this->entityRelations = $entityRelations;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentEntityRelation[]
   */
  public function getEntityRelations()
  {
    return $this->entityRelations;
  }
  /**
   * @param GoogleRpcStatus
   */
  public function setError(GoogleRpcStatus $error)
  {
    $this->error = $error;
  }
  /**
   * @return GoogleRpcStatus
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentLabel[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentLabel[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPage[]
   */
  public function setPages($pages)
  {
    $this->pages = $pages;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPage[]
   */
  public function getPages()
  {
    return $this->pages;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentRevision[]
   */
  public function setRevisions($revisions)
  {
    $this->revisions = $revisions;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentRevision[]
   */
  public function getRevisions()
  {
    return $this->revisions;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentShardInfo
   */
  public function setShardInfo(GoogleCloudDocumentaiV1beta2DocumentShardInfo $shardInfo)
  {
    $this->shardInfo = $shardInfo;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentShardInfo
   */
  public function getShardInfo()
  {
    return $this->shardInfo;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentTextChange[]
   */
  public function setTextChanges($textChanges)
  {
    $this->textChanges = $textChanges;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentTextChange[]
   */
  public function getTextChanges()
  {
    return $this->textChanges;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentStyle[]
   */
  public function setTextStyles($textStyles)
  {
    $this->textStyles = $textStyles;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentStyle[]
   */
  public function getTextStyles()
  {
    return $this->textStyles;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1beta2Document::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta2Document');
