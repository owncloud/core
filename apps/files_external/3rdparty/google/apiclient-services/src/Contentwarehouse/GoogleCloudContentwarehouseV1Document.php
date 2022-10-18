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

class GoogleCloudContentwarehouseV1Document extends \Google\Collection
{
  protected $collection_key = 'properties';
  /**
   * @var bool
   */
  public $asyncEnabled;
  protected $cloudAiDocumentType = GoogleCloudDocumentaiV1Document::class;
  protected $cloudAiDocumentDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $creator;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $displayUri;
  /**
   * @var string
   */
  public $documentSchemaName;
  /**
   * @var string
   */
  public $inlineRawDocument;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $plainText;
  protected $propertiesType = GoogleCloudContentwarehouseV1Property::class;
  protected $propertiesDataType = 'array';
  /**
   * @var string
   */
  public $rawDocumentFileType;
  /**
   * @var string
   */
  public $rawDocumentPath;
  /**
   * @var string
   */
  public $referenceId;
  /**
   * @var string
   */
  public $structuredContentUri;
  /**
   * @var bool
   */
  public $textExtractionDisabled;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $updater;

  /**
   * @param bool
   */
  public function setAsyncEnabled($asyncEnabled)
  {
    $this->asyncEnabled = $asyncEnabled;
  }
  /**
   * @return bool
   */
  public function getAsyncEnabled()
  {
    return $this->asyncEnabled;
  }
  /**
   * @param GoogleCloudDocumentaiV1Document
   */
  public function setCloudAiDocument(GoogleCloudDocumentaiV1Document $cloudAiDocument)
  {
    $this->cloudAiDocument = $cloudAiDocument;
  }
  /**
   * @return GoogleCloudDocumentaiV1Document
   */
  public function getCloudAiDocument()
  {
    return $this->cloudAiDocument;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setCreator($creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return string
   */
  public function getCreator()
  {
    return $this->creator;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setDisplayUri($displayUri)
  {
    $this->displayUri = $displayUri;
  }
  /**
   * @return string
   */
  public function getDisplayUri()
  {
    return $this->displayUri;
  }
  /**
   * @param string
   */
  public function setDocumentSchemaName($documentSchemaName)
  {
    $this->documentSchemaName = $documentSchemaName;
  }
  /**
   * @return string
   */
  public function getDocumentSchemaName()
  {
    return $this->documentSchemaName;
  }
  /**
   * @param string
   */
  public function setInlineRawDocument($inlineRawDocument)
  {
    $this->inlineRawDocument = $inlineRawDocument;
  }
  /**
   * @return string
   */
  public function getInlineRawDocument()
  {
    return $this->inlineRawDocument;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPlainText($plainText)
  {
    $this->plainText = $plainText;
  }
  /**
   * @return string
   */
  public function getPlainText()
  {
    return $this->plainText;
  }
  /**
   * @param GoogleCloudContentwarehouseV1Property[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return GoogleCloudContentwarehouseV1Property[]
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param string
   */
  public function setRawDocumentFileType($rawDocumentFileType)
  {
    $this->rawDocumentFileType = $rawDocumentFileType;
  }
  /**
   * @return string
   */
  public function getRawDocumentFileType()
  {
    return $this->rawDocumentFileType;
  }
  /**
   * @param string
   */
  public function setRawDocumentPath($rawDocumentPath)
  {
    $this->rawDocumentPath = $rawDocumentPath;
  }
  /**
   * @return string
   */
  public function getRawDocumentPath()
  {
    return $this->rawDocumentPath;
  }
  /**
   * @param string
   */
  public function setReferenceId($referenceId)
  {
    $this->referenceId = $referenceId;
  }
  /**
   * @return string
   */
  public function getReferenceId()
  {
    return $this->referenceId;
  }
  /**
   * @param string
   */
  public function setStructuredContentUri($structuredContentUri)
  {
    $this->structuredContentUri = $structuredContentUri;
  }
  /**
   * @return string
   */
  public function getStructuredContentUri()
  {
    return $this->structuredContentUri;
  }
  /**
   * @param bool
   */
  public function setTextExtractionDisabled($textExtractionDisabled)
  {
    $this->textExtractionDisabled = $textExtractionDisabled;
  }
  /**
   * @return bool
   */
  public function getTextExtractionDisabled()
  {
    return $this->textExtractionDisabled;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string
   */
  public function setUpdater($updater)
  {
    $this->updater = $updater;
  }
  /**
   * @return string
   */
  public function getUpdater()
  {
    return $this->updater;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1Document::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1Document');
