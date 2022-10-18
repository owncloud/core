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

class RepositoryWebrefEntityAnnotations extends \Google\Collection
{
  protected $collection_key = 'segmentMentions';
  /**
   * @var float
   */
  public $confidenceScore;
  protected $debugInfoType = RepositoryWebrefAnnotationDebugInfo::class;
  protected $debugInfoDataType = '';
  protected $detailedEntityScoresType = RepositoryWebrefDetailedEntityScores::class;
  protected $detailedEntityScoresDataType = '';
  protected $explainedRangeInfoType = RepositoryWebrefExplainedRangeInfo::class;
  protected $explainedRangeInfoDataType = '';
  /**
   * @var bool
   */
  public $isImplicit;
  /**
   * @var bool
   */
  public $isResolution;
  protected $segmentMentionsType = RepositoryWebrefSegmentMentions::class;
  protected $segmentMentionsDataType = 'array';
  /**
   * @var int
   */
  public $topicalityRank;
  /**
   * @var float
   */
  public $topicalityScore;

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
   * @param RepositoryWebrefAnnotationDebugInfo
   */
  public function setDebugInfo(RepositoryWebrefAnnotationDebugInfo $debugInfo)
  {
    $this->debugInfo = $debugInfo;
  }
  /**
   * @return RepositoryWebrefAnnotationDebugInfo
   */
  public function getDebugInfo()
  {
    return $this->debugInfo;
  }
  /**
   * @param RepositoryWebrefDetailedEntityScores
   */
  public function setDetailedEntityScores(RepositoryWebrefDetailedEntityScores $detailedEntityScores)
  {
    $this->detailedEntityScores = $detailedEntityScores;
  }
  /**
   * @return RepositoryWebrefDetailedEntityScores
   */
  public function getDetailedEntityScores()
  {
    return $this->detailedEntityScores;
  }
  /**
   * @param RepositoryWebrefExplainedRangeInfo
   */
  public function setExplainedRangeInfo(RepositoryWebrefExplainedRangeInfo $explainedRangeInfo)
  {
    $this->explainedRangeInfo = $explainedRangeInfo;
  }
  /**
   * @return RepositoryWebrefExplainedRangeInfo
   */
  public function getExplainedRangeInfo()
  {
    return $this->explainedRangeInfo;
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
   * @param bool
   */
  public function setIsResolution($isResolution)
  {
    $this->isResolution = $isResolution;
  }
  /**
   * @return bool
   */
  public function getIsResolution()
  {
    return $this->isResolution;
  }
  /**
   * @param RepositoryWebrefSegmentMentions[]
   */
  public function setSegmentMentions($segmentMentions)
  {
    $this->segmentMentions = $segmentMentions;
  }
  /**
   * @return RepositoryWebrefSegmentMentions[]
   */
  public function getSegmentMentions()
  {
    return $this->segmentMentions;
  }
  /**
   * @param int
   */
  public function setTopicalityRank($topicalityRank)
  {
    $this->topicalityRank = $topicalityRank;
  }
  /**
   * @return int
   */
  public function getTopicalityRank()
  {
    return $this->topicalityRank;
  }
  /**
   * @param float
   */
  public function setTopicalityScore($topicalityScore)
  {
    $this->topicalityScore = $topicalityScore;
  }
  /**
   * @return float
   */
  public function getTopicalityScore()
  {
    return $this->topicalityScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefEntityAnnotations::class, 'Google_Service_Contentwarehouse_RepositoryWebrefEntityAnnotations');
