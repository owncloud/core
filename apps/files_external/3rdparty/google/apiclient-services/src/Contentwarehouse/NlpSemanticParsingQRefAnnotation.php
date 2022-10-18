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

class NlpSemanticParsingQRefAnnotation extends \Google\Collection
{
  protected $collection_key = 'subCluster';
  /**
   * @var bool
   */
  public $addedByCloseAnswers;
  /**
   * @var string
   */
  public $annotatedSpan;
  /**
   * @var string
   */
  public $attributeId;
  /**
   * @var string
   */
  public $clusterId;
  public $clusterSetScore;
  /**
   * @var string[]
   */
  public $clusterSiblingMid;
  protected $collectionMembershipType = NlpSemanticParsingQRefAnnotationCollectionMembership::class;
  protected $collectionMembershipDataType = 'array';
  public $confidenceScore;
  /**
   * @var string[]
   */
  public $deprecatedEquivalentMids;
  /**
   * @var string[]
   */
  public $deprecatedMdvcSupportingMid;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var int
   */
  public $entityNumber;
  protected $entityRelationshipType = NlpSemanticParsingQRefAnnotationEntityRelationship::class;
  protected $entityRelationshipDataType = 'array';
  protected $entitySourceDataType = NlpSemanticParsingEntitySourceData::class;
  protected $entitySourceDataDataType = '';
  /**
   * @var string
   */
  public $freebaseMid;
  /**
   * @var string
   */
  public $gaiaId;
  /**
   * @var string[]
   */
  public $globalProductClusterId;
  /**
   * @var int
   */
  public $interpretationNumber;
  /**
   * @var bool
   */
  public $isMdvcDimension;
  /**
   * @var bool
   */
  public $isNimbleAnnotation;
  protected $locationDataType = '';
  /**
   * @var int
   */
  public $locationType;
  /**
   * @var bool
   */
  public $lowConfidence;
  protected $matchedLightweightTokenType = RepositoryWebrefLightweightTokensMatchedLightweightToken::class;
  protected $matchedLightweightTokenDataType = 'array';
  protected $mdvcChildType = NlpSemanticParsingQRefAnnotation::class;
  protected $mdvcChildDataType = 'array';
  /**
   * @var string[]
   */
  public $mdvcVerticals;
  protected $mergedImpliedEntityType = NlpSemanticParsingQRefAnnotation::class;
  protected $mergedImpliedEntityDataType = 'array';
  protected $merlotCategoryType = NlpSemanticParsingQRefAnnotationMerlotCategoryData::class;
  protected $merlotCategoryDataType = 'array';
  protected $otherMetadataType = Proto2BridgeMessageSet::class;
  protected $otherMetadataDataType = '';
  protected $oysterIdType = GeostoreFeatureIdProto::class;
  protected $oysterIdDataType = '';
  protected $personalSummaryNodeChildType = NlpSemanticParsingQRefAnnotation::class;
  protected $personalSummaryNodeChildDataType = 'array';
  /**
   * @var string[]
   */
  public $productLineId;
  /**
   * @var float
   */
  public $referenceScore;
  protected $relatedEntityType = NlpSemanticParsingRelatedEntity::class;
  protected $relatedEntityDataType = 'array';
  /**
   * @var float
   */
  public $resolutionScore;
  protected $sourceTypeListType = CopleySourceTypeList::class;
  protected $sourceTypeListDataType = '';
  protected $subClusterType = NlpSemanticParsingQRefAnnotationSubCluster::class;
  protected $subClusterDataType = 'array';

  /**
   * @param bool
   */
  public function setAddedByCloseAnswers($addedByCloseAnswers)
  {
    $this->addedByCloseAnswers = $addedByCloseAnswers;
  }
  /**
   * @return bool
   */
  public function getAddedByCloseAnswers()
  {
    return $this->addedByCloseAnswers;
  }
  /**
   * @param string
   */
  public function setAnnotatedSpan($annotatedSpan)
  {
    $this->annotatedSpan = $annotatedSpan;
  }
  /**
   * @return string
   */
  public function getAnnotatedSpan()
  {
    return $this->annotatedSpan;
  }
  /**
   * @param string
   */
  public function setAttributeId($attributeId)
  {
    $this->attributeId = $attributeId;
  }
  /**
   * @return string
   */
  public function getAttributeId()
  {
    return $this->attributeId;
  }
  /**
   * @param string
   */
  public function setClusterId($clusterId)
  {
    $this->clusterId = $clusterId;
  }
  /**
   * @return string
   */
  public function getClusterId()
  {
    return $this->clusterId;
  }
  public function setClusterSetScore($clusterSetScore)
  {
    $this->clusterSetScore = $clusterSetScore;
  }
  public function getClusterSetScore()
  {
    return $this->clusterSetScore;
  }
  /**
   * @param string[]
   */
  public function setClusterSiblingMid($clusterSiblingMid)
  {
    $this->clusterSiblingMid = $clusterSiblingMid;
  }
  /**
   * @return string[]
   */
  public function getClusterSiblingMid()
  {
    return $this->clusterSiblingMid;
  }
  /**
   * @param NlpSemanticParsingQRefAnnotationCollectionMembership[]
   */
  public function setCollectionMembership($collectionMembership)
  {
    $this->collectionMembership = $collectionMembership;
  }
  /**
   * @return NlpSemanticParsingQRefAnnotationCollectionMembership[]
   */
  public function getCollectionMembership()
  {
    return $this->collectionMembership;
  }
  public function setConfidenceScore($confidenceScore)
  {
    $this->confidenceScore = $confidenceScore;
  }
  public function getConfidenceScore()
  {
    return $this->confidenceScore;
  }
  /**
   * @param string[]
   */
  public function setDeprecatedEquivalentMids($deprecatedEquivalentMids)
  {
    $this->deprecatedEquivalentMids = $deprecatedEquivalentMids;
  }
  /**
   * @return string[]
   */
  public function getDeprecatedEquivalentMids()
  {
    return $this->deprecatedEquivalentMids;
  }
  /**
   * @param string[]
   */
  public function setDeprecatedMdvcSupportingMid($deprecatedMdvcSupportingMid)
  {
    $this->deprecatedMdvcSupportingMid = $deprecatedMdvcSupportingMid;
  }
  /**
   * @return string[]
   */
  public function getDeprecatedMdvcSupportingMid()
  {
    return $this->deprecatedMdvcSupportingMid;
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
   * @param int
   */
  public function setEntityNumber($entityNumber)
  {
    $this->entityNumber = $entityNumber;
  }
  /**
   * @return int
   */
  public function getEntityNumber()
  {
    return $this->entityNumber;
  }
  /**
   * @param NlpSemanticParsingQRefAnnotationEntityRelationship[]
   */
  public function setEntityRelationship($entityRelationship)
  {
    $this->entityRelationship = $entityRelationship;
  }
  /**
   * @return NlpSemanticParsingQRefAnnotationEntityRelationship[]
   */
  public function getEntityRelationship()
  {
    return $this->entityRelationship;
  }
  /**
   * @param NlpSemanticParsingEntitySourceData
   */
  public function setEntitySourceData(NlpSemanticParsingEntitySourceData $entitySourceData)
  {
    $this->entitySourceData = $entitySourceData;
  }
  /**
   * @return NlpSemanticParsingEntitySourceData
   */
  public function getEntitySourceData()
  {
    return $this->entitySourceData;
  }
  /**
   * @param string
   */
  public function setFreebaseMid($freebaseMid)
  {
    $this->freebaseMid = $freebaseMid;
  }
  /**
   * @return string
   */
  public function getFreebaseMid()
  {
    return $this->freebaseMid;
  }
  /**
   * @param string
   */
  public function setGaiaId($gaiaId)
  {
    $this->gaiaId = $gaiaId;
  }
  /**
   * @return string
   */
  public function getGaiaId()
  {
    return $this->gaiaId;
  }
  /**
   * @param string[]
   */
  public function setGlobalProductClusterId($globalProductClusterId)
  {
    $this->globalProductClusterId = $globalProductClusterId;
  }
  /**
   * @return string[]
   */
  public function getGlobalProductClusterId()
  {
    return $this->globalProductClusterId;
  }
  /**
   * @param int
   */
  public function setInterpretationNumber($interpretationNumber)
  {
    $this->interpretationNumber = $interpretationNumber;
  }
  /**
   * @return int
   */
  public function getInterpretationNumber()
  {
    return $this->interpretationNumber;
  }
  /**
   * @param bool
   */
  public function setIsMdvcDimension($isMdvcDimension)
  {
    $this->isMdvcDimension = $isMdvcDimension;
  }
  /**
   * @return bool
   */
  public function getIsMdvcDimension()
  {
    return $this->isMdvcDimension;
  }
  /**
   * @param bool
   */
  public function setIsNimbleAnnotation($isNimbleAnnotation)
  {
    $this->isNimbleAnnotation = $isNimbleAnnotation;
  }
  /**
   * @return bool
   */
  public function getIsNimbleAnnotation()
  {
    return $this->isNimbleAnnotation;
  }
  /**
   * @param GeostorePointProto
   */
  public function setLocation(GeostorePointProto $location)
  {
    $this->location = $location;
  }
  /**
   * @return GeostorePointProto
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param int
   */
  public function setLocationType($locationType)
  {
    $this->locationType = $locationType;
  }
  /**
   * @return int
   */
  public function getLocationType()
  {
    return $this->locationType;
  }
  /**
   * @param bool
   */
  public function setLowConfidence($lowConfidence)
  {
    $this->lowConfidence = $lowConfidence;
  }
  /**
   * @return bool
   */
  public function getLowConfidence()
  {
    return $this->lowConfidence;
  }
  /**
   * @param RepositoryWebrefLightweightTokensMatchedLightweightToken[]
   */
  public function setMatchedLightweightToken($matchedLightweightToken)
  {
    $this->matchedLightweightToken = $matchedLightweightToken;
  }
  /**
   * @return RepositoryWebrefLightweightTokensMatchedLightweightToken[]
   */
  public function getMatchedLightweightToken()
  {
    return $this->matchedLightweightToken;
  }
  /**
   * @param NlpSemanticParsingQRefAnnotation[]
   */
  public function setMdvcChild($mdvcChild)
  {
    $this->mdvcChild = $mdvcChild;
  }
  /**
   * @return NlpSemanticParsingQRefAnnotation[]
   */
  public function getMdvcChild()
  {
    return $this->mdvcChild;
  }
  /**
   * @param string[]
   */
  public function setMdvcVerticals($mdvcVerticals)
  {
    $this->mdvcVerticals = $mdvcVerticals;
  }
  /**
   * @return string[]
   */
  public function getMdvcVerticals()
  {
    return $this->mdvcVerticals;
  }
  /**
   * @param NlpSemanticParsingQRefAnnotation[]
   */
  public function setMergedImpliedEntity($mergedImpliedEntity)
  {
    $this->mergedImpliedEntity = $mergedImpliedEntity;
  }
  /**
   * @return NlpSemanticParsingQRefAnnotation[]
   */
  public function getMergedImpliedEntity()
  {
    return $this->mergedImpliedEntity;
  }
  /**
   * @param NlpSemanticParsingQRefAnnotationMerlotCategoryData[]
   */
  public function setMerlotCategory($merlotCategory)
  {
    $this->merlotCategory = $merlotCategory;
  }
  /**
   * @return NlpSemanticParsingQRefAnnotationMerlotCategoryData[]
   */
  public function getMerlotCategory()
  {
    return $this->merlotCategory;
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
   * @param GeostoreFeatureIdProto
   */
  public function setOysterId(GeostoreFeatureIdProto $oysterId)
  {
    $this->oysterId = $oysterId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getOysterId()
  {
    return $this->oysterId;
  }
  /**
   * @param NlpSemanticParsingQRefAnnotation[]
   */
  public function setPersonalSummaryNodeChild($personalSummaryNodeChild)
  {
    $this->personalSummaryNodeChild = $personalSummaryNodeChild;
  }
  /**
   * @return NlpSemanticParsingQRefAnnotation[]
   */
  public function getPersonalSummaryNodeChild()
  {
    return $this->personalSummaryNodeChild;
  }
  /**
   * @param string[]
   */
  public function setProductLineId($productLineId)
  {
    $this->productLineId = $productLineId;
  }
  /**
   * @return string[]
   */
  public function getProductLineId()
  {
    return $this->productLineId;
  }
  /**
   * @param float
   */
  public function setReferenceScore($referenceScore)
  {
    $this->referenceScore = $referenceScore;
  }
  /**
   * @return float
   */
  public function getReferenceScore()
  {
    return $this->referenceScore;
  }
  /**
   * @param NlpSemanticParsingRelatedEntity[]
   */
  public function setRelatedEntity($relatedEntity)
  {
    $this->relatedEntity = $relatedEntity;
  }
  /**
   * @return NlpSemanticParsingRelatedEntity[]
   */
  public function getRelatedEntity()
  {
    return $this->relatedEntity;
  }
  /**
   * @param float
   */
  public function setResolutionScore($resolutionScore)
  {
    $this->resolutionScore = $resolutionScore;
  }
  /**
   * @return float
   */
  public function getResolutionScore()
  {
    return $this->resolutionScore;
  }
  /**
   * @param CopleySourceTypeList
   */
  public function setSourceTypeList(CopleySourceTypeList $sourceTypeList)
  {
    $this->sourceTypeList = $sourceTypeList;
  }
  /**
   * @return CopleySourceTypeList
   */
  public function getSourceTypeList()
  {
    return $this->sourceTypeList;
  }
  /**
   * @param NlpSemanticParsingQRefAnnotationSubCluster[]
   */
  public function setSubCluster($subCluster)
  {
    $this->subCluster = $subCluster;
  }
  /**
   * @return NlpSemanticParsingQRefAnnotationSubCluster[]
   */
  public function getSubCluster()
  {
    return $this->subCluster;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingQRefAnnotation::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingQRefAnnotation');
