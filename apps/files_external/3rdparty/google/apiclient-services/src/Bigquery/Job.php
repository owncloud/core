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

class Job extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "userEmail" => "user_email",
  ];
  protected $configurationType = JobConfiguration::class;
  protected $configurationDataType = '';
  public $etag;
  public $id;
  protected $jobReferenceType = JobReference::class;
  protected $jobReferenceDataType = '';
  public $kind;
  public $selfLink;
  protected $statisticsType = JobStatistics::class;
  protected $statisticsDataType = '';
  protected $statusType = JobStatus::class;
  protected $statusDataType = '';
  public $userEmail;

  /**
   * @param JobConfiguration
   */
  public function setConfiguration(JobConfiguration $configuration)
  {
    $this->configuration = $configuration;
  }
  /**
   * @return JobConfiguration
   */
  public function getConfiguration()
  {
    return $this->configuration;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param JobReference
   */
  public function setJobReference(JobReference $jobReference)
  {
    $this->jobReference = $jobReference;
  }
  /**
   * @return JobReference
   */
  public function getJobReference()
  {
    return $this->jobReference;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param JobStatistics
   */
  public function setStatistics(JobStatistics $statistics)
  {
    $this->statistics = $statistics;
  }
  /**
   * @return JobStatistics
   */
  public function getStatistics()
  {
    return $this->statistics;
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
  public function setUserEmail($userEmail)
  {
    $this->userEmail = $userEmail;
  }
  public function getUserEmail()
  {
    return $this->userEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Job::class, 'Google_Service_Bigquery_Job');
