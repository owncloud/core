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

class Google_Service_Dataproc_OrderedJob extends Google_Collection
{
  protected $collection_key = 'prerequisiteStepIds';
  protected $hadoopJobType = 'Google_Service_Dataproc_HadoopJob';
  protected $hadoopJobDataType = '';
  protected $hiveJobType = 'Google_Service_Dataproc_HiveJob';
  protected $hiveJobDataType = '';
  public $labels;
  protected $pigJobType = 'Google_Service_Dataproc_PigJob';
  protected $pigJobDataType = '';
  public $prerequisiteStepIds;
  protected $prestoJobType = 'Google_Service_Dataproc_PrestoJob';
  protected $prestoJobDataType = '';
  protected $pysparkJobType = 'Google_Service_Dataproc_PySparkJob';
  protected $pysparkJobDataType = '';
  protected $schedulingType = 'Google_Service_Dataproc_JobScheduling';
  protected $schedulingDataType = '';
  protected $sparkJobType = 'Google_Service_Dataproc_SparkJob';
  protected $sparkJobDataType = '';
  protected $sparkRJobType = 'Google_Service_Dataproc_SparkRJob';
  protected $sparkRJobDataType = '';
  protected $sparkSqlJobType = 'Google_Service_Dataproc_SparkSqlJob';
  protected $sparkSqlJobDataType = '';
  public $stepId;

  /**
   * @param Google_Service_Dataproc_HadoopJob
   */
  public function setHadoopJob(Google_Service_Dataproc_HadoopJob $hadoopJob)
  {
    $this->hadoopJob = $hadoopJob;
  }
  /**
   * @return Google_Service_Dataproc_HadoopJob
   */
  public function getHadoopJob()
  {
    return $this->hadoopJob;
  }
  /**
   * @param Google_Service_Dataproc_HiveJob
   */
  public function setHiveJob(Google_Service_Dataproc_HiveJob $hiveJob)
  {
    $this->hiveJob = $hiveJob;
  }
  /**
   * @return Google_Service_Dataproc_HiveJob
   */
  public function getHiveJob()
  {
    return $this->hiveJob;
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
   * @param Google_Service_Dataproc_PigJob
   */
  public function setPigJob(Google_Service_Dataproc_PigJob $pigJob)
  {
    $this->pigJob = $pigJob;
  }
  /**
   * @return Google_Service_Dataproc_PigJob
   */
  public function getPigJob()
  {
    return $this->pigJob;
  }
  public function setPrerequisiteStepIds($prerequisiteStepIds)
  {
    $this->prerequisiteStepIds = $prerequisiteStepIds;
  }
  public function getPrerequisiteStepIds()
  {
    return $this->prerequisiteStepIds;
  }
  /**
   * @param Google_Service_Dataproc_PrestoJob
   */
  public function setPrestoJob(Google_Service_Dataproc_PrestoJob $prestoJob)
  {
    $this->prestoJob = $prestoJob;
  }
  /**
   * @return Google_Service_Dataproc_PrestoJob
   */
  public function getPrestoJob()
  {
    return $this->prestoJob;
  }
  /**
   * @param Google_Service_Dataproc_PySparkJob
   */
  public function setPysparkJob(Google_Service_Dataproc_PySparkJob $pysparkJob)
  {
    $this->pysparkJob = $pysparkJob;
  }
  /**
   * @return Google_Service_Dataproc_PySparkJob
   */
  public function getPysparkJob()
  {
    return $this->pysparkJob;
  }
  /**
   * @param Google_Service_Dataproc_JobScheduling
   */
  public function setScheduling(Google_Service_Dataproc_JobScheduling $scheduling)
  {
    $this->scheduling = $scheduling;
  }
  /**
   * @return Google_Service_Dataproc_JobScheduling
   */
  public function getScheduling()
  {
    return $this->scheduling;
  }
  /**
   * @param Google_Service_Dataproc_SparkJob
   */
  public function setSparkJob(Google_Service_Dataproc_SparkJob $sparkJob)
  {
    $this->sparkJob = $sparkJob;
  }
  /**
   * @return Google_Service_Dataproc_SparkJob
   */
  public function getSparkJob()
  {
    return $this->sparkJob;
  }
  /**
   * @param Google_Service_Dataproc_SparkRJob
   */
  public function setSparkRJob(Google_Service_Dataproc_SparkRJob $sparkRJob)
  {
    $this->sparkRJob = $sparkRJob;
  }
  /**
   * @return Google_Service_Dataproc_SparkRJob
   */
  public function getSparkRJob()
  {
    return $this->sparkRJob;
  }
  /**
   * @param Google_Service_Dataproc_SparkSqlJob
   */
  public function setSparkSqlJob(Google_Service_Dataproc_SparkSqlJob $sparkSqlJob)
  {
    $this->sparkSqlJob = $sparkSqlJob;
  }
  /**
   * @return Google_Service_Dataproc_SparkSqlJob
   */
  public function getSparkSqlJob()
  {
    return $this->sparkSqlJob;
  }
  public function setStepId($stepId)
  {
    $this->stepId = $stepId;
  }
  public function getStepId()
  {
    return $this->stepId;
  }
}
