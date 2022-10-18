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

class RepositoryWebrefExtraMetadata extends \Google\Collection
{
  protected $collection_key = 'supportTransferRules';
  protected $bookEditionMetadataType = RepositoryWebrefBookEditionMetadata::class;
  protected $bookEditionMetadataDataType = 'array';
  protected $categoryInfoType = RepositoryWebrefCategoryInfo::class;
  protected $categoryInfoDataType = '';
  protected $clusterMetadataType = RepositoryWebrefClusterMetadata::class;
  protected $clusterMetadataDataType = '';
  protected $displayInfoType = RepositoryWebrefDisplayInfo::class;
  protected $displayInfoDataType = '';
  protected $entityScoresType = RepositoryWebrefEntityScores::class;
  protected $entityScoresDataType = '';
  protected $equivalentEntityIdType = RepositoryWebrefWebrefEntityId::class;
  protected $equivalentEntityIdDataType = 'array';
  protected $geoMetadataType = RepositoryWebrefGeoMetadataProto::class;
  protected $geoMetadataDataType = '';
  protected $kcAttributeMetadataType = RepositoryWebrefKCAttributeMetadata::class;
  protected $kcAttributeMetadataDataType = '';
  protected $latentEntitiesType = RepositoryWebrefLatentEntities::class;
  protected $latentEntitiesDataType = '';
  protected $mdvcMetadataType = RepositoryWebrefMdvcMetadata::class;
  protected $mdvcMetadataDataType = '';
  protected $otherMetadataType = Proto2BridgeMessageSet::class;
  protected $otherMetadataDataType = '';
  /**
   * @var string
   */
  public $primaryRecording;
  protected $productMetadataType = RepositoryWebrefProductMetadata::class;
  protected $productMetadataDataType = '';
  /**
   * @var string
   */
  public $specialEntityType;
  protected $specialWordType = MapsQualitySpecialWordsProto::class;
  protected $specialWordDataType = 'array';
  protected $supportTransferRulesType = RepositoryWebrefSupportTransferRule::class;
  protected $supportTransferRulesDataType = 'array';

  /**
   * @param RepositoryWebrefBookEditionMetadata[]
   */
  public function setBookEditionMetadata($bookEditionMetadata)
  {
    $this->bookEditionMetadata = $bookEditionMetadata;
  }
  /**
   * @return RepositoryWebrefBookEditionMetadata[]
   */
  public function getBookEditionMetadata()
  {
    return $this->bookEditionMetadata;
  }
  /**
   * @param RepositoryWebrefCategoryInfo
   */
  public function setCategoryInfo(RepositoryWebrefCategoryInfo $categoryInfo)
  {
    $this->categoryInfo = $categoryInfo;
  }
  /**
   * @return RepositoryWebrefCategoryInfo
   */
  public function getCategoryInfo()
  {
    return $this->categoryInfo;
  }
  /**
   * @param RepositoryWebrefClusterMetadata
   */
  public function setClusterMetadata(RepositoryWebrefClusterMetadata $clusterMetadata)
  {
    $this->clusterMetadata = $clusterMetadata;
  }
  /**
   * @return RepositoryWebrefClusterMetadata
   */
  public function getClusterMetadata()
  {
    return $this->clusterMetadata;
  }
  /**
   * @param RepositoryWebrefDisplayInfo
   */
  public function setDisplayInfo(RepositoryWebrefDisplayInfo $displayInfo)
  {
    $this->displayInfo = $displayInfo;
  }
  /**
   * @return RepositoryWebrefDisplayInfo
   */
  public function getDisplayInfo()
  {
    return $this->displayInfo;
  }
  /**
   * @param RepositoryWebrefEntityScores
   */
  public function setEntityScores(RepositoryWebrefEntityScores $entityScores)
  {
    $this->entityScores = $entityScores;
  }
  /**
   * @return RepositoryWebrefEntityScores
   */
  public function getEntityScores()
  {
    return $this->entityScores;
  }
  /**
   * @param RepositoryWebrefWebrefEntityId[]
   */
  public function setEquivalentEntityId($equivalentEntityId)
  {
    $this->equivalentEntityId = $equivalentEntityId;
  }
  /**
   * @return RepositoryWebrefWebrefEntityId[]
   */
  public function getEquivalentEntityId()
  {
    return $this->equivalentEntityId;
  }
  /**
   * @param RepositoryWebrefGeoMetadataProto
   */
  public function setGeoMetadata(RepositoryWebrefGeoMetadataProto $geoMetadata)
  {
    $this->geoMetadata = $geoMetadata;
  }
  /**
   * @return RepositoryWebrefGeoMetadataProto
   */
  public function getGeoMetadata()
  {
    return $this->geoMetadata;
  }
  /**
   * @param RepositoryWebrefKCAttributeMetadata
   */
  public function setKcAttributeMetadata(RepositoryWebrefKCAttributeMetadata $kcAttributeMetadata)
  {
    $this->kcAttributeMetadata = $kcAttributeMetadata;
  }
  /**
   * @return RepositoryWebrefKCAttributeMetadata
   */
  public function getKcAttributeMetadata()
  {
    return $this->kcAttributeMetadata;
  }
  /**
   * @param RepositoryWebrefLatentEntities
   */
  public function setLatentEntities(RepositoryWebrefLatentEntities $latentEntities)
  {
    $this->latentEntities = $latentEntities;
  }
  /**
   * @return RepositoryWebrefLatentEntities
   */
  public function getLatentEntities()
  {
    return $this->latentEntities;
  }
  /**
   * @param RepositoryWebrefMdvcMetadata
   */
  public function setMdvcMetadata(RepositoryWebrefMdvcMetadata $mdvcMetadata)
  {
    $this->mdvcMetadata = $mdvcMetadata;
  }
  /**
   * @return RepositoryWebrefMdvcMetadata
   */
  public function getMdvcMetadata()
  {
    return $this->mdvcMetadata;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setOtherMetadata(Proto2BridgeMessageSet $otherMetadata)
  {
    $this->otherMetadata = $otherMetadata;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getOtherMetadata()
  {
    return $this->otherMetadata;
  }
  /**
   * @param string
   */
  public function setPrimaryRecording($primaryRecording)
  {
    $this->primaryRecording = $primaryRecording;
  }
  /**
   * @return string
   */
  public function getPrimaryRecording()
  {
    return $this->primaryRecording;
  }
  /**
   * @param RepositoryWebrefProductMetadata
   */
  public function setProductMetadata(RepositoryWebrefProductMetadata $productMetadata)
  {
    $this->productMetadata = $productMetadata;
  }
  /**
   * @return RepositoryWebrefProductMetadata
   */
  public function getProductMetadata()
  {
    return $this->productMetadata;
  }
  /**
   * @param string
   */
  public function setSpecialEntityType($specialEntityType)
  {
    $this->specialEntityType = $specialEntityType;
  }
  /**
   * @return string
   */
  public function getSpecialEntityType()
  {
    return $this->specialEntityType;
  }
  /**
   * @param MapsQualitySpecialWordsProto[]
   */
  public function setSpecialWord($specialWord)
  {
    $this->specialWord = $specialWord;
  }
  /**
   * @return MapsQualitySpecialWordsProto[]
   */
  public function getSpecialWord()
  {
    return $this->specialWord;
  }
  /**
   * @param RepositoryWebrefSupportTransferRule[]
   */
  public function setSupportTransferRules($supportTransferRules)
  {
    $this->supportTransferRules = $supportTransferRules;
  }
  /**
   * @return RepositoryWebrefSupportTransferRule[]
   */
  public function getSupportTransferRules()
  {
    return $this->supportTransferRules;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefExtraMetadata::class, 'Google_Service_Contentwarehouse_RepositoryWebrefExtraMetadata');
