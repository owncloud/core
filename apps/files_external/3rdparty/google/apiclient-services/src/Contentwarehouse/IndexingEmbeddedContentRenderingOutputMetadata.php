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

class IndexingEmbeddedContentRenderingOutputMetadata extends \Google\Collection
{
  protected $collection_key = 'renderEvent';
  protected $configParamsType = IndexingEmbeddedContentRenderRequestConfigConfigParams::class;
  protected $configParamsDataType = '';
  /**
   * @var string
   */
  public $exceptions;
  /**
   * @var int
   */
  public $experimentalRenderTimeMsec;
  protected $generationTimestampsType = IndexingEmbeddedContentOutputGenerationTimestamps::class;
  protected $generationTimestampsDataType = '';
  /**
   * @var int
   */
  public $importance;
  /**
   * @var int
   */
  public $lastNewContentProbingTimestamp;
  public $newTokensPercentageAfterRendering;
  /**
   * @var int
   */
  public $numNewTokensFoundInRendering;
  /**
   * @var bool
   */
  public $refresh;
  protected $renderCacheStatsType = IndexingEmbeddedContentRenderCacheStats::class;
  protected $renderCacheStatsDataType = '';
  /**
   * @var string
   */
  public $renderEngine;
  protected $renderEventType = HtmlrenderWebkitHeadlessProtoRenderEvent::class;
  protected $renderEventDataType = 'array';
  /**
   * @var string
   */
  public $renderServerCl;
  public $renderTreeQualityScore;
  /**
   * @var string
   */
  public $renderedSnapshotSignature;
  /**
   * @var string
   */
  public $renderedTimeUsec;
  protected $renderingFetchStatsType = IndexingEmbeddedContentRenderingFetchStats::class;
  protected $renderingFetchStatsDataType = '';
  protected $selectionResultType = IndexingEmbeddedContentSelectionResult::class;
  protected $selectionResultDataType = '';
  public $snapshotQualityScore;
  /**
   * @var bool
   */
  public $withMissingResources;

  /**
   * @param IndexingEmbeddedContentRenderRequestConfigConfigParams
   */
  public function setConfigParams(IndexingEmbeddedContentRenderRequestConfigConfigParams $configParams)
  {
    $this->configParams = $configParams;
  }
  /**
   * @return IndexingEmbeddedContentRenderRequestConfigConfigParams
   */
  public function getConfigParams()
  {
    return $this->configParams;
  }
  /**
   * @param string
   */
  public function setExceptions($exceptions)
  {
    $this->exceptions = $exceptions;
  }
  /**
   * @return string
   */
  public function getExceptions()
  {
    return $this->exceptions;
  }
  /**
   * @param int
   */
  public function setExperimentalRenderTimeMsec($experimentalRenderTimeMsec)
  {
    $this->experimentalRenderTimeMsec = $experimentalRenderTimeMsec;
  }
  /**
   * @return int
   */
  public function getExperimentalRenderTimeMsec()
  {
    return $this->experimentalRenderTimeMsec;
  }
  /**
   * @param IndexingEmbeddedContentOutputGenerationTimestamps
   */
  public function setGenerationTimestamps(IndexingEmbeddedContentOutputGenerationTimestamps $generationTimestamps)
  {
    $this->generationTimestamps = $generationTimestamps;
  }
  /**
   * @return IndexingEmbeddedContentOutputGenerationTimestamps
   */
  public function getGenerationTimestamps()
  {
    return $this->generationTimestamps;
  }
  /**
   * @param int
   */
  public function setImportance($importance)
  {
    $this->importance = $importance;
  }
  /**
   * @return int
   */
  public function getImportance()
  {
    return $this->importance;
  }
  /**
   * @param int
   */
  public function setLastNewContentProbingTimestamp($lastNewContentProbingTimestamp)
  {
    $this->lastNewContentProbingTimestamp = $lastNewContentProbingTimestamp;
  }
  /**
   * @return int
   */
  public function getLastNewContentProbingTimestamp()
  {
    return $this->lastNewContentProbingTimestamp;
  }
  public function setNewTokensPercentageAfterRendering($newTokensPercentageAfterRendering)
  {
    $this->newTokensPercentageAfterRendering = $newTokensPercentageAfterRendering;
  }
  public function getNewTokensPercentageAfterRendering()
  {
    return $this->newTokensPercentageAfterRendering;
  }
  /**
   * @param int
   */
  public function setNumNewTokensFoundInRendering($numNewTokensFoundInRendering)
  {
    $this->numNewTokensFoundInRendering = $numNewTokensFoundInRendering;
  }
  /**
   * @return int
   */
  public function getNumNewTokensFoundInRendering()
  {
    return $this->numNewTokensFoundInRendering;
  }
  /**
   * @param bool
   */
  public function setRefresh($refresh)
  {
    $this->refresh = $refresh;
  }
  /**
   * @return bool
   */
  public function getRefresh()
  {
    return $this->refresh;
  }
  /**
   * @param IndexingEmbeddedContentRenderCacheStats
   */
  public function setRenderCacheStats(IndexingEmbeddedContentRenderCacheStats $renderCacheStats)
  {
    $this->renderCacheStats = $renderCacheStats;
  }
  /**
   * @return IndexingEmbeddedContentRenderCacheStats
   */
  public function getRenderCacheStats()
  {
    return $this->renderCacheStats;
  }
  /**
   * @param string
   */
  public function setRenderEngine($renderEngine)
  {
    $this->renderEngine = $renderEngine;
  }
  /**
   * @return string
   */
  public function getRenderEngine()
  {
    return $this->renderEngine;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoRenderEvent[]
   */
  public function setRenderEvent($renderEvent)
  {
    $this->renderEvent = $renderEvent;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoRenderEvent[]
   */
  public function getRenderEvent()
  {
    return $this->renderEvent;
  }
  /**
   * @param string
   */
  public function setRenderServerCl($renderServerCl)
  {
    $this->renderServerCl = $renderServerCl;
  }
  /**
   * @return string
   */
  public function getRenderServerCl()
  {
    return $this->renderServerCl;
  }
  public function setRenderTreeQualityScore($renderTreeQualityScore)
  {
    $this->renderTreeQualityScore = $renderTreeQualityScore;
  }
  public function getRenderTreeQualityScore()
  {
    return $this->renderTreeQualityScore;
  }
  /**
   * @param string
   */
  public function setRenderedSnapshotSignature($renderedSnapshotSignature)
  {
    $this->renderedSnapshotSignature = $renderedSnapshotSignature;
  }
  /**
   * @return string
   */
  public function getRenderedSnapshotSignature()
  {
    return $this->renderedSnapshotSignature;
  }
  /**
   * @param string
   */
  public function setRenderedTimeUsec($renderedTimeUsec)
  {
    $this->renderedTimeUsec = $renderedTimeUsec;
  }
  /**
   * @return string
   */
  public function getRenderedTimeUsec()
  {
    return $this->renderedTimeUsec;
  }
  /**
   * @param IndexingEmbeddedContentRenderingFetchStats
   */
  public function setRenderingFetchStats(IndexingEmbeddedContentRenderingFetchStats $renderingFetchStats)
  {
    $this->renderingFetchStats = $renderingFetchStats;
  }
  /**
   * @return IndexingEmbeddedContentRenderingFetchStats
   */
  public function getRenderingFetchStats()
  {
    return $this->renderingFetchStats;
  }
  /**
   * @param IndexingEmbeddedContentSelectionResult
   */
  public function setSelectionResult(IndexingEmbeddedContentSelectionResult $selectionResult)
  {
    $this->selectionResult = $selectionResult;
  }
  /**
   * @return IndexingEmbeddedContentSelectionResult
   */
  public function getSelectionResult()
  {
    return $this->selectionResult;
  }
  public function setSnapshotQualityScore($snapshotQualityScore)
  {
    $this->snapshotQualityScore = $snapshotQualityScore;
  }
  public function getSnapshotQualityScore()
  {
    return $this->snapshotQualityScore;
  }
  /**
   * @param bool
   */
  public function setWithMissingResources($withMissingResources)
  {
    $this->withMissingResources = $withMissingResources;
  }
  /**
   * @return bool
   */
  public function getWithMissingResources()
  {
    return $this->withMissingResources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingEmbeddedContentRenderingOutputMetadata::class, 'Google_Service_Contentwarehouse_IndexingEmbeddedContentRenderingOutputMetadata');
