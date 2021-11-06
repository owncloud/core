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

namespace Google\Service\Dataproc;

class Job extends \Google\Collection
{
  protected $collection_key = 'yarnApplications';
  public $done;
  public $driverControlFilesUri;
  public $driverOutputResourceUri;
  protected $hadoopJobType = HadoopJob::class;
  protected $hadoopJobDataType = '';
  protected $hiveJobType = HiveJob::class;
  protected $hiveJobDataType = '';
  public $jobUuid;
  public $labels;
  protected $pigJobType = PigJob::class;
  protected $pigJobDataType = '';
  protected $placementType = JobPlacement::class;
  protected $placementDataType = '';
  protected $prestoJobType = PrestoJob::class;
  protected $prestoJobDataType = '';
  protected $pysparkJobType = PySparkJob::class;
  protected $pysparkJobDataType = '';
  protected $referenceType = JobReference::class;
  protected $referenceDataType = '';
  protected $schedulingType = JobScheduling::class;
  protected $schedulingDataType = '';
  protected $sparkJobType = SparkJob::class;
  protected $sparkJobDataType = '';
  protected $sparkRJobType = SparkRJob::class;
  protected $sparkRJobDataType = '';
  protected $sparkSqlJobType = SparkSqlJob::class;
  protected $sparkSqlJobDataType = '';
  protected $statusType = JobStatus::class;
  protected $statusDataType = '';
  protected $statusHistoryType = JobStatus::class;
  protected $statusHistoryDataType = 'array';
  protected $yarnApplicationsType = YarnApplication::class;
  protected $yarnApplicationsDataType = 'array';

  public function setDone($done)
  {
    $this->done = $done;
  }
  public function getDone()
  {
    return $this->done;
  }
  public function setDriverControlFilesUri($driverControlFilesUri)
  {
    $this->driverControlFilesUri = $driverControlFilesUri;
  }
  public function getDriverControlFilesUri()
  {
    return $this->driverControlFilesUri;
  }
  public function setDriverOutputResourceUri($driverOutputResourceUri)
  {
    $this->driverOutputResourceUri = $driverOutputResourceUri;
  }
  public function getDriverOutputResourceUri()
  {
    return $this->driverOutputResourceUri;
  }
  /**
   * @param HadoopJob
   */
  public function setHadoopJob(HadoopJob $hadoopJob)
  {
    $this->hadoopJob = $hadoopJob;
  }
  /**
   * @return HadoopJob
   */
  public function getHadoopJob()
  {
    return $this->hadoopJob;
  }
  /**
   * @param HiveJob
   */
  public function setHiveJob(HiveJob $hiveJob)
  {
    $this->hiveJob = $hiveJob;
  }
  /**
   * @return HiveJob
   */
  public function getHiveJob()
  {
    return $this->hiveJob;
  }
  public function setJobUuid($jobUuid)
  {
    $this->jobUuid = $jobUuid;
  }
  public function getJobUuid()
  {
    return $this->jobUuid;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param PigJob
   */
  public function setPigJob(PigJob $pigJob)
  {
    $this->pigJob = $pigJob;
  }
  /**
   * @return PigJob
   */
  public function getPigJob()
  {
    return $this->pigJob;
  }
  /**
   * @param JobPlacement
   */
  public function setPlacement(JobPlacement $placement)
  {
    $this->placement = $placement;
  }
  /**
   * @return JobPlacement
   */
  public function getPlacement()
  {
    return $this->placement;
  }
  /**
   * @param PrestoJob
   */
  public function setPrestoJob(PrestoJob $prestoJob)
  {
    $this->prestoJob = $prestoJob;
  }
  /**
   * @return PrestoJob
   */
  public function getPrestoJob()
  {
    return $this->prestoJob;
  }
  /**
   * @param PySparkJob
   */
  public function setPysparkJob(PySparkJob $pysparkJob)
  {
    $this->pysparkJob = $pysparkJob;
  }
  /**
   * @return PySparkJob
   */
  public function getPysparkJob()
  {
    return $this->pysparkJob;
  }
  /**
   * @param JobReference
   */
  public function setReference(JobReference $reference)
  {
    $this->reference = $reference;
  }
  /**
   * @return JobReference
   */
  public function getReference()
  {
    return $this->reference;
  }
  /**
   * @param JobScheduling
   */
  public function setScheduling(JobScheduling $scheduling)
  {
    $this->scheduling = $scheduling;
  }
  /**
   * @return JobScheduling
   */
  public function getScheduling()
  {
    return $this->scheduling;
  }
  /**
   * @param SparkJob
   */
  public function setSparkJob(SparkJob $sparkJob)
  {
    $this->sparkJob = $sparkJob;
  }
  /**
   * @return SparkJob
   */
  public function getSparkJob()
  {
    return $this->sparkJob;
  }
  /**
   * @param SparkRJob
   */
  public function setSparkRJob(SparkRJob $sparkRJob)
  {
    $this->sparkRJob = $sparkRJob;
  }
  /**
   * @return SparkRJob
   */
  public function getSparkRJob()
  {
    return $this->sparkRJob;
  }
  /**
   * @param SparkSqlJob
   */
  public function setSparkSqlJob(SparkSqlJob $sparkSqlJob)
  {
    $this->sparkSqlJob = $sparkSqlJob;
  }
  /**
   * @return SparkSqlJob
   */
  public function getSparkSqlJob()
  {
    return $this->sparkSqlJob;
  }
  /**
   * @param JobStatus
   */
  public function setStatus(JobStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return JobStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param JobStatus[]
   */
  public function setStatusHistory($statusHistory)
  {
    $this->statusHistory = $statusHistory;
  }
  /**
   * @return JobStatus[]
   */
  public function getStatusHistory()
  {
    return $this->statusHistory;
  }
  /**
   * @param YarnApplication[]
   */
  public function setYarnApplications($yarnApplications)
  {
    $this->yarnApplications = $yarnApplications;
  }
  /**
   * @return YarnApplication[]
   */
  public function getYarnApplications()
  {
    return $this->yarnApplications;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Job::class, 'Google_Service_Dataproc_Job');
