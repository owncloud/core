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

class Google_Service_JobService_CreateJobRequest extends Google_Model
{
  public $disableStreetAddressResolution;
  protected $jobType = 'Google_Service_JobService_Job';
  protected $jobDataType = '';
  protected $processingOptionsType = 'Google_Service_JobService_JobProcessingOptions';
  protected $processingOptionsDataType = '';

  public function setDisableStreetAddressResolution($disableStreetAddressResolution)
  {
    $this->disableStreetAddressResolution = $disableStreetAddressResolution;
  }
  public function getDisableStreetAddressResolution()
  {
    return $this->disableStreetAddressResolution;
  }
  /**
   * @param Google_Service_JobService_Job
   */
  public function setJob(Google_Service_JobService_Job $job)
  {
    $this->job = $job;
  }
  /**
   * @return Google_Service_JobService_Job
   */
  public function getJob()
  {
    return $this->job;
  }
  /**
   * @param Google_Service_JobService_JobProcessingOptions
   */
  public function setProcessingOptions(Google_Service_JobService_JobProcessingOptions $processingOptions)
  {
    $this->processingOptions = $processingOptions;
  }
  /**
   * @return Google_Service_JobService_JobProcessingOptions
   */
  public function getProcessingOptions()
  {
    return $this->processingOptions;
  }
}
