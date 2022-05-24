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

class JobConfiguration extends \Google\Model
{
  protected $copyType = JobConfigurationTableCopy::class;
  protected $copyDataType = '';
  /**
   * @var bool
   */
  public $dryRun;
  protected $extractType = JobConfigurationExtract::class;
  protected $extractDataType = '';
  /**
   * @var string
   */
  public $jobTimeoutMs;
  /**
   * @var string
   */
  public $jobType;
  /**
   * @var string[]
   */
  public $labels;
  protected $loadType = JobConfigurationLoad::class;
  protected $loadDataType = '';
  protected $queryType = JobConfigurationQuery::class;
  protected $queryDataType = '';

  /**
   * @param JobConfigurationTableCopy
   */
  public function setCopy(JobConfigurationTableCopy $copy)
  {
    $this->copy = $copy;
  }
  /**
   * @return JobConfigurationTableCopy
   */
  public function getCopy()
  {
    return $this->copy;
  }
  /**
   * @param bool
   */
  public function setDryRun($dryRun)
  {
    $this->dryRun = $dryRun;
  }
  /**
   * @return bool
   */
  public function getDryRun()
  {
    return $this->dryRun;
  }
  /**
   * @param JobConfigurationExtract
   */
  public function setExtract(JobConfigurationExtract $extract)
  {
    $this->extract = $extract;
  }
  /**
   * @return JobConfigurationExtract
   */
  public function getExtract()
  {
    return $this->extract;
  }
  /**
   * @param string
   */
  public function setJobTimeoutMs($jobTimeoutMs)
  {
    $this->jobTimeoutMs = $jobTimeoutMs;
  }
  /**
   * @return string
   */
  public function getJobTimeoutMs()
  {
    return $this->jobTimeoutMs;
  }
  /**
   * @param string
   */
  public function setJobType($jobType)
  {
    $this->jobType = $jobType;
  }
  /**
   * @return string
   */
  public function getJobType()
  {
    return $this->jobType;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param JobConfigurationLoad
   */
  public function setLoad(JobConfigurationLoad $load)
  {
    $this->load = $load;
  }
  /**
   * @return JobConfigurationLoad
   */
  public function getLoad()
  {
    return $this->load;
  }
  /**
   * @param JobConfigurationQuery
   */
  public function setQuery(JobConfigurationQuery $query)
  {
    $this->query = $query;
  }
  /**
   * @return JobConfigurationQuery
   */
  public function getQuery()
  {
    return $this->query;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobConfiguration::class, 'Google_Service_Bigquery_JobConfiguration');
