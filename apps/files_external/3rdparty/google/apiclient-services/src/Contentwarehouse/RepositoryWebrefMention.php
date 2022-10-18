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

class RepositoryWebrefMention extends \Google\Collection
{
  protected $collection_key = 'interpretationNumber';
  /**
   * @var bool
   */
  public $addedByCloseAnswers;
  protected $additionalExplainedRangeType = RepositoryWebrefMentionAdditionalExplainedRange::class;
  protected $additionalExplainedRangeDataType = 'array';
  /**
   * @var int
   */
  public $begin;
  /**
   * @var int
   */
  public $beginTokenIndex;
  protected $compoundMentionType = RepositoryWebrefMentionCompoundMention::class;
  protected $compoundMentionDataType = 'array';
  /**
   * @var float
   */
  public $confidenceScore;
  protected $debugInfoType = RepositoryWebrefMentionDebugInfo::class;
  protected $debugInfoDataType = '';
  protected $detailedMentionScoresType = RepositoryWebrefDetailedMentionScores::class;
  protected $detailedMentionScoresDataType = '';
  /**
   * @var int
   */
  public $end;
  /**
   * @var int
   */
  public $endTokenIndex;
  protected $evalInfoType = RepositoryWebrefMentionEvalInfo::class;
  protected $evalInfoDataType = '';
  /**
   * @var int[]
   */
  public $interpretationNumber;
  /**
   * @var bool
   */
  public $isImplicit;
  protected $lexicalAnnotationType = RepositoryWebrefLexicalAnnotation::class;
  protected $lexicalAnnotationDataType = '';
  /**
   * @var bool
   */
  public $lowConfidence;
  /**
   * @var string
   */
  public $matchingText;
  protected $nameMetadataType = RepositoryWebrefConceptNameMetadata::class;
  protected $nameMetadataDataType = '';
  /**
   * @var float
   */
  public $nonLocationalScore;
  protected $perMentionLightweightTokenType = RepositoryWebrefLightweightTokensPerMentionLightweightToken::class;
  protected $perMentionLightweightTokenDataType = '';
  protected $personalizationContextOutputsType = RepositoryWebrefPersonalizationContextOutputs::class;
  protected $personalizationContextOutputsDataType = '';
  /**
   * @var float
   */
  public $priorProbability;
  /**
   * @var float
   */
  public $referenceScore;
  /**
   * @var float
   */
  public $resolutionScore;
  protected $stuffType = Proto2BridgeMessageSet::class;
  protected $stuffDataType = '';
  protected $subsegmentIndexType = RepositoryWebrefSubSegmentIndex::class;
  protected $subsegmentIndexDataType = '';
  /**
   * @var int
   */
  public $timeOffsetConfidence;
  /**
   * @var int
   */
  public $timeOffsetMs;
  /**
   * @var float
   */
  public $trustedNameConfidence;

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
   * @param RepositoryWebrefMentionAdditionalExplainedRange[]
   */
  public function setAdditionalExplainedRange($additionalExplainedRange)
  {
    $this->additionalExplainedRange = $additionalExplainedRange;
  }
  /**
   * @return RepositoryWebrefMentionAdditionalExplainedRange[]
   */
  public function getAdditionalExplainedRange()
  {
    return $this->additionalExplainedRange;
  }
  /**
   * @param int
   */
  public function setBegin($begin)
  {
    $this->begin = $begin;
  }
  /**
   * @return int
   */
  public function getBegin()
  {
    return $this->begin;
  }
  /**
   * @param int
   */
  public function setBeginTokenIndex($beginTokenIndex)
  {
    $this->beginTokenIndex = $beginTokenIndex;
  }
  /**
   * @return int
   */
  public function getBeginTokenIndex()
  {
    return $this->beginTokenIndex;
  }
  /**
   * @param RepositoryWebrefMentionCompoundMention[]
   */
  public function setCompoundMention($compoundMention)
  {
    $this->compoundMention = $compoundMention;
  }
  /**
   * @return RepositoryWebrefMentionCompoundMention[]
   */
  public function getCompoundMention()
  {
    return $this->compoundMention;
  }
  /**
   * @param float
   */
  public function setConfidenceScore($confidenceScore)
  {
    $this->confidenceScore = $confidenceScore;
  }
  /**
   * @return float
   */
  public function getConfidenceScore()
  {
    return $this->confidenceScore;
  }
  /**
   * @param RepositoryWebrefMentionDebugInfo
   */
  public function setDebugInfo(RepositoryWebrefMentionDebugInfo $debugInfo)
  {
    $this->debugInfo = $debugInfo;
  }
  /**
   * @return RepositoryWebrefMentionDebugInfo
   */
  public function getDebugInfo()
  {
    return $this->debugInfo;
  }
  /**
   * @param RepositoryWebrefDetailedMentionScores
   */
  public function setDetailedMentionScores(RepositoryWebrefDetailedMentionScores $detailedMentionScores)
  {
    $this->detailedMentionScores = $detailedMentionScores;
  }
  /**
   * @return RepositoryWebrefDetailedMentionScores
   */
  public function getDetailedMentionScores()
  {
    return $this->detailedMentionScores;
  }
  /**
   * @param int
   */
  public function setEnd($end)
  {
    $this->end = $end;
  }
  /**
   * @return int
   */
  public function getEnd()
  {
    return $this->end;
  }
  /**
   * @param int
   */
  public function setEndTokenIndex($endTokenIndex)
  {
    $this->endTokenIndex = $endTokenIndex;
  }
  /**
   * @return int
   */
  public function getEndTokenIndex()
  {
    return $this->endTokenIndex;
  }
  /**
   * @param RepositoryWebrefMentionEvalInfo
   */
  public function setEvalInfo(RepositoryWebrefMentionEvalInfo $evalInfo)
  {
    $this->evalInfo = $evalInfo;
  }
  /**
   * @return RepositoryWebrefMentionEvalInfo
   */
  public function getEvalInfo()
  {
    return $this->evalInfo;
  }
  /**
   * @param int[]
   */
  public function setInterpretationNumber($interpretationNumber)
  {
    $this->interpretationNumber = $interpretationNumber;
  }
  /**
   * @return int[]
   */
  public function getInterpretationNumber()
  {
    return $this->interpretationNumber;
  }
  /**
   * @param bool
   */
  public function setIsImplicit($isImplicit)
  {
    $this->isImplicit = $isImplicit;
  }
  /**
   * @return bool
   */
  public function getIsImplicit()
  {
    return $this->isImplicit;
  }
  /**
   * @param RepositoryWebrefLexicalAnnotation
   */
  public function setLexicalAnnotation(RepositoryWebrefLexicalAnnotation $lexicalAnnotation)
  {
    $this->lexicalAnnotation = $lexicalAnnotation;
  }
  /**
   * @return RepositoryWebrefLexicalAnnotation
   */
  public function getLexicalAnnotation()
  {
    return $this->lexicalAnnotation;
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
   * @param string
   */
  public function setMatchingText($matchingText)
  {
    $this->matchingText = $matchingText;
  }
  /**
   * @return string
   */
  public function getMatchingText()
  {
    return $this->matchingText;
  }
  /**
   * @param RepositoryWebrefConceptNameMetadata
   */
  public function setNameMetadata(RepositoryWebrefConceptNameMetadata $nameMetadata)
  {
    $this->nameMetadata = $nameMetadata;
  }
  /**
   * @return RepositoryWebrefConceptNameMetadata
   */
  public function getNameMetadata()
  {
    return $this->nameMetadata;
  }
  /**
   * @param float
   */
  public function setNonLocationalScore($nonLocationalScore)
  {
    $this->nonLocationalScore = $nonLocationalScore;
  }
  /**
   * @return float
   */
  public function getNonLocationalScore()
  {
    return $this->nonLocationalScore;
  }
  /**
   * @param RepositoryWebrefLightweightTokensPerMentionLightweightToken
   */
  public function setPerMentionLightweightToken(RepositoryWebrefLightweightTokensPerMentionLightweightToken $perMentionLightweightToken)
  {
    $this->perMentionLightweightToken = $perMentionLightweightToken;
  }
  /**
   * @return RepositoryWebrefLightweightTokensPerMentionLightweightToken
   */
  public function getPerMentionLightweightToken()
  {
    return $this->perMentionLightweightToken;
  }
  /**
   * @param RepositoryWebrefPersonalizationContextOutputs
   */
  public function setPersonalizationContextOutputs(RepositoryWebrefPersonalizationContextOutputs $personalizationContextOutputs)
  {
    $this->personalizationContextOutputs = $personalizationContextOutputs;
  }
  /**
   * @return RepositoryWebrefPersonalizationContextOutputs
   */
  public function getPersonalizationContextOutputs()
  {
    return $this->personalizationContextOutputs;
  }
  /**
   * @param float
   */
  public function setPriorProbability($priorProbability)
  {
    $this->priorProbability = $priorProbability;
  }
  /**
   * @return float
   */
  public function getPriorProbability()
  {
    return $this->priorProbability;
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
   * @param Proto2BridgeMessageSet
   */
  public function setStuff(Proto2BridgeMessageSet $stuff)
  {
    $this->stuff = $stuff;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getStuff()
  {
    return $this->stuff;
  }
  /**
   * @param RepositoryWebrefSubSegmentIndex
   */
  public function setSubsegmentIndex(RepositoryWebrefSubSegmentIndex $subsegmentIndex)
  {
    $this->subsegmentIndex = $subsegmentIndex;
  }
  /**
   * @return RepositoryWebrefSubSegmentIndex
   */
  public function getSubsegmentIndex()
  {
    return $this->subsegmentIndex;
  }
  /**
   * @param int
   */
  public function setTimeOffsetConfidence($timeOffsetConfidence)
  {
    $this->timeOffsetConfidence = $timeOffsetConfidence;
  }
  /**
   * @return int
   */
  public function getTimeOffsetConfidence()
  {
    return $this->timeOffsetConfidence;
  }
  /**
   * @param int
   */
  public function setTimeOffsetMs($timeOffsetMs)
  {
    $this->timeOffsetMs = $timeOffsetMs;
  }
  /**
   * @return int
   */
  public function getTimeOffsetMs()
  {
    return $this->timeOffsetMs;
  }
  /**
   * @param float
   */
  public function setTrustedNameConfidence($trustedNameConfidence)
  {
    $this->trustedNameConfidence = $trustedNameConfidence;
  }
  /**
   * @return float
   */
  public function getTrustedNameConfidence()
  {
    return $this->trustedNameConfidence;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefMention::class, 'Google_Service_Contentwarehouse_RepositoryWebrefMention');
