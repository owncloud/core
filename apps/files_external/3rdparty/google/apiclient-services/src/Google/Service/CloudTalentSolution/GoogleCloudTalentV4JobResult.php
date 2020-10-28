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

class Google_Service_CloudTalentSolution_GoogleCloudTalentV4JobResult extends Google_Model
{
  protected $jobType = 'Google_Service_CloudTalentSolution_GoogleCloudTalentV4Job';
  protected $jobDataType = '';
  protected $statusType = 'Google_Service_CloudTalentSolution_Status';
  protected $statusDataType = '';

  /**
   * @param Google_Service_CloudTalentSolution_GoogleCloudTalentV4Job
   */
  public function setJob(Google_Service_CloudTalentSolution_GoogleCloudTalentV4Job $job)
  {
    $this->job = $job;
  }
  /**
   * @return Google_Service_CloudTalentSolution_GoogleCloudTalentV4Job
   */
  public function getJob()
  {
    return $this->job;
  }
  /**
   * @param Google_Service_CloudTalentSolution_Status
   */
  public function setStatus(Google_Service_CloudTalentSolution_Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_CloudTalentSolution_Status
   */
  public function getStatus()
  {
    return $this->status;
  }
}
