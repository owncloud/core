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

class Google_Service_Compute_InstanceManagedByIgmError extends Google_Model
{
  protected $errorType = 'Google_Service_Compute_InstanceManagedByIgmErrorManagedInstanceError';
  protected $errorDataType = '';
  protected $instanceActionDetailsType = 'Google_Service_Compute_InstanceManagedByIgmErrorInstanceActionDetails';
  protected $instanceActionDetailsDataType = '';
  public $timestamp;

  /**
   * @param Google_Service_Compute_InstanceManagedByIgmErrorManagedInstanceError
   */
  public function setError(Google_Service_Compute_InstanceManagedByIgmErrorManagedInstanceError $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_Compute_InstanceManagedByIgmErrorManagedInstanceError
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param Google_Service_Compute_InstanceManagedByIgmErrorInstanceActionDetails
   */
  public function setInstanceActionDetails(Google_Service_Compute_InstanceManagedByIgmErrorInstanceActionDetails $instanceActionDetails)
  {
    $this->instanceActionDetails = $instanceActionDetails;
  }
  /**
   * @return Google_Service_Compute_InstanceManagedByIgmErrorInstanceActionDetails
   */
  public function getInstanceActionDetails()
  {
    return $this->instanceActionDetails;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
}
