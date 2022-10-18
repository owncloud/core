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

class RepositoryWebrefEntityNameScore extends \Google\Collection
{
  protected $collection_key = 'rangeMetadata';
  protected $bootstrappingPreviousIterationType = RepositoryWebrefBootstrappingScore::class;
  protected $bootstrappingPreviousIterationDataType = '';
  /**
   * @var float
   */
  public $confidence;
  protected $debugInfoType = RepositoryWebrefEntityDebugInfo::class;
  protected $debugInfoDataType = 'array';
  protected $debugVariantSignalsType = RepositoryWebrefPreprocessingNameVariantSignals::class;
  protected $debugVariantSignalsDataType = 'array';
  protected $entityType = RepositoryWebrefEntityJoin::class;
  protected $entityDataType = '';
  protected $extendedScoreRatioType = RepositoryWebrefExtendedEntityNameScore::class;
  protected $extendedScoreRatioDataType = 'array';
  /**
   * @var bool
   */
  public $includeInModel;
  /**
   * @var bool
   */
  public $internalBootstrapIsOpenWorld;
  /**
   * @var bool
   */
  public $internalIsClusterParent;
  /**
   * @var bool
   */
  public $isClusterGlobal;
  /**
   * @var bool
   */
  public $isDropped;
  /**
   * @var bool
   */
  public $isMatchlessResultContext;
  /**
   * @var bool
   */
  public $isPruned;
  /**
   * @var string
   */
  public $mid;
  protected $nameMetadataType = RepositoryWebrefPreprocessingNameEntityMetadata::class;
  protected $nameMetadataDataType = '';
  protected $rangeMetadataType = RepositoryWebrefRangeMetadata::class;
  protected $rangeMetadataDataType = 'array';
  /**
   * @var float
   */
  public $score;
  /**
   * @var float
   */
  public $scoreRatio;
  /**
   * @var bool
   */
  public $useAsNameCandidate;
  /**
   * @var float
   */
  public $volumeBasedScore;

  /**
   * @param RepositoryWebrefBootstrappingScore
   */
  public function setBootstrappingPreviousIteration(RepositoryWebrefBootstrappingScore $bootstrappingPreviousIteration)
  {
    $this->bootstrappingPreviousIteration = $bootstrappingPreviousIteration;
  }
  /**
   * @return RepositoryWebrefBootstrappingScore
   */
  public function getBootstrappingPreviousIteration()
  {
    return $this->bootstrappingPreviousIteration;
  }
  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param RepositoryWebrefEntityDebugInfo[]
   */
  public function setDebugInfo($debugInfo)
  {
    $this->debugInfo = $debugInfo;
  }
  /**
   * @return RepositoryWebrefEntityDebugInfo[]
   */
  public function getDebugInfo()
  {
    return $this->debugInfo;
  }
  /**
   * @param RepositoryWebrefPreprocessingNameVariantSignals[]
   */
  public function setDebugVariantSignals($debugVariantSignals)
  {
    $this->debugVariantSignals = $debugVariantSignals;
  }
  /**
   * @return RepositoryWebrefPreprocessingNameVariantSignals[]
   */
  public function getDebugVariantSignals()
  {
    return $this->debugVariantSignals;
  }
  /**
   * @param RepositoryWebrefEntityJoin
   */
  public function setEntity(RepositoryWebrefEntityJoin $entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return RepositoryWebrefEntityJoin
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param RepositoryWebrefExtendedEntityNameScore[]
   */
  public function setExtendedScoreRatio($extendedScoreRatio)
  {
    $this->extendedScoreRatio = $extendedScoreRatio;
  }
  /**
   * @return RepositoryWebrefExtendedEntityNameScore[]
   */
  public function getExtendedScoreRatio()
  {
    return $this->extendedScoreRatio;
  }
  /**
   * @param bool
   */
  public function setIncludeInModel($includeInModel)
  {
    $this->includeInModel = $includeInModel;
  }
  /**
   * @return bool
   */
  public function getIncludeInModel()
  {
    return $this->includeInModel;
  }
  /**
   * @param bool
   */
  public function setInternalBootstrapIsOpenWorld($internalBootstrapIsOpenWorld)
  {
    $this->internalBootstrapIsOpenWorld = $internalBootstrapIsOpenWorld;
  }
  /**
   * @return bool
   */
  public function getInternalBootstrapIsOpenWorld()
  {
    return $this->internalBootstrapIsOpenWorld;
  }
  /**
   * @param bool
   */
  public function setInternalIsClusterParent($internalIsClusterParent)
  {
    $this->internalIsClusterParent = $internalIsClusterParent;
  }
  /**
   * @return bool
   */
  public function getInternalIsClusterParent()
  {
    return $this->internalIsClusterParent;
  }
  /**
   * @param bool
   */
  public function setIsClusterGlobal($isClusterGlobal)
  {
    $this->isClusterGlobal = $isClusterGlobal;
  }
  /**
   * @return bool
   */
  public function getIsClusterGlobal()
  {
    return $this->isClusterGlobal;
  }
  /**
   * @param bool
   */
  public function setIsDropped($isDropped)
  {
    $this->isDropped = $isDropped;
  }
  /**
   * @return bool
   */
  public function getIsDropped()
  {
    return $this->isDropped;
  }
  /**
   * @param bool
   */
  public function setIsMatchlessResultContext($isMatchlessResultContext)
  {
    $this->isMatchlessResultContext = $isMatchlessResultContext;
  }
  /**
   * @return bool
   */
  public function getIsMatchlessResultContext()
  {
    return $this->isMatchlessResultContext;
  }
  /**
   * @param bool
   */
  public function setIsPruned($isPruned)
  {
    $this->isPruned = $isPruned;
  }
  /**
   * @return bool
   */
  public function getIsPruned()
  {
    return $this->isPruned;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
  /**
   * @param RepositoryWebrefPreprocessingNameEntityMetadata
   */
  public function setNameMetadata(RepositoryWebrefPreprocessingNameEntityMetadata $nameMetadata)
  {
    $this->nameMetadata = $nameMetadata;
  }
  /**
   * @return RepositoryWebrefPreprocessingNameEntityMetadata
   */
  public function getNameMetadata()
  {
    return $this->nameMetadata;
  }
  /**
   * @param RepositoryWebrefRangeMetadata[]
   */
  public function setRangeMetadata($rangeMetadata)
  {
    $this->rangeMetadata = $rangeMetadata;
  }
  /**
   * @return RepositoryWebrefRangeMetadata[]
   */
  public function getRangeMetadata()
  {
    return $this->rangeMetadata;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param float
   */
  public function setScoreRatio($scoreRatio)
  {
    $this->scoreRatio = $scoreRatio;
  }
  /**
   * @return float
   */
  public function getScoreRatio()
  {
    return $this->scoreRatio;
  }
  /**
   * @param bool
   */
  public function setUseAsNameCandidate($useAsNameCandidate)
  {
    $this->useAsNameCandidate = $useAsNameCandidate;
  }
  /**
   * @return bool
   */
  public function getUseAsNameCandidate()
  {
    return $this->useAsNameCandidate;
  }
  /**
   * @param float
   */
  public function setVolumeBasedScore($volumeBasedScore)
  {
    $this->volumeBasedScore = $volumeBasedScore;
  }
  /**
   * @return float
   */
  public function getVolumeBasedScore()
  {
    return $this->volumeBasedScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefEntityNameScore::class, 'Google_Service_Contentwarehouse_RepositoryWebrefEntityNameScore');
