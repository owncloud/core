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

namespace Google\Service\Bigquery;

class TrainingOptions extends \Google\Collection
{
  protected $collection_key = 'timeSeriesIdColumns';
  /**
   * @var bool
   */
  public $adjustStepChanges;
  /**
   * @var bool
   */
  public $autoArima;
  /**
   * @var string
   */
  public $autoArimaMaxOrder;
  /**
   * @var string
   */
  public $batchSize;
  /**
   * @var string
   */
  public $boosterType;
  /**
   * @var bool
   */
  public $cleanSpikesAndDips;
  public $colsampleBylevel;
  public $colsampleBynode;
  public $colsampleBytree;
  /**
   * @var string
   */
  public $dartNormalizeType;
  /**
   * @var string
   */
  public $dataFrequency;
  /**
   * @var string
   */
  public $dataSplitColumn;
  public $dataSplitEvalFraction;
  /**
   * @var string
   */
  public $dataSplitMethod;
  /**
   * @var bool
   */
  public $decomposeTimeSeries;
  /**
   * @var string
   */
  public $distanceType;
  public $dropout;
  /**
   * @var bool
   */
  public $earlyStop;
  /**
   * @var string
   */
  public $feedbackType;
  /**
   * @var string[]
   */
  public $hiddenUnits;
  /**
   * @var string
   */
  public $holidayRegion;
  /**
   * @var string
   */
  public $horizon;
  /**
   * @var bool
   */
  public $includeDrift;
  public $initialLearnRate;
  /**
   * @var string[]
   */
  public $inputLabelColumns;
  /**
   * @var string
   */
  public $itemColumn;
  /**
   * @var string
   */
  public $kmeansInitializationColumn;
  /**
   * @var string
   */
  public $kmeansInitializationMethod;
  public $l1Regularization;
  public $l2Regularization;
  public $labelClassWeights;
  public $learnRate;
  /**
   * @var string
   */
  public $learnRateStrategy;
  /**
   * @var string
   */
  public $lossType;
  /**
   * @var string
   */
  public $maxIterations;
  /**
   * @var string
   */
  public $maxTreeDepth;
  public $minRelativeProgress;
  public $minSplitLoss;
  /**
   * @var string
   */
  public $minTreeChildWeight;
  /**
   * @var string
   */
  public $modelUri;
  protected $nonSeasonalOrderType = ArimaOrder::class;
  protected $nonSeasonalOrderDataType = '';
  /**
   * @var string
   */
  public $numClusters;
  /**
   * @var string
   */
  public $numFactors;
  /**
   * @var string
   */
  public $numParallelTree;
  /**
   * @var string
   */
  public $optimizationStrategy;
  /**
   * @var bool
   */
  public $preserveInputStructs;
  public $subsample;
  /**
   * @var string
   */
  public $timeSeriesDataColumn;
  /**
   * @var string
   */
  public $timeSeriesIdColumn;
  /**
   * @var string[]
   */
  public $timeSeriesIdColumns;
  /**
   * @var string
   */
  public $timeSeriesTimestampColumn;
  /**
   * @var string
   */
  public $treeMethod;
  /**
   * @var string
   */
  public $userColumn;
  public $walsAlpha;
  /**
   * @var bool
   */
  public $warmStart;

  /**
   * @param bool
   */
  public function setAdjustStepChanges($adjustStepChanges)
  {
    $this->adjustStepChanges = $adjustStepChanges;
  }
  /**
   * @return bool
   */
  public function getAdjustStepChanges()
  {
    return $this->adjustStepChanges;
  }
  /**
   * @param bool
   */
  public function setAutoArima($autoArima)
  {
    $this->autoArima = $autoArima;
  }
  /**
   * @return bool
   */
  public function getAutoArima()
  {
    return $this->autoArima;
  }
  /**
   * @param string
   */
  public function setAutoArimaMaxOrder($autoArimaMaxOrder)
  {
    $this->autoArimaMaxOrder = $autoArimaMaxOrder;
  }
  /**
   * @return string
   */
  public function getAutoArimaMaxOrder()
  {
    return $this->autoArimaMaxOrder;
  }
  /**
   * @param string
   */
  public function setBatchSize($batchSize)
  {
    $this->batchSize = $batchSize;
  }
  /**
   * @return string
   */
  public function getBatchSize()
  {
    return $this->batchSize;
  }
  /**
   * @param string
   */
  public function setBoosterType($boosterType)
  {
    $this->boosterType = $boosterType;
  }
  /**
   * @return string
   */
  public function getBoosterType()
  {
    return $this->boosterType;
  }
  /**
   * @param bool
   */
  public function setCleanSpikesAndDips($cleanSpikesAndDips)
  {
    $this->cleanSpikesAndDips = $cleanSpikesAndDips;
  }
  /**
   * @return bool
   */
  public function getCleanSpikesAndDips()
  {
    return $this->cleanSpikesAndDips;
  }
  public function setColsampleBylevel($colsampleBylevel)
  {
    $this->colsampleBylevel = $colsampleBylevel;
  }
  public function getColsampleBylevel()
  {
    return $this->colsampleBylevel;
  }
  public function setColsampleBynode($colsampleBynode)
  {
    $this->colsampleBynode = $colsampleBynode;
  }
  public function getColsampleBynode()
  {
    return $this->colsampleBynode;
  }
  public function setColsampleBytree($colsampleBytree)
  {
    $this->colsampleBytree = $colsampleBytree;
  }
  public function getColsampleBytree()
  {
    return $this->colsampleBytree;
  }
  /**
   * @param string
   */
  public function setDartNormalizeType($dartNormalizeType)
  {
    $this->dartNormalizeType = $dartNormalizeType;
  }
  /**
   * @return string
   */
  public function getDartNormalizeType()
  {
    return $this->dartNormalizeType;
  }
  /**
   * @param string
   */
  public function setDataFrequency($dataFrequency)
  {
    $this->dataFrequency = $dataFrequency;
  }
  /**
   * @return string
   */
  public function getDataFrequency()
  {
    return $this->dataFrequency;
  }
  /**
   * @param string
   */
  public function setDataSplitColumn($dataSplitColumn)
  {
    $this->dataSplitColumn = $dataSplitColumn;
  }
  /**
   * @return string
   */
  public function getDataSplitColumn()
  {
    return $this->dataSplitColumn;
  }
  public function setDataSplitEvalFraction($dataSplitEvalFraction)
  {
    $this->dataSplitEvalFraction = $dataSplitEvalFraction;
  }
  public function getDataSplitEvalFraction()
  {
    return $this->dataSplitEvalFraction;
  }
  /**
   * @param string
   */
  public function setDataSplitMethod($dataSplitMethod)
  {
    $this->dataSplitMethod = $dataSplitMethod;
  }
  /**
   * @return string
   */
  public function getDataSplitMethod()
  {
    return $this->dataSplitMethod;
  }
  /**
   * @param bool
   */
  public function setDecomposeTimeSeries($decomposeTimeSeries)
  {
    $this->decomposeTimeSeries = $decomposeTimeSeries;
  }
  /**
   * @return bool
   */
  public function getDecomposeTimeSeries()
  {
    return $this->decomposeTimeSeries;
  }
  /**
   * @param string
   */
  public function setDistanceType($distanceType)
  {
    $this->distanceType = $distanceType;
  }
  /**
   * @return string
   */
  public function getDistanceType()
  {
    return $this->distanceType;
  }
  public function setDropout($dropout)
  {
    $this->dropout = $dropout;
  }
  public function getDropout()
  {
    return $this->dropout;
  }
  /**
   * @param bool
   */
  public function setEarlyStop($earlyStop)
  {
    $this->earlyStop = $earlyStop;
  }
  /**
   * @return bool
   */
  public function getEarlyStop()
  {
    return $this->earlyStop;
  }
  /**
   * @param string
   */
  public function setFeedbackType($feedbackType)
  {
    $this->feedbackType = $feedbackType;
  }
  /**
   * @return string
   */
  public function getFeedbackType()
  {
    return $this->feedbackType;
  }
  /**
   * @param string[]
   */
  public function setHiddenUnits($hiddenUnits)
  {
    $this->hiddenUnits = $hiddenUnits;
  }
  /**
   * @return string[]
   */
  public function getHiddenUnits()
  {
    return $this->hiddenUnits;
  }
  /**
   * @param string
   */
  public function setHolidayRegion($holidayRegion)
  {
    $this->holidayRegion = $holidayRegion;
  }
  /**
   * @return string
   */
  public function getHolidayRegion()
  {
    return $this->holidayRegion;
  }
  /**
   * @param string
   */
  public function setHorizon($horizon)
  {
    $this->horizon = $horizon;
  }
  /**
   * @return string
   */
  public function getHorizon()
  {
    return $this->horizon;
  }
  /**
   * @param bool
   */
  public function setIncludeDrift($includeDrift)
  {
    $this->includeDrift = $includeDrift;
  }
  /**
   * @return bool
   */
  public function getIncludeDrift()
  {
    return $this->includeDrift;
  }
  public function setInitialLearnRate($initialLearnRate)
  {
    $this->initialLearnRate = $initialLearnRate;
  }
  public function getInitialLearnRate()
  {
    return $this->initialLearnRate;
  }
  /**
   * @param string[]
   */
  public function setInputLabelColumns($inputLabelColumns)
  {
    $this->inputLabelColumns = $inputLabelColumns;
  }
  /**
   * @return string[]
   */
  public function getInputLabelColumns()
  {
    return $this->inputLabelColumns;
  }
  /**
   * @param string
   */
  public function setItemColumn($itemColumn)
  {
    $this->itemColumn = $itemColumn;
  }
  /**
   * @return string
   */
  public function getItemColumn()
  {
    return $this->itemColumn;
  }
  /**
   * @param string
   */
  public function setKmeansInitializationColumn($kmeansInitializationColumn)
  {
    $this->kmeansInitializationColumn = $kmeansInitializationColumn;
  }
  /**
   * @return string
   */
  public function getKmeansInitializationColumn()
  {
    return $this->kmeansInitializationColumn;
  }
  /**
   * @param string
   */
  public function setKmeansInitializationMethod($kmeansInitializationMethod)
  {
    $this->kmeansInitializationMethod = $kmeansInitializationMethod;
  }
  /**
   * @return string
   */
  public function getKmeansInitializationMethod()
  {
    return $this->kmeansInitializationMethod;
  }
  public function setL1Regularization($l1Regularization)
  {
    $this->l1Regularization = $l1Regularization;
  }
  public function getL1Regularization()
  {
    return $this->l1Regularization;
  }
  public function setL2Regularization($l2Regularization)
  {
    $this->l2Regularization = $l2Regularization;
  }
  public function getL2Regularization()
  {
    return $this->l2Regularization;
  }
  public function setLabelClassWeights($labelClassWeights)
  {
    $this->labelClassWeights = $labelClassWeights;
  }
  public function getLabelClassWeights()
  {
    return $this->labelClassWeights;
  }
  public function setLearnRate($learnRate)
  {
    $this->learnRate = $learnRate;
  }
  public function getLearnRate()
  {
    return $this->learnRate;
  }
  /**
   * @param string
   */
  public function setLearnRateStrategy($learnRateStrategy)
  {
    $this->learnRateStrategy = $learnRateStrategy;
  }
  /**
   * @return string
   */
  public function getLearnRateStrategy()
  {
    return $this->learnRateStrategy;
  }
  /**
   * @param string
   */
  public function setLossType($lossType)
  {
    $this->lossType = $lossType;
  }
  /**
   * @return string
   */
  public function getLossType()
  {
    return $this->lossType;
  }
  /**
   * @param string
   */
  public function setMaxIterations($maxIterations)
  {
    $this->maxIterations = $maxIterations;
  }
  /**
   * @return string
   */
  public function getMaxIterations()
  {
    return $this->maxIterations;
  }
  /**
   * @param string
   */
  public function setMaxTreeDepth($maxTreeDepth)
  {
    $this->maxTreeDepth = $maxTreeDepth;
  }
  /**
   * @return string
   */
  public function getMaxTreeDepth()
  {
    return $this->maxTreeDepth;
  }
  public function setMinRelativeProgress($minRelativeProgress)
  {
    $this->minRelativeProgress = $minRelativeProgress;
  }
  public function getMinRelativeProgress()
  {
    return $this->minRelativeProgress;
  }
  public function setMinSplitLoss($minSplitLoss)
  {
    $this->minSplitLoss = $minSplitLoss;
  }
  public function getMinSplitLoss()
  {
    return $this->minSplitLoss;
  }
  /**
   * @param string
   */
  public function setMinTreeChildWeight($minTreeChildWeight)
  {
    $this->minTreeChildWeight = $minTreeChildWeight;
  }
  /**
   * @return string
   */
  public function getMinTreeChildWeight()
  {
    return $this->minTreeChildWeight;
  }
  /**
   * @param string
   */
  public function setModelUri($modelUri)
  {
    $this->modelUri = $modelUri;
  }
  /**
   * @return string
   */
  public function getModelUri()
  {
    return $this->modelUri;
  }
  /**
   * @param ArimaOrder
   */
  public function setNonSeasonalOrder(ArimaOrder $nonSeasonalOrder)
  {
    $this->nonSeasonalOrder = $nonSeasonalOrder;
  }
  /**
   * @return ArimaOrder
   */
  public function getNonSeasonalOrder()
  {
    return $this->nonSeasonalOrder;
  }
  /**
   * @param string
   */
  public function setNumClusters($numClusters)
  {
    $this->numClusters = $numClusters;
  }
  /**
   * @return string
   */
  public function getNumClusters()
  {
    return $this->numClusters;
  }
  /**
   * @param string
   */
  public function setNumFactors($numFactors)
  {
    $this->numFactors = $numFactors;
  }
  /**
   * @return string
   */
  public function getNumFactors()
  {
    return $this->numFactors;
  }
  /**
   * @param string
   */
  public function setNumParallelTree($numParallelTree)
  {
    $this->numParallelTree = $numParallelTree;
  }
  /**
   * @return string
   */
  public function getNumParallelTree()
  {
    return $this->numParallelTree;
  }
  /**
   * @param string
   */
  public function setOptimizationStrategy($optimizationStrategy)
  {
    $this->optimizationStrategy = $optimizationStrategy;
  }
  /**
   * @return string
   */
  public function getOptimizationStrategy()
  {
    return $this->optimizationStrategy;
  }
  /**
   * @param bool
   */
  public function setPreserveInputStructs($preserveInputStructs)
  {
    $this->preserveInputStructs = $preserveInputStructs;
  }
  /**
   * @return bool
   */
  public function getPreserveInputStructs()
  {
    return $this->preserveInputStructs;
  }
  public function setSubsample($subsample)
  {
    $this->subsample = $subsample;
  }
  public function getSubsample()
  {
    return $this->subsample;
  }
  /**
   * @param string
   */
  public function setTimeSeriesDataColumn($timeSeriesDataColumn)
  {
    $this->timeSeriesDataColumn = $timeSeriesDataColumn;
  }
  /**
   * @return string
   */
  public function getTimeSeriesDataColumn()
  {
    return $this->timeSeriesDataColumn;
  }
  /**
   * @param string
   */
  public function setTimeSeriesIdColumn($timeSeriesIdColumn)
  {
    $this->timeSeriesIdColumn = $timeSeriesIdColumn;
  }
  /**
   * @return string
   */
  public function getTimeSeriesIdColumn()
  {
    return $this->timeSeriesIdColumn;
  }
  /**
   * @param string[]
   */
  public function setTimeSeriesIdColumns($timeSeriesIdColumns)
  {
    $this->timeSeriesIdColumns = $timeSeriesIdColumns;
  }
  /**
   * @return string[]
   */
  public function getTimeSeriesIdColumns()
  {
    return $this->timeSeriesIdColumns;
  }
  /**
   * @param string
   */
  public function setTimeSeriesTimestampColumn($timeSeriesTimestampColumn)
  {
    $this->timeSeriesTimestampColumn = $timeSeriesTimestampColumn;
  }
  /**
   * @return string
   */
  public function getTimeSeriesTimestampColumn()
  {
    return $this->timeSeriesTimestampColumn;
  }
  /**
   * @param string
   */
  public function setTreeMethod($treeMethod)
  {
    $this->treeMethod = $treeMethod;
  }
  /**
   * @return string
   */
  public function getTreeMethod()
  {
    return $this->treeMethod;
  }
  /**
   * @param string
   */
  public function setUserColumn($userColumn)
  {
    $this->userColumn = $userColumn;
  }
  /**
   * @return string
   */
  public function getUserColumn()
  {
    return $this->userColumn;
  }
  public function setWalsAlpha($walsAlpha)
  {
    $this->walsAlpha = $walsAlpha;
  }
  public function getWalsAlpha()
  {
    return $this->walsAlpha;
  }
  /**
   * @param bool
   */
  public function setWarmStart($warmStart)
  {
    $this->warmStart = $warmStart;
  }
  /**
   * @return bool
   */
  public function getWarmStart()
  {
    return $this->warmStart;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrainingOptions::class, 'Google_Service_Bigquery_TrainingOptions');
