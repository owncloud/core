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

class Google_Service_Document_GoogleCloudDocumentaiV1Document extends Google_Collection
{
  protected $collection_key = 'textStyles';
  public $content;
  protected $entitiesType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntity';
  protected $entitiesDataType = 'array';
  protected $entityRelationsType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntityRelation';
  protected $entityRelationsDataType = 'array';
  protected $errorType = 'Google_Service_Document_GoogleRpcStatus';
  protected $errorDataType = '';
  public $mimeType;
  protected $pagesType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentPage';
  protected $pagesDataType = 'array';
  protected $revisionsType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentRevision';
  protected $revisionsDataType = 'array';
  protected $shardInfoType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentShardInfo';
  protected $shardInfoDataType = '';
  public $text;
  protected $textChangesType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentTextChange';
  protected $textChangesDataType = 'array';
  protected $textStylesType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentStyle';
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
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntity[]
   */
  public function setEntities($entities)
  {
    $this->entities = $entities;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntity[]
   */
  public function getEntities()
  {
    return $this->entities;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntityRelation[]
   */
  public function setEntityRelations($entityRelations)
  {
    $this->entityRelations = $entityRelations;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentEntityRelation[]
   */
  public function getEntityRelations()
  {
    return $this->entityRelations;
  }
  /**
   * @param Google_Service_Document_GoogleRpcStatus
   */
  public function setError(Google_Service_Document_GoogleRpcStatus $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_Document_GoogleRpcStatus
   */
  public function getError()
  {
    return $this->error;
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
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentPage[]
   */
  public function setPages($pages)
  {
    $this->pages = $pages;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentPage[]
   */
  public function getPages()
  {
    return $this->pages;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentRevision[]
   */
  public function setRevisions($revisions)
  {
    $this->revisions = $revisions;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentRevision[]
   */
  public function getRevisions()
  {
    return $this->revisions;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentShardInfo
   */
  public function setShardInfo(Google_Service_Document_GoogleCloudDocumentaiV1DocumentShardInfo $shardInfo)
  {
    $this->shardInfo = $shardInfo;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentShardInfo
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
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentTextChange[]
   */
  public function setTextChanges($textChanges)
  {
    $this->textChanges = $textChanges;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentTextChange[]
   */
  public function getTextChanges()
  {
    return $this->textChanges;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentStyle[]
   */
  public function setTextStyles($textStyles)
  {
    $this->textStyles = $textStyles;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentStyle[]
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
