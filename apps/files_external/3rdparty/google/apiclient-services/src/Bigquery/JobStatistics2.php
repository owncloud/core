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

class JobStatistics2 extends \Google\Collection
{
  protected $collection_key = 'undeclaredQueryParameters';
  protected $biEngineStatisticsType = BiEngineStatistics::class;
  protected $biEngineStatisticsDataType = '';
  public $billingTier;
  public $cacheHit;
  public $ddlAffectedRowAccessPolicyCount;
  protected $ddlDestinationTableType = TableReference::class;
  protected $ddlDestinationTableDataType = '';
  public $ddlOperationPerformed;
  protected $ddlTargetDatasetType = DatasetReference::class;
  protected $ddlTargetDatasetDataType = '';
  protected $ddlTargetRoutineType = RoutineReference::class;
  protected $ddlTargetRoutineDataType = '';
  protected $ddlTargetRowAccessPolicyType = RowAccessPolicyReference::class;
  protected $ddlTargetRowAccessPolicyDataType = '';
  protected $ddlTargetTableType = TableReference::class;
  protected $ddlTargetTableDataType = '';
  protected $dmlStatsType = DmlStatistics::class;
  protected $dmlStatsDataType = '';
  public $estimatedBytesProcessed;
  protected $modelTrainingType = BigQueryModelTraining::class;
  protected $modelTrainingDataType = '';
  public $modelTrainingCurrentIteration;
  public $modelTrainingExpectedTotalIteration;
  public $numDmlAffectedRows;
  protected $queryPlanType = ExplainQueryStage::class;
  protected $queryPlanDataType = 'array';
  protected $referencedRoutinesType = RoutineReference::class;
  protected $referencedRoutinesDataType = 'array';
  protected $referencedTablesType = TableReference::class;
  protected $referencedTablesDataType = 'array';
  protected $reservationUsageType = JobStatistics2ReservationUsage::class;
  protected $reservationUsageDataType = 'array';
  protected $schemaType = TableSchema::class;
  protected $schemaDataType = '';
  public $statementType;
  protected $timelineType = QueryTimelineSample::class;
  protected $timelineDataType = 'array';
  public $totalBytesBilled;
  public $totalBytesProcessed;
  public $totalBytesProcessedAccuracy;
  public $totalPartitionsProcessed;
  public $totalSlotMs;
  protected $undeclaredQueryParametersType = QueryParameter::class;
  protected $undeclaredQueryParametersDataType = 'array';

  /**
   * @param BiEngineStatistics
   */
  public function setBiEngineStatistics(BiEngineStatistics $biEngineStatistics)
  {
    $this->biEngineStatistics = $biEngineStatistics;
  }
  /**
   * @return BiEngineStatistics
   */
  public function getBiEngineStatistics()
  {
    return $this->biEngineStatistics;
  }
  public function setBillingTier($billingTier)
  {
    $this->billingTier = $billingTier;
  }
  public function getBillingTier()
  {
    return $this->billingTier;
  }
  public function setCacheHit($cacheHit)
  {
    $this->cacheHit = $cacheHit;
  }
  public function getCacheHit()
  {
    return $this->cacheHit;
  }
  public function setDdlAffectedRowAccessPolicyCount($ddlAffectedRowAccessPolicyCount)
  {
    $this->ddlAffectedRowAccessPolicyCount = $ddlAffectedRowAccessPolicyCount;
  }
  public function getDdlAffectedRowAccessPolicyCount()
  {
    return $this->ddlAffectedRowAccessPolicyCount;
  }
  /**
   * @param TableReference
   */
  public function setDdlDestinationTable(TableReference $ddlDestinationTable)
  {
    $this->ddlDestinationTable = $ddlDestinationTable;
  }
  /**
   * @return TableReference
   */
  public function getDdlDestinationTable()
  {
    return $this->ddlDestinationTable;
  }
  public function setDdlOperationPerformed($ddlOperationPerformed)
  {
    $this->ddlOperationPerformed = $ddlOperationPerformed;
  }
  public function getDdlOperationPerformed()
  {
    return $this->ddlOperationPerformed;
  }
  /**
   * @param DatasetReference
   */
  public function setDdlTargetDataset(DatasetReference $ddlTargetDataset)
  {
    $this->ddlTargetDataset = $ddlTargetDataset;
  }
  /**
   * @return DatasetReference
   */
  public function getDdlTargetDataset()
  {
    return $this->ddlTargetDataset;
  }
  /**
   * @param RoutineReference
   */
  public function setDdlTargetRoutine(RoutineReference $ddlTargetRoutine)
  {
    $this->ddlTargetRoutine = $ddlTargetRoutine;
  }
  /**
   * @return RoutineReference
   */
  public function getDdlTargetRoutine()
  {
    return $this->ddlTargetRoutine;
  }
  /**
   * @param RowAccessPolicyReference
   */
  public function setDdlTargetRowAccessPolicy(RowAccessPolicyReference $ddlTargetRowAccessPolicy)
  {
    $this->ddlTargetRowAccessPolicy = $ddlTargetRowAccessPolicy;
  }
  /**
   * @return RowAccessPolicyReference
   */
  public function getDdlTargetRowAccessPolicy()
  {
    return $this->ddlTargetRowAccessPolicy;
  }
  /**
   * @param TableReference
   */
  public function setDdlTargetTable(TableReference $ddlTargetTable)
  {
    $this->ddlTargetTable = $ddlTargetTable;
  }
  /**
   * @return TableReference
   */
  public function getDdlTargetTable()
  {
    return $this->ddlTargetTable;
  }
  /**
   * @param DmlStatistics
   */
  public function setDmlStats(DmlStatistics $dmlStats)
  {
    $this->dmlStats = $dmlStats;
  }
  /**
   * @return DmlStatistics
   */
  public function getDmlStats()
  {
    return $this->dmlStats;
  }
  public function setEstimatedBytesProcessed($estimatedBytesProcessed)
  {
    $this->estimatedBytesProcessed = $estimatedBytesProcessed;
  }
  public function getEstimatedBytesProcessed()
  {
    return $this->estimatedBytesProcessed;
  }
  /**
   * @param BigQueryModelTraining
   */
  public function setModelTraining(BigQueryModelTraining $modelTraining)
  {
    $this->modelTraining = $modelTraining;
  }
  /**
   * @return BigQueryModelTraining
   */
  public function getModelTraining()
  {
    return $this->modelTraining;
  }
  public function setModelTrainingCurrentIteration($modelTrainingCurrentIteration)
  {
    $this->modelTrainingCurrentIteration = $modelTrainingCurrentIteration;
  }
  public function getModelTrainingCurrentIteration()
  {
    return $this->modelTrainingCurrentIteration;
  }
  public function setModelTrainingExpectedTotalIteration($modelTrainingExpectedTotalIteration)
  {
    $this->modelTrainingExpectedTotalIteration = $modelTrainingExpectedTotalIteration;
  }
  public function getModelTrainingExpectedTotalIteration()
  {
    return $this->modelTrainingExpectedTotalIteration;
  }
  public function setNumDmlAffectedRows($numDmlAffectedRows)
  {
    $this->numDmlAffectedRows = $numDmlAffectedRows;
  }
  public function getNumDmlAffectedRows()
  {
    return $this->numDmlAffectedRows;
  }
  /**
   * @param ExplainQueryStage[]
   */
  public function setQueryPlan($queryPlan)
  {
    $this->queryPlan = $queryPlan;
  }
  /**
   * @return ExplainQueryStage[]
   */
  public function getQueryPlan()
  {
    return $this->queryPlan;
  }
  /**
   * @param RoutineReference[]
   */
  public function setReferencedRoutines($referencedRoutines)
  {
    $this->referencedRoutines = $referencedRoutines;
  }
  /**
   * @return RoutineReference[]
   */
  public function getReferencedRoutines()
  {
    return $this->referencedRoutines;
  }
  /**
   * @param TableReference[]
   */
  public function setReferencedTables($referencedTables)
  {
    $this->referencedTables = $referencedTables;
  }
  /**
   * @return TableReference[]
   */
  public function getReferencedTables()
  {
    return $this->referencedTables;
  }
  /**
   * @param JobStatistics2ReservationUsage[]
   */
  public function setReservationUsage($reservationUsage)
  {
    $this->reservationUsage = $reservationUsage;
  }
  /**
   * @return JobStatistics2ReservationUsage[]
   */
  public function getReservationUsage()
  {
    return $this->reservationUsage;
  }
  /**
   * @param TableSchema
   */
  public function setSchema(TableSchema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return TableSchema
   */
  public function getSchema()
  {
    return $this->schema;
  }
  public function setStatementType($statementType)
  {
    $this->statementType = $statementType;
  }
  public function getStatementType()
  {
    return $this->statementType;
  }
  /**
   * @param QueryTimelineSample[]
   */
  public function setTimeline($timeline)
  {
    $this->timeline = $timeline;
  }
  /**
   * @return QueryTimelineSample[]
   */
  public function getTimeline()
  {
    return $this->timeline;
  }
  public function setTotalBytesBilled($totalBytesBilled)
  {
    $this->totalBytesBilled = $totalBytesBilled;
  }
  public function getTotalBytesBilled()
  {
    return $this->totalBytesBilled;
  }
  public function setTotalBytesProcessed($totalBytesProcessed)
  {
    $this->totalBytesProcessed = $totalBytesProcessed;
  }
  public function getTotalBytesProcessed()
  {
    return $this->totalBytesProcessed;
  }
  public function setTotalBytesProcessedAccuracy($totalBytesProcessedAccuracy)
  {
    $this->totalBytesProcessedAccuracy = $totalBytesProcessedAccuracy;
  }
  public function getTotalBytesProcessedAccuracy()
  {
    return $this->totalBytesProcessedAccuracy;
  }
  public function setTotalPartitionsProcessed($totalPartitionsProcessed)
  {
    $this->totalPartitionsProcessed = $totalPartitionsProcessed;
  }
  public function getTotalPartitionsProcessed()
  {
    return $this->totalPartitionsProcessed;
  }
  public function setTotalSlotMs($totalSlotMs)
  {
    $this->totalSlotMs = $totalSlotMs;
  }
  public function getTotalSlotMs()
  {
    return $this->totalSlotMs;
  }
  /**
   * @param QueryParameter[]
   */
  public function setUndeclaredQueryParameters($undeclaredQueryParameters)
  {
    $this->undeclaredQueryParameters = $undeclaredQueryParameters;
  }
  /**
   * @return QueryParameter[]
   */
  public function getUndeclaredQueryParameters()
  {
    return $this->undeclaredQueryParameters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobStatistics2::class, 'Google_Service_Bigquery_JobStatistics2');
