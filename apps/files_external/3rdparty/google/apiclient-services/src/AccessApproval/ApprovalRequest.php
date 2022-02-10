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

namespace Google\Service\AccessApproval;

class ApprovalRequest extends \Google\Model
{
  protected $approveType = ApproveDecision::class;
  protected $approveDataType = '';
  protected $dismissType = DismissDecision::class;
  protected $dismissDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $requestTime;
  /**
   * @var string
   */
  public $requestedExpiration;
  protected $requestedLocationsType = AccessLocations::class;
  protected $requestedLocationsDataType = '';
  protected $requestedReasonType = AccessReason::class;
  protected $requestedReasonDataType = '';
  /**
   * @var string
   */
  public $requestedResourceName;
  protected $requestedResourcePropertiesType = ResourceProperties::class;
  protected $requestedResourcePropertiesDataType = '';

  /**
   * @param ApproveDecision
   */
  public function setApprove(ApproveDecision $approve)
  {
    $this->approve = $approve;
  }
  /**
   * @return ApproveDecision
   */
  public function getApprove()
  {
    return $this->approve;
  }
  /**
   * @param DismissDecision
   */
  public function setDismiss(DismissDecision $dismiss)
  {
    $this->dismiss = $dismiss;
  }
  /**
   * @return DismissDecision
   */
  public function getDismiss()
  {
    return $this->dismiss;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setRequestTime($requestTime)
  {
    $this->requestTime = $requestTime;
  }
  /**
   * @return string
   */
  public function getRequestTime()
  {
    return $this->requestTime;
  }
  /**
   * @param string
   */
  public function setRequestedExpiration($requestedExpiration)
  {
    $this->requestedExpiration = $requestedExpiration;
  }
  /**
   * @return string
   */
  public function getRequestedExpiration()
  {
    return $this->requestedExpiration;
  }
  /**
   * @param AccessLocations
   */
  public function setRequestedLocations(AccessLocations $requestedLocations)
  {
    $this->requestedLocations = $requestedLocations;
  }
  /**
   * @return AccessLocations
   */
  public function getRequestedLocations()
  {
    return $this->requestedLocations;
  }
  /**
   * @param AccessReason
   */
  public function setRequestedReason(AccessReason $requestedReason)
  {
    $this->requestedReason = $requestedReason;
  }
  /**
   * @return AccessReason
   */
  public function getRequestedReason()
  {
    return $this->requestedReason;
  }
  /**
   * @param string
   */
  public function setRequestedResourceName($requestedResourceName)
  {
    $this->requestedResourceName = $requestedResourceName;
  }
  /**
   * @return string
   */
  public function getRequestedResourceName()
  {
    return $this->requestedResourceName;
  }
  /**
   * @param ResourceProperties
   */
  public function setRequestedResourceProperties(ResourceProperties $requestedResourceProperties)
  {
    $this->requestedResourceProperties = $requestedResourceProperties;
  }
  /**
   * @return ResourceProperties
   */
  public function getRequestedResourceProperties()
  {
    return $this->requestedResourceProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApprovalRequest::class, 'Google_Service_AccessApproval_ApprovalRequest');
