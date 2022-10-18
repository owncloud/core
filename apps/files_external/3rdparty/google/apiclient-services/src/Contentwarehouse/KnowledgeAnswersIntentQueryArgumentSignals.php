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

class KnowledgeAnswersIntentQueryArgumentSignals extends \Google\Collection
{
  protected $collection_key = 'supportTransferRules';
  /**
   * @var bool
   */
  public $addedByCloseAnswers;
  /**
   * @var bool
   */
  public $allowedFuzzyMatch;
  protected $annotatedRelationshipType = LogsSemanticInterpretationIntentQueryWebrefEntityRelationship::class;
  protected $annotatedRelationshipDataType = 'array';
  protected $annotationLayerSignalsType = KnowledgeAnswersIntentQueryAnnotationLayerSignals::class;
  protected $annotationLayerSignalsDataType = '';
  protected $chainIdType = LocalsearchChainId::class;
  protected $chainIdDataType = 'array';
  protected $clusterInfoType = QualityViewsExtractionClusterInfo::class;
  protected $clusterInfoDataType = '';
  protected $collectionMembershipType = KnowledgeAnswersIntentQueryCollectionMembership::class;
  protected $collectionMembershipDataType = 'array';
  /**
   * @var string
   */
  public $contextResolution;
  /**
   * @var string[]
   */
  public $deprecatedFreebaseType;
  /**
   * @var string[]
   */
  public $deprecatedSupportingMid;
  /**
   * @var int
   */
  public $entityNumber;
  protected $entityRelationshipType = NlpSemanticParsingQRefAnnotationEntityRelationship::class;
  protected $entityRelationshipDataType = 'array';
  protected $expressionStatusType = NlpSemanticParsingExpressionStatus::class;
  protected $expressionStatusDataType = '';
  /**
   * @var bool
   */
  public $fromManualSymbolAnnotation;
  /**
   * @var bool
   */
  public $fromSymbolAnnotation;
  /**
   * @var string
   */
  public $gaiaId;
  protected $groundingSignalsType = KnowledgeAnswersIntentQueryGroundingSignals::class;
  protected $groundingSignalsDataType = '';
  /**
   * @var string
   */
  public $isAUngroundedTypeOf;
  /**
   * @var bool
   */
  public $isDefaultValue;
  /**
   * @var bool
   */
  public $isEnum;
  /**
   * @var bool
   */
  public $isEvalDataHeuristic;
  /**
   * @var bool
   */
  public $isGenieAnnotation;
  /**
   * @var bool
   */
  public $isIntentgenAnnotation;
  /**
   * @var bool
   */
  public $isNimbleAnnotation;
  protected $locationType = GeostorePointProto::class;
  protected $locationDataType = '';
  protected $locationMarkersSignalsType = KnowledgeAnswersIntentQueryLocationMarkersSignals::class;
  protected $locationMarkersSignalsDataType = '';
  protected $mediaEntitySignalsType = KnowledgeAnswersIntentQueryMediaEntitySignals::class;
  protected $mediaEntitySignalsDataType = '';
  protected $mergedImpliedEntityType = KnowledgeAnswersIntentQueryImpliedEntity::class;
  protected $mergedImpliedEntityDataType = 'array';
  /**
   * @var string
   */
  public $midEquivalentToCollection;
  /**
   * @var bool
   */
  public $multipleHorizontalListSelectionMatches;
  protected $muninSignalsType = KnowledgeAnswersIntentQueryMuninSignals::class;
  protected $muninSignalsDataType = '';
  protected $onDeviceAnnotationSignalsType = KnowledgeAnswersIntentQueryOnDeviceAnnotationSignals::class;
  protected $onDeviceAnnotationSignalsDataType = '';
  protected $oysterIdType = GeostoreFeatureIdProto::class;
  protected $oysterIdDataType = '';
  /**
   * @var string[]
   */
  public $parsedDueToExperiment;
  protected $personalEntityType = KnowledgeAnswersIntentQueryPersonalEntity::class;
  protected $personalEntityDataType = 'array';
  protected $provenanceType = KnowledgeAnswersIntentQueryArgumentProvenance::class;
  protected $provenanceDataType = 'array';
  /**
   * @var float
   */
  public $qrefConfidenceScore;
  /**
   * @var int
   */
  public $qrefInterpretationIndex;
  /**
   * @var string
   */
  public $rawQueryText;
  protected $relatedEntityType = NlpSemanticParsingRelatedEntity::class;
  protected $relatedEntityDataType = 'array';
  protected $relatednessSignalsType = KnowledgeAnswersIntentQueryRelatednessSignals::class;
  protected $relatednessSignalsDataType = '';
  /**
   * @var bool
   */
  public $resolvedFromContext;
  /**
   * @var bool
   */
  public $resolvedFromPronoun;
  protected $resultSupportType = UniversalsearchNewPackerKnowledgeResultSupport::class;
  protected $resultSupportDataType = 'array';
  protected $saftSignalsType = KnowledgeAnswersIntentQuerySaftSignals::class;
  protected $saftSignalsDataType = '';
  protected $shoppingIdsType = KnowledgeAnswersIntentQueryShoppingIds::class;
  protected $shoppingIdsDataType = '';
  protected $supportTransferRulesType = LogsSemanticInterpretationIntentQuerySupportTransferRule::class;
  protected $supportTransferRulesDataType = 'array';
  protected $supportTransferSignalsType = KnowledgeAnswersIntentQuerySupportTransferSignals::class;
  protected $supportTransferSignalsDataType = '';
  protected $ungroundedValueTypeType = KnowledgeAnswersValueType::class;
  protected $ungroundedValueTypeDataType = '';
  /**
   * @var string
   */
  public $webrefEntitiesIndex;
  /**
   * @var string
   */
  public $webrefListSource;

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
   * @param bool
   */
  public function setAllowedFuzzyMatch($allowedFuzzyMatch)
  {
    $this->allowedFuzzyMatch = $allowedFuzzyMatch;
  }
  /**
   * @return bool
   */
  public function getAllowedFuzzyMatch()
  {
    return $this->allowedFuzzyMatch;
  }
  /**
   * @param LogsSemanticInterpretationIntentQueryWebrefEntityRelationship[]
   */
  public function setAnnotatedRelationship($annotatedRelationship)
  {
    $this->annotatedRelationship = $annotatedRelationship;
  }
  /**
   * @return LogsSemanticInterpretationIntentQueryWebrefEntityRelationship[]
   */
  public function getAnnotatedRelationship()
  {
    return $this->annotatedRelationship;
  }
  /**
   * @param KnowledgeAnswersIntentQueryAnnotationLayerSignals
   */
  public function setAnnotationLayerSignals(KnowledgeAnswersIntentQueryAnnotationLayerSignals $annotationLayerSignals)
  {
    $this->annotationLayerSignals = $annotationLayerSignals;
  }
  /**
   * @return KnowledgeAnswersIntentQueryAnnotationLayerSignals
   */
  public function getAnnotationLayerSignals()
  {
    return $this->annotationLayerSignals;
  }
  /**
   * @param LocalsearchChainId[]
   */
  public function setChainId($chainId)
  {
    $this->chainId = $chainId;
  }
  /**
   * @return LocalsearchChainId[]
   */
  public function getChainId()
  {
    return $this->chainId;
  }
  /**
   * @param QualityViewsExtractionClusterInfo
   */
  public function setClusterInfo(QualityViewsExtractionClusterInfo $clusterInfo)
  {
    $this->clusterInfo = $clusterInfo;
  }
  /**
   * @return QualityViewsExtractionClusterInfo
   */
  public function getClusterInfo()
  {
    return $this->clusterInfo;
  }
  /**
   * @param KnowledgeAnswersIntentQueryCollectionMembership[]
   */
  public function setCollectionMembership($collectionMembership)
  {
    $this->collectionMembership = $collectionMembership;
  }
  /**
   * @return KnowledgeAnswersIntentQueryCollectionMembership[]
   */
  public function getCollectionMembership()
  {
    return $this->collectionMembership;
  }
  /**
   * @param string
   */
  public function setContextResolution($contextResolution)
  {
    $this->contextResolution = $contextResolution;
  }
  /**
   * @return string
   */
  public function getContextResolution()
  {
    return $this->contextResolution;
  }
  /**
   * @param string[]
   */
  public function setDeprecatedFreebaseType($deprecatedFreebaseType)
  {
    $this->deprecatedFreebaseType = $deprecatedFreebaseType;
  }
  /**
   * @return string[]
   */
  public function getDeprecatedFreebaseType()
  {
    return $this->deprecatedFreebaseType;
  }
  /**
   * @param string[]
   */
  public function setDeprecatedSupportingMid($deprecatedSupportingMid)
  {
    $this->deprecatedSupportingMid = $deprecatedSupportingMid;
  }
  /**
   * @return string[]
   */
  public function getDeprecatedSupportingMid()
  {
    return $this->deprecatedSupportingMid;
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
   * @param NlpSemanticParsingExpressionStatus
   */
  public function setExpressionStatus(NlpSemanticParsingExpressionStatus $expressionStatus)
  {
    $this->expressionStatus = $expressionStatus;
  }
  /**
   * @return NlpSemanticParsingExpressionStatus
   */
  public function getExpressionStatus()
  {
    return $this->expressionStatus;
  }
  /**
   * @param bool
   */
  public function setFromManualSymbolAnnotation($fromManualSymbolAnnotation)
  {
    $this->fromManualSymbolAnnotation = $fromManualSymbolAnnotation;
  }
  /**
   * @return bool
   */
  public function getFromManualSymbolAnnotation()
  {
    return $this->fromManualSymbolAnnotation;
  }
  /**
   * @param bool
   */
  public function setFromSymbolAnnotation($fromSymbolAnnotation)
  {
    $this->fromSymbolAnnotation = $fromSymbolAnnotation;
  }
  /**
   * @return bool
   */
  public function getFromSymbolAnnotation()
  {
    return $this->fromSymbolAnnotation;
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
   * @param KnowledgeAnswersIntentQueryGroundingSignals
   */
  public function setGroundingSignals(KnowledgeAnswersIntentQueryGroundingSignals $groundingSignals)
  {
    $this->groundingSignals = $groundingSignals;
  }
  /**
   * @return KnowledgeAnswersIntentQueryGroundingSignals
   */
  public function getGroundingSignals()
  {
    return $this->groundingSignals;
  }
  /**
   * @param string
   */
  public function setIsAUngroundedTypeOf($isAUngroundedTypeOf)
  {
    $this->isAUngroundedTypeOf = $isAUngroundedTypeOf;
  }
  /**
   * @return string
   */
  public function getIsAUngroundedTypeOf()
  {
    return $this->isAUngroundedTypeOf;
  }
  /**
   * @param bool
   */
  public function setIsDefaultValue($isDefaultValue)
  {
    $this->isDefaultValue = $isDefaultValue;
  }
  /**
   * @return bool
   */
  public function getIsDefaultValue()
  {
    return $this->isDefaultValue;
  }
  /**
   * @param bool
   */
  public function setIsEnum($isEnum)
  {
    $this->isEnum = $isEnum;
  }
  /**
   * @return bool
   */
  public function getIsEnum()
  {
    return $this->isEnum;
  }
  /**
   * @param bool
   */
  public function setIsEvalDataHeuristic($isEvalDataHeuristic)
  {
    $this->isEvalDataHeuristic = $isEvalDataHeuristic;
  }
  /**
   * @return bool
   */
  public function getIsEvalDataHeuristic()
  {
    return $this->isEvalDataHeuristic;
  }
  /**
   * @param bool
   */
  public function setIsGenieAnnotation($isGenieAnnotation)
  {
    $this->isGenieAnnotation = $isGenieAnnotation;
  }
  /**
   * @return bool
   */
  public function getIsGenieAnnotation()
  {
    return $this->isGenieAnnotation;
  }
  /**
   * @param bool
   */
  public function setIsIntentgenAnnotation($isIntentgenAnnotation)
  {
    $this->isIntentgenAnnotation = $isIntentgenAnnotation;
  }
  /**
   * @return bool
   */
  public function getIsIntentgenAnnotation()
  {
    return $this->isIntentgenAnnotation;
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
   * @param KnowledgeAnswersIntentQueryLocationMarkersSignals
   */
  public function setLocationMarkersSignals(KnowledgeAnswersIntentQueryLocationMarkersSignals $locationMarkersSignals)
  {
    $this->locationMarkersSignals = $locationMarkersSignals;
  }
  /**
   * @return KnowledgeAnswersIntentQueryLocationMarkersSignals
   */
  public function getLocationMarkersSignals()
  {
    return $this->locationMarkersSignals;
  }
  /**
   * @param KnowledgeAnswersIntentQueryMediaEntitySignals
   */
  public function setMediaEntitySignals(KnowledgeAnswersIntentQueryMediaEntitySignals $mediaEntitySignals)
  {
    $this->mediaEntitySignals = $mediaEntitySignals;
  }
  /**
   * @return KnowledgeAnswersIntentQueryMediaEntitySignals
   */
  public function getMediaEntitySignals()
  {
    return $this->mediaEntitySignals;
  }
  /**
   * @param KnowledgeAnswersIntentQueryImpliedEntity[]
   */
  public function setMergedImpliedEntity($mergedImpliedEntity)
  {
    $this->mergedImpliedEntity = $mergedImpliedEntity;
  }
  /**
   * @return KnowledgeAnswersIntentQueryImpliedEntity[]
   */
  public function getMergedImpliedEntity()
  {
    return $this->mergedImpliedEntity;
  }
  /**
   * @param string
   */
  public function setMidEquivalentToCollection($midEquivalentToCollection)
  {
    $this->midEquivalentToCollection = $midEquivalentToCollection;
  }
  /**
   * @return string
   */
  public function getMidEquivalentToCollection()
  {
    return $this->midEquivalentToCollection;
  }
  /**
   * @param bool
   */
  public function setMultipleHorizontalListSelectionMatches($multipleHorizontalListSelectionMatches)
  {
    $this->multipleHorizontalListSelectionMatches = $multipleHorizontalListSelectionMatches;
  }
  /**
   * @return bool
   */
  public function getMultipleHorizontalListSelectionMatches()
  {
    return $this->multipleHorizontalListSelectionMatches;
  }
  /**
   * @param KnowledgeAnswersIntentQueryMuninSignals
   */
  public function setMuninSignals(KnowledgeAnswersIntentQueryMuninSignals $muninSignals)
  {
    $this->muninSignals = $muninSignals;
  }
  /**
   * @return KnowledgeAnswersIntentQueryMuninSignals
   */
  public function getMuninSignals()
  {
    return $this->muninSignals;
  }
  /**
   * @param KnowledgeAnswersIntentQueryOnDeviceAnnotationSignals
   */
  public function setOnDeviceAnnotationSignals(KnowledgeAnswersIntentQueryOnDeviceAnnotationSignals $onDeviceAnnotationSignals)
  {
    $this->onDeviceAnnotationSignals = $onDeviceAnnotationSignals;
  }
  /**
   * @return KnowledgeAnswersIntentQueryOnDeviceAnnotationSignals
   */
  public function getOnDeviceAnnotationSignals()
  {
    return $this->onDeviceAnnotationSignals;
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
   * @param string[]
   */
  public function setParsedDueToExperiment($parsedDueToExperiment)
  {
    $this->parsedDueToExperiment = $parsedDueToExperiment;
  }
  /**
   * @return string[]
   */
  public function getParsedDueToExperiment()
  {
    return $this->parsedDueToExperiment;
  }
  /**
   * @param KnowledgeAnswersIntentQueryPersonalEntity[]
   */
  public function setPersonalEntity($personalEntity)
  {
    $this->personalEntity = $personalEntity;
  }
  /**
   * @return KnowledgeAnswersIntentQueryPersonalEntity[]
   */
  public function getPersonalEntity()
  {
    return $this->personalEntity;
  }
  /**
   * @param KnowledgeAnswersIntentQueryArgumentProvenance[]
   */
  public function setProvenance($provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return KnowledgeAnswersIntentQueryArgumentProvenance[]
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  /**
   * @param float
   */
  public function setQrefConfidenceScore($qrefConfidenceScore)
  {
    $this->qrefConfidenceScore = $qrefConfidenceScore;
  }
  /**
   * @return float
   */
  public function getQrefConfidenceScore()
  {
    return $this->qrefConfidenceScore;
  }
  /**
   * @param int
   */
  public function setQrefInterpretationIndex($qrefInterpretationIndex)
  {
    $this->qrefInterpretationIndex = $qrefInterpretationIndex;
  }
  /**
   * @return int
   */
  public function getQrefInterpretationIndex()
  {
    return $this->qrefInterpretationIndex;
  }
  /**
   * @param string
   */
  public function setRawQueryText($rawQueryText)
  {
    $this->rawQueryText = $rawQueryText;
  }
  /**
   * @return string
   */
  public function getRawQueryText()
  {
    return $this->rawQueryText;
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
   * @param KnowledgeAnswersIntentQueryRelatednessSignals
   */
  public function setRelatednessSignals(KnowledgeAnswersIntentQueryRelatednessSignals $relatednessSignals)
  {
    $this->relatednessSignals = $relatednessSignals;
  }
  /**
   * @return KnowledgeAnswersIntentQueryRelatednessSignals
   */
  public function getRelatednessSignals()
  {
    return $this->relatednessSignals;
  }
  /**
   * @param bool
   */
  public function setResolvedFromContext($resolvedFromContext)
  {
    $this->resolvedFromContext = $resolvedFromContext;
  }
  /**
   * @return bool
   */
  public function getResolvedFromContext()
  {
    return $this->resolvedFromContext;
  }
  /**
   * @param bool
   */
  public function setResolvedFromPronoun($resolvedFromPronoun)
  {
    $this->resolvedFromPronoun = $resolvedFromPronoun;
  }
  /**
   * @return bool
   */
  public function getResolvedFromPronoun()
  {
    return $this->resolvedFromPronoun;
  }
  /**
   * @param UniversalsearchNewPackerKnowledgeResultSupport[]
   */
  public function setResultSupport($resultSupport)
  {
    $this->resultSupport = $resultSupport;
  }
  /**
   * @return UniversalsearchNewPackerKnowledgeResultSupport[]
   */
  public function getResultSupport()
  {
    return $this->resultSupport;
  }
  /**
   * @param KnowledgeAnswersIntentQuerySaftSignals
   */
  public function setSaftSignals(KnowledgeAnswersIntentQuerySaftSignals $saftSignals)
  {
    $this->saftSignals = $saftSignals;
  }
  /**
   * @return KnowledgeAnswersIntentQuerySaftSignals
   */
  public function getSaftSignals()
  {
    return $this->saftSignals;
  }
  /**
   * @param KnowledgeAnswersIntentQueryShoppingIds
   */
  public function setShoppingIds(KnowledgeAnswersIntentQueryShoppingIds $shoppingIds)
  {
    $this->shoppingIds = $shoppingIds;
  }
  /**
   * @return KnowledgeAnswersIntentQueryShoppingIds
   */
  public function getShoppingIds()
  {
    return $this->shoppingIds;
  }
  /**
   * @param LogsSemanticInterpretationIntentQuerySupportTransferRule[]
   */
  public function setSupportTransferRules($supportTransferRules)
  {
    $this->supportTransferRules = $supportTransferRules;
  }
  /**
   * @return LogsSemanticInterpretationIntentQuerySupportTransferRule[]
   */
  public function getSupportTransferRules()
  {
    return $this->supportTransferRules;
  }
  /**
   * @param KnowledgeAnswersIntentQuerySupportTransferSignals
   */
  public function setSupportTransferSignals(KnowledgeAnswersIntentQuerySupportTransferSignals $supportTransferSignals)
  {
    $this->supportTransferSignals = $supportTransferSignals;
  }
  /**
   * @return KnowledgeAnswersIntentQuerySupportTransferSignals
   */
  public function getSupportTransferSignals()
  {
    return $this->supportTransferSignals;
  }
  /**
   * @param KnowledgeAnswersValueType
   */
  public function setUngroundedValueType(KnowledgeAnswersValueType $ungroundedValueType)
  {
    $this->ungroundedValueType = $ungroundedValueType;
  }
  /**
   * @return KnowledgeAnswersValueType
   */
  public function getUngroundedValueType()
  {
    return $this->ungroundedValueType;
  }
  /**
   * @param string
   */
  public function setWebrefEntitiesIndex($webrefEntitiesIndex)
  {
    $this->webrefEntitiesIndex = $webrefEntitiesIndex;
  }
  /**
   * @return string
   */
  public function getWebrefEntitiesIndex()
  {
    return $this->webrefEntitiesIndex;
  }
  /**
   * @param string
   */
  public function setWebrefListSource($webrefListSource)
  {
    $this->webrefListSource = $webrefListSource;
  }
  /**
   * @return string
   */
  public function getWebrefListSource()
  {
    return $this->webrefListSource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryArgumentSignals::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryArgumentSignals');
