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

class Google_Service_CloudSearch_ItemMetadata extends Google_Collection
{
  protected $collection_key = 'keywords';
  public $containerName;
  public $contentLanguage;
  protected $contextAttributesType = 'Google_Service_CloudSearch_ContextAttribute';
  protected $contextAttributesDataType = 'array';
  public $createTime;
  public $hash;
  protected $interactionsType = 'Google_Service_CloudSearch_Interaction';
  protected $interactionsDataType = 'array';
  public $keywords;
  public $mimeType;
  public $objectType;
  protected $searchQualityMetadataType = 'Google_Service_CloudSearch_SearchQualityMetadata';
  protected $searchQualityMetadataDataType = '';
  public $sourceRepositoryUrl;
  public $title;
  public $updateTime;

  public function setContainerName($containerName)
  {
    $this->containerName = $containerName;
  }
  public function getContainerName()
  {
    return $this->containerName;
  }
  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  public function getContentLanguage()
  {
    return $this->contentLanguage;
  }
  /**
   * @param Google_Service_CloudSearch_ContextAttribute[]
   */
  public function setContextAttributes($contextAttributes)
  {
    $this->contextAttributes = $contextAttributes;
  }
  /**
   * @return Google_Service_CloudSearch_ContextAttribute[]
   */
  public function getContextAttributes()
  {
    return $this->contextAttributes;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setHash($hash)
  {
    $this->hash = $hash;
  }
  public function getHash()
  {
    return $this->hash;
  }
  /**
   * @param Google_Service_CloudSearch_Interaction[]
   */
  public function setInteractions($interactions)
  {
    $this->interactions = $interactions;
  }
  /**
   * @return Google_Service_CloudSearch_Interaction[]
   */
  public function getInteractions()
  {
    return $this->interactions;
  }
  public function setKeywords($keywords)
  {
    $this->keywords = $keywords;
  }
  public function getKeywords()
  {
    return $this->keywords;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  public function getObjectType()
  {
    return $this->objectType;
  }
  /**
   * @param Google_Service_CloudSearch_SearchQualityMetadata
   */
  public function setSearchQualityMetadata(Google_Service_CloudSearch_SearchQualityMetadata $searchQualityMetadata)
  {
    $this->searchQualityMetadata = $searchQualityMetadata;
  }
  /**
   * @return Google_Service_CloudSearch_SearchQualityMetadata
   */
  public function getSearchQualityMetadata()
  {
    return $this->searchQualityMetadata;
  }
  public function setSourceRepositoryUrl($sourceRepositoryUrl)
  {
    $this->sourceRepositoryUrl = $sourceRepositoryUrl;
  }
  public function getSourceRepositoryUrl()
  {
    return $this->sourceRepositoryUrl;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
