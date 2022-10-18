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

class KnowledgeAnswersIntentQueryFunctionCallSignals extends \Google\Collection
{
  protected $collection_key = 'signalsFallbackIntents';
  /**
   * @var string
   */
  public $argumentComposingMid;
  protected $attributeSignalsType = KnowledgeAnswersIntentQueryAttributeSignal::class;
  protected $attributeSignalsDataType = 'array';
  /**
   * @var string
   */
  public $conceptEntityMid;
  /**
   * @var string
   */
  public $confidenceLevel;
  protected $dedupedFuncallsType = KnowledgeAnswersIntentQueryFunctionCall::class;
  protected $dedupedFuncallsDataType = 'array';
  protected $expressionStatusType = NlpSemanticParsingExpressionStatus::class;
  protected $expressionStatusDataType = '';
  /**
   * @var string
   */
  public $freefolksTrigger;
  protected $groundingSignalsType = KnowledgeAnswersIntentQueryGroundingSignals::class;
  protected $groundingSignalsDataType = '';
  /**
   * @var bool
   */
  public $highConfidence;
  /**
   * @var string[]
   */
  public $intentAnnotationSources;
  /**
   * @var string
   */
  public $intentComposingMid;
  protected $intentProvenanceType = KnowledgeAnswersIntentQueryArgumentProvenance::class;
  protected $intentProvenanceDataType = 'array';
  /**
   * @var string[]
   */
  public $intentRelevantMid;
  /**
   * @var bool
   */
  public $isCloseInterpretation;
  /**
   * @var bool
   */
  public $isDisambiguationCardIntent;
  /**
   * @var bool
   */
  public $isDisambiguationIntent;
  /**
   * @var bool
   */
  public $isUiCompositionIntent;
  protected $localSignalsType = KnowledgeAnswersIntentQueryLocalSignals::class;
  protected $localSignalsDataType = '';
  /**
   * @var string
   */
  public $osrpJourneyTag;
  /**
   * @var string[]
   */
  public $parsedDueToExperiment;
  protected $parsingSignalsType = KnowledgeAnswersIntentQueryParsingSignals::class;
  protected $parsingSignalsDataType = '';
  /**
   * @var float
   */
  public $prefulfillmentRankingScore;
  protected $prefulfillmentSignalsType = AssistantPrefulfillmentRankerPrefulfillmentSignals::class;
  protected $prefulfillmentSignalsDataType = '';
  protected $referentialResolutionType = KnowledgeAnswersDialogReferentialResolution::class;
  protected $referentialResolutionDataType = '';
  /**
   * @var string
   */
  public $refxSummaryNodeId;
  protected $resultSupportType = UniversalsearchNewPackerKnowledgeResultSupport::class;
  protected $resultSupportDataType = 'array';
  /**
   * @var string
   */
  public $role;
  /**
   * @var bool
   */
  public $selectedByPrefulfillmentRanking;
  protected $shoppingIdsType = KnowledgeAnswersIntentQueryShoppingIds::class;
  protected $shoppingIdsDataType = '';
  protected $signalsFallbackIntentsType = KnowledgeAnswersIntentQuerySignalComputationFallbackIntent::class;
  protected $signalsFallbackIntentsDataType = 'array';

  /**
   * @param string
   */
  public function setArgumentComposingMid($argumentComposingMid)
  {
    $this->argumentComposingMid = $argumentComposingMid;
  }
  /**
   * @return string
   */
  public function getArgumentComposingMid()
  {
    return $this->argumentComposingMid;
  }
  /**
   * @param KnowledgeAnswersIntentQueryAttributeSignal[]
   */
  public function setAttributeSignals($attributeSignals)
  {
    $this->attributeSignals = $attributeSignals;
  }
  /**
   * @return KnowledgeAnswersIntentQueryAttributeSignal[]
   */
  public function getAttributeSignals()
  {
    return $this->attributeSignals;
  }
  /**
   * @param string
   */
  public function setConceptEntityMid($conceptEntityMid)
  {
    $this->conceptEntityMid = $conceptEntityMid;
  }
  /**
   * @return string
   */
  public function getConceptEntityMid()
  {
    return $this->conceptEntityMid;
  }
  /**
   * @param string
   */
  public function setConfidenceLevel($confidenceLevel)
  {
    $this->confidenceLevel = $confidenceLevel;
  }
  /**
   * @return string
   */
  public function getConfidenceLevel()
  {
    return $this->confidenceLevel;
  }
  /**
   * @param KnowledgeAnswersIntentQueryFunctionCall[]
   */
  public function setDedupedFuncalls($dedupedFuncalls)
  {
    $this->dedupedFuncalls = $dedupedFuncalls;
  }
  /**
   * @return KnowledgeAnswersIntentQueryFunctionCall[]
   */
  public function getDedupedFuncalls()
  {
    return $this->dedupedFuncalls;
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
   * @param string
   */
  public function setFreefolksTrigger($freefolksTrigger)
  {
    $this->freefolksTrigger = $freefolksTrigger;
  }
  /**
   * @return string
   */
  public function getFreefolksTrigger()
  {
    return $this->freefolksTrigger;
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
   * @param bool
   */
  public function setHighConfidence($highConfidence)
  {
    $this->highConfidence = $highConfidence;
  }
  /**
   * @return bool
   */
  public function getHighConfidence()
  {
    return $this->highConfidence;
  }
  /**
   * @param string[]
   */
  public function setIntentAnnotationSources($intentAnnotationSources)
  {
    $this->intentAnnotationSources = $intentAnnotationSources;
  }
  /**
   * @return string[]
   */
  public function getIntentAnnotationSources()
  {
    return $this->intentAnnotationSources;
  }
  /**
   * @param string
   */
  public function setIntentComposingMid($intentComposingMid)
  {
    $this->intentComposingMid = $intentComposingMid;
  }
  /**
   * @return string
   */
  public function getIntentComposingMid()
  {
    return $this->intentComposingMid;
  }
  /**
   * @param KnowledgeAnswersIntentQueryArgumentProvenance[]
   */
  public function setIntentProvenance($intentProvenance)
  {
    $this->intentProvenance = $intentProvenance;
  }
  /**
   * @return KnowledgeAnswersIntentQueryArgumentProvenance[]
   */
  public function getIntentProvenance()
  {
    return $this->intentProvenance;
  }
  /**
   * @param string[]
   */
  public function setIntentRelevantMid($intentRelevantMid)
  {
    $this->intentRelevantMid = $intentRelevantMid;
  }
  /**
   * @return string[]
   */
  public function getIntentRelevantMid()
  {
    return $this->intentRelevantMid;
  }
  /**
   * @param bool
   */
  public function setIsCloseInterpretation($isCloseInterpretation)
  {
    $this->isCloseInterpretation = $isCloseInterpretation;
  }
  /**
   * @return bool
   */
  public function getIsCloseInterpretation()
  {
    return $this->isCloseInterpretation;
  }
  /**
   * @param bool
   */
  public function setIsDisambiguationCardIntent($isDisambiguationCardIntent)
  {
    $this->isDisambiguationCardIntent = $isDisambiguationCardIntent;
  }
  /**
   * @return bool
   */
  public function getIsDisambiguationCardIntent()
  {
    return $this->isDisambiguationCardIntent;
  }
  /**
   * @param bool
   */
  public function setIsDisambiguationIntent($isDisambiguationIntent)
  {
    $this->isDisambiguationIntent = $isDisambiguationIntent;
  }
  /**
   * @return bool
   */
  public function getIsDisambiguationIntent()
  {
    return $this->isDisambiguationIntent;
  }
  /**
   * @param bool
   */
  public function setIsUiCompositionIntent($isUiCompositionIntent)
  {
    $this->isUiCompositionIntent = $isUiCompositionIntent;
  }
  /**
   * @return bool
   */
  public function getIsUiCompositionIntent()
  {
    return $this->isUiCompositionIntent;
  }
  /**
   * @param KnowledgeAnswersIntentQueryLocalSignals
   */
  public function setLocalSignals(KnowledgeAnswersIntentQueryLocalSignals $localSignals)
  {
    $this->localSignals = $localSignals;
  }
  /**
   * @return KnowledgeAnswersIntentQueryLocalSignals
   */
  public function getLocalSignals()
  {
    return $this->localSignals;
  }
  /**
   * @param string
   */
  public function setOsrpJourneyTag($osrpJourneyTag)
  {
    $this->osrpJourneyTag = $osrpJourneyTag;
  }
  /**
   * @return string
   */
  public function getOsrpJourneyTag()
  {
    return $this->osrpJourneyTag;
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
   * @param KnowledgeAnswersIntentQueryParsingSignals
   */
  public function setParsingSignals(KnowledgeAnswersIntentQueryParsingSignals $parsingSignals)
  {
    $this->parsingSignals = $parsingSignals;
  }
  /**
   * @return KnowledgeAnswersIntentQueryParsingSignals
   */
  public function getParsingSignals()
  {
    return $this->parsingSignals;
  }
  /**
   * @param float
   */
  public function setPrefulfillmentRankingScore($prefulfillmentRankingScore)
  {
    $this->prefulfillmentRankingScore = $prefulfillmentRankingScore;
  }
  /**
   * @return float
   */
  public function getPrefulfillmentRankingScore()
  {
    return $this->prefulfillmentRankingScore;
  }
  /**
   * @param AssistantPrefulfillmentRankerPrefulfillmentSignals
   */
  public function setPrefulfillmentSignals(AssistantPrefulfillmentRankerPrefulfillmentSignals $prefulfillmentSignals)
  {
    $this->prefulfillmentSignals = $prefulfillmentSignals;
  }
  /**
   * @return AssistantPrefulfillmentRankerPrefulfillmentSignals
   */
  public function getPrefulfillmentSignals()
  {
    return $this->prefulfillmentSignals;
  }
  /**
   * @param KnowledgeAnswersDialogReferentialResolution
   */
  public function setReferentialResolution(KnowledgeAnswersDialogReferentialResolution $referentialResolution)
  {
    $this->referentialResolution = $referentialResolution;
  }
  /**
   * @return KnowledgeAnswersDialogReferentialResolution
   */
  public function getReferentialResolution()
  {
    return $this->referentialResolution;
  }
  /**
   * @param string
   */
  public function setRefxSummaryNodeId($refxSummaryNodeId)
  {
    $this->refxSummaryNodeId = $refxSummaryNodeId;
  }
  /**
   * @return string
   */
  public function getRefxSummaryNodeId()
  {
    return $this->refxSummaryNodeId;
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
   * @param string
   */
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param bool
   */
  public function setSelectedByPrefulfillmentRanking($selectedByPrefulfillmentRanking)
  {
    $this->selectedByPrefulfillmentRanking = $selectedByPrefulfillmentRanking;
  }
  /**
   * @return bool
   */
  public function getSelectedByPrefulfillmentRanking()
  {
    return $this->selectedByPrefulfillmentRanking;
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
   * @param KnowledgeAnswersIntentQuerySignalComputationFallbackIntent[]
   */
  public function setSignalsFallbackIntents($signalsFallbackIntents)
  {
    $this->signalsFallbackIntents = $signalsFallbackIntents;
  }
  /**
   * @return KnowledgeAnswersIntentQuerySignalComputationFallbackIntent[]
   */
  public function getSignalsFallbackIntents()
  {
    return $this->signalsFallbackIntents;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryFunctionCallSignals::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryFunctionCallSignals');
