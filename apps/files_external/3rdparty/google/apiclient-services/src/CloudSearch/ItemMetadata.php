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

namespace Google\Service\CloudSearch;

class ItemMetadata extends \Google\Collection
{
  protected $collection_key = 'keywords';
  /**
   * @var string
   */
  public $containerName;
  /**
   * @var string
   */
  public $contentLanguage;
  protected $contextAttributesType = ContextAttribute::class;
  protected $contextAttributesDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $hash;
  protected $interactionsType = Interaction::class;
  protected $interactionsDataType = 'array';
  /**
   * @var string[]
   */
  public $keywords;
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var string
   */
  public $objectType;
  protected $searchQualityMetadataType = SearchQualityMetadata::class;
  protected $searchQualityMetadataDataType = '';
  /**
   * @var string
   */
  public $sourceRepositoryUrl;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setContainerName($containerName)
  {
    $this->containerName = $containerName;
  }
  /**
   * @return string
   */
  public function getContainerName()
  {
    return $this->containerName;
  }
  /**
   * @param string
   */
  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  /**
   * @return string
   */
  public function getContentLanguage()
  {
    return $this->contentLanguage;
  }
  /**
   * @param ContextAttribute[]
   */
  public function setContextAttributes($contextAttributes)
  {
    $this->contextAttributes = $contextAttributes;
  }
  /**
   * @return ContextAttribute[]
   */
  public function getContextAttributes()
  {
    return $this->contextAttributes;
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
  public function setHash($hash)
  {
    $this->hash = $hash;
  }
  /**
   * @return string
   */
  public function getHash()
  {
    return $this->hash;
  }
  /**
   * @param Interaction[]
   */
  public function setInteractions($interactions)
  {
    $this->interactions = $interactions;
  }
  /**
   * @return Interaction[]
   */
  public function getInteractions()
  {
    return $this->interactions;
  }
  /**
   * @param string[]
   */
  public function setKeywords($keywords)
  {
    $this->keywords = $keywords;
  }
  /**
   * @return string[]
   */
  public function getKeywords()
  {
    return $this->keywords;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param string
   */
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  /**
   * @return string
   */
  public function getObjectType()
  {
    return $this->objectType;
  }
  /**
   * @param SearchQualityMetadata
   */
  public function setSearchQualityMetadata(SearchQualityMetadata $searchQualityMetadata)
  {
    $this->searchQualityMetadata = $searchQualityMetadata;
  }
  /**
   * @return SearchQualityMetadata
   */
  public function getSearchQualityMetadata()
  {
    return $this->searchQualityMetadata;
  }
  /**
   * @param string
   */
  public function setSourceRepositoryUrl($sourceRepositoryUrl)
  {
    $this->sourceRepositoryUrl = $sourceRepositoryUrl;
  }
  /**
   * @return string
   */
  public function getSourceRepositoryUrl()
  {
    return $this->sourceRepositoryUrl;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ItemMetadata::class, 'Google_Service_CloudSearch_ItemMetadata');
