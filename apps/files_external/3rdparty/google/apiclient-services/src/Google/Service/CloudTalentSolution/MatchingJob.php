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

class Google_Service_CloudTalentSolution_MatchingJob extends Google_Model
{
  protected $commuteInfoType = 'Google_Service_CloudTalentSolution_CommuteInfo';
  protected $commuteInfoDataType = '';
  protected $jobType = 'Google_Service_CloudTalentSolution_Job';
  protected $jobDataType = '';
  public $jobSummary;
  public $jobTitleSnippet;
  public $searchTextSnippet;

  /**
   * @param Google_Service_CloudTalentSolution_CommuteInfo
   */
  public function setCommuteInfo(Google_Service_CloudTalentSolution_CommuteInfo $commuteInfo)
  {
    $this->commuteInfo = $commuteInfo;
  }
  /**
   * @return Google_Service_CloudTalentSolution_CommuteInfo
   */
  public function getCommuteInfo()
  {
    return $this->commuteInfo;
  }
  /**
   * @param Google_Service_CloudTalentSolution_Job
   */
  public function setJob(Google_Service_CloudTalentSolution_Job $job)
  {
    $this->job = $job;
  }
  /**
   * @return Google_Service_CloudTalentSolution_Job
   */
  public function getJob()
  {
    return $this->job;
  }
  public function setJobSummary($jobSummary)
  {
    $this->jobSummary = $jobSummary;
  }
  public function getJobSummary()
  {
    return $this->jobSummary;
  }
  public function setJobTitleSnippet($jobTitleSnippet)
  {
    $this->jobTitleSnippet = $jobTitleSnippet;
  }
  public function getJobTitleSnippet()
  {
    return $this->jobTitleSnippet;
  }
  public function setSearchTextSnippet($searchTextSnippet)
  {
    $this->searchTextSnippet = $searchTextSnippet;
  }
  public function getSearchTextSnippet()
  {
    return $this->searchTextSnippet;
  }
}
