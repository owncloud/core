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
  public $adjustStepChanges;
  public $autoArima;
  public $autoArimaMaxOrder;
  public $batchSize;
  public $cleanSpikesAndDips;
  public $dataFrequency;
  public $dataSplitColumn;
  public $dataSplitEvalFraction;
  public $dataSplitMethod;
  public $decomposeTimeSeries;
  public $distanceType;
  public $dropout;
  public $earlyStop;
  public $feedbackType;
  public $hiddenUnits;
  public $holidayRegion;
  public $horizon;
  public $includeDrift;
  public $initialLearnRate;
  public $inputLabelColumns;
  public $itemColumn;
  public $kmeansInitializationColumn;
  public $kmeansInitializationMethod;
  public $l1Regularization;
  public $l2Regularization;
  public $labelClassWeights;
  public $learnRate;
  public $learnRateStrategy;
  public $lossType;
  public $maxIterations;
  public $maxTreeDepth;
  public $minRelativeProgress;
  public $minSplitLoss;
  public $modelUri;
  protected $nonSeasonalOrderType = ArimaOrder::class;
  protected $nonSeasonalOrderDataType = '';
  public $numClusters;
  public $numFactors;
  public $optimizationStrategy;
  public $preserveInputStructs;
  public $subsample;
  public $timeSeriesDataColumn;
  public $timeSeriesIdColumn;
  public $timeSeriesIdColumns;
  public $timeSeriesTimestampColumn;
  public $userColumn;
  public $walsAlpha;
  public $warmStart;

  public function setAdjustStepChanges($adjustStepChanges)
  {
    $this->adjustStepChanges = $adjustStepChanges;
  }
  public function getAdjustStepChanges()
  {
    return $this->adjustStepChanges;
  }
  public function setAutoArima($autoArima)
  {
    $this->autoArima = $autoArima;
  }
  public function getAutoArima()
  {
    return $this->autoArima;
  }
  public function setAutoArimaMaxOrder($autoArimaMaxOrder)
  {
    $this->autoArimaMaxOrder = $autoArimaMaxOrder;
  }
  public function getAutoArimaMaxOrder()
  {
    return $this->autoArimaMaxOrder;
  }
  public function setBatchSize($batchSize)
  {
    $this->batchSize = $batchSize;
  }
  public function getBatchSize()
  {
    return $this->batchSize;
  }
  public function setCleanSpikesAndDips($cleanSpikesAndDips)
  {
    $this->cleanSpikesAndDips = $cleanSpikesAndDips;
  }
  public function getCleanSpikesAndDips()
  {
    return $this->cleanSpikesAndDips;
  }
  public function setDataFrequency($dataFrequency)
  {
    $this->dataFrequency = $dataFrequency;
  }
  public function getDataFrequency()
  {
    return $this->dataFrequency;
  }
  public function setDataSplitColumn($dataSplitColumn)
  {
    $this->dataSplitColumn = $dataSplitColumn;
  }
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
  public function setDataSplitMethod($dataSplitMethod)
  {
    $this->dataSplitMethod = $dataSplitMethod;
  }
  public function getDataSplitMethod()
  {
    return $this->dataSplitMethod;
  }
  public function setDecomposeTimeSeries($decomposeTimeSeries)
  {
    $this->decomposeTimeSeries = $decomposeTimeSeries;
  }
  public function getDecomposeTimeSeries()
  {
    return $this->decomposeTimeSeries;
  }
  public function setDistanceType($distanceType)
  {
    $this->distanceType = $distanceType;
  }
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
  public function setEarlyStop($earlyStop)
  {
    $this->earlyStop = $earlyStop;
  }
  public function getEarlyStop()
  {
    return $this->earlyStop;
  }
  public function setFeedbackType($feedbackType)
  {
    $this->feedbackType = $feedbackType;
  }
  public function getFeedbackType()
  {
    return $this->feedbackType;
  }
  public function setHiddenUnits($hiddenUnits)
  {
    $this->hiddenUnits = $hiddenUnits;
  }
  public function getHiddenUnits()
  {
    return $this->hiddenUnits;
  }
  public function setHolidayRegion($holidayRegion)
  {
    $this->holidayRegion = $holidayRegion;
  }
  public function getHolidayRegion()
  {
    return $this->holidayRegion;
  }
  public function setHorizon($horizon)
  {
    $this->horizon = $horizon;
  }
  public function getHorizon()
  {
    return $this->horizon;
  }
  public function setIncludeDrift($includeDrift)
  {
    $this->includeDrift = $includeDrift;
  }
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
  public function setInputLabelColumns($inputLabelColumns)
  {
    $this->inputLabelColumns = $inputLabelColumns;
  }
  public function getInputLabelColumns()
  {
    return $this->inputLabelColumns;
  }
  public function setItemColumn($itemColumn)
  {
    $this->itemColumn = $itemColumn;
  }
  public function getItemColumn()
  {
    return $this->itemColumn;
  }
  public function setKmeansInitializationColumn($kmeansInitializationColumn)
  {
    $this->kmeansInitializationColumn = $kmeansInitializationColumn;
  }
  public function getKmeansInitializationColumn()
  {
    return $this->kmeansInitializationColumn;
  }
  public function setKmeansInitializationMethod($kmeansInitializationMethod)
  {
    $this->kmeansInitializationMethod = $kmeansInitializationMethod;
  }
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
  public function setLearnRateStrategy($learnRateStrategy)
  {
    $this->learnRateStrategy = $learnRateStrategy;
  }
  public function getLearnRateStrategy()
  {
    return $this->learnRateStrategy;
  }
  public function setLossType($lossType)
  {
    $this->lossType = $lossType;
  }
  public function getLossType()
  {
    return $this->lossType;
  }
  public function setMaxIterations($maxIterations)
  {
    $this->maxIterations = $maxIterations;
  }
  public function getMaxIterations()
  {
    return $this->maxIterations;
  }
  public function setMaxTreeDepth($maxTreeDepth)
  {
    $this->maxTreeDepth = $maxTreeDepth;
  }
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
  public function setModelUri($modelUri)
  {
    $this->modelUri = $modelUri;
  }
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
  public function setNumClusters($numClusters)
  {
    $this->numClusters = $numClusters;
  }
  public function getNumClusters()
  {
    return $this->numClusters;
  }
  public function setNumFactors($numFactors)
  {
    $this->numFactors = $numFactors;
  }
  public function getNumFactors()
  {
    return $this->numFactors;
  }
  public function setOptimizationStrategy($optimizationStrategy)
  {
    $this->optimizationStrategy = $optimizationStrategy;
  }
  public function getOptimizationStrategy()
  {
    return $this->optimizationStrategy;
  }
  public function setPreserveInputStructs($preserveInputStructs)
  {
    $this->preserveInputStructs = $preserveInputStructs;
  }
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
  public function setTimeSeriesDataColumn($timeSeriesDataColumn)
  {
    $this->timeSeriesDataColumn = $timeSeriesDataColumn;
  }
  public function getTimeSeriesDataColumn()
  {
    return $this->timeSeriesDataColumn;
  }
  public function setTimeSeriesIdColumn($timeSeriesIdColumn)
  {
    $this->timeSeriesIdColumn = $timeSeriesIdColumn;
  }
  public function getTimeSeriesIdColumn()
  {
    return $this->timeSeriesIdColumn;
  }
  public function setTimeSeriesIdColumns($timeSeriesIdColumns)
  {
    $this->timeSeriesIdColumns = $timeSeriesIdColumns;
  }
  public function getTimeSeriesIdColumns()
  {
    return $this->timeSeriesIdColumns;
  }
  public function setTimeSeriesTimestampColumn($timeSeriesTimestampColumn)
  {
    $this->timeSeriesTimestampColumn = $timeSeriesTimestampColumn;
  }
  public function getTimeSeriesTimestampColumn()
  {
    return $this->timeSeriesTimestampColumn;
  }
  public function setUserColumn($userColumn)
  {
    $this->userColumn = $userColumn;
  }
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
  public function setWarmStart($warmStart)
  {
    $this->warmStart = $warmStart;
  }
  public function getWarmStart()
  {
    return $this->warmStart;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrainingOptions::class, 'Google_Service_Bigquery_TrainingOptions');
