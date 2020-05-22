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

class Google_Service_AccessApproval_ApprovalRequest extends Google_Model
{
  protected $approveType = 'Google_Service_AccessApproval_ApproveDecision';
  protected $approveDataType = '';
  protected $dismissType = 'Google_Service_AccessApproval_DismissDecision';
  protected $dismissDataType = '';
  public $name;
  public $requestTime;
  public $requestedExpiration;
  protected $requestedLocationsType = 'Google_Service_AccessApproval_AccessLocations';
  protected $requestedLocationsDataType = '';
  protected $requestedReasonType = 'Google_Service_AccessApproval_AccessReason';
  protected $requestedReasonDataType = '';
  public $requestedResourceName;
  protected $requestedResourcePropertiesType = 'Google_Service_AccessApproval_ResourceProperties';
  protected $requestedResourcePropertiesDataType = '';

  /**
   * @param Google_Service_AccessApproval_ApproveDecision
   */
  public function setApprove(Google_Service_AccessApproval_ApproveDecision $approve)
  {
    $this->approve = $approve;
  }
  /**
   * @return Google_Service_AccessApproval_ApproveDecision
   */
  public function getApprove()
  {
    return $this->approve;
  }
  /**
   * @param Google_Service_AccessApproval_DismissDecision
   */
  public function setDismiss(Google_Service_AccessApproval_DismissDecision $dismiss)
  {
    $this->dismiss = $dismiss;
  }
  /**
   * @return Google_Service_AccessApproval_DismissDecision
   */
  public function getDismiss()
  {
    return $this->dismiss;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRequestTime($requestTime)
  {
    $this->requestTime = $requestTime;
  }
  public function getRequestTime()
  {
    return $this->requestTime;
  }
  public function setRequestedExpiration($requestedExpiration)
  {
    $this->requestedExpiration = $requestedExpiration;
  }
  public function getRequestedExpiration()
  {
    return $this->requestedExpiration;
  }
  /**
   * @param Google_Service_AccessApproval_AccessLocations
   */
  public function setRequestedLocations(Google_Service_AccessApproval_AccessLocations $requestedLocations)
  {
    $this->requestedLocations = $requestedLocations;
  }
  /**
   * @return Google_Service_AccessApproval_AccessLocations
   */
  public function getRequestedLocations()
  {
    return $this->requestedLocations;
  }
  /**
   * @param Google_Service_AccessApproval_AccessReason
   */
  public function setRequestedReason(Google_Service_AccessApproval_AccessReason $requestedReason)
  {
    $this->requestedReason = $requestedReason;
  }
  /**
   * @return Google_Service_AccessApproval_AccessReason
   */
  public function getRequestedReason()
  {
    return $this->requestedReason;
  }
  public function setRequestedResourceName($requestedResourceName)
  {
    $this->requestedResourceName = $requestedResourceName;
  }
  public function getRequestedResourceName()
  {
    return $this->requestedResourceName;
  }
  /**
   * @param Google_Service_AccessApproval_ResourceProperties
   */
  public function setRequestedResourceProperties(Google_Service_AccessApproval_ResourceProperties $requestedResourceProperties)
  {
    $this->requestedResourceProperties = $requestedResourceProperties;
  }
  /**
   * @return Google_Service_AccessApproval_ResourceProperties
   */
  public function getRequestedResourceProperties()
  {
    return $this->requestedResourceProperties;
  }
}
