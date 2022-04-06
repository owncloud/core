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

namespace Google\Service\ServiceControl;

class AuditLog extends \Google\Collection
{
  protected $collection_key = 'authorizationInfo';
  protected $authenticationInfoType = AuthenticationInfo::class;
  protected $authenticationInfoDataType = '';
  protected $authorizationInfoType = AuthorizationInfo::class;
  protected $authorizationInfoDataType = 'array';
  /**
   * @var array[]
   */
  public $metadata;
  /**
   * @var string
   */
  public $methodName;
  /**
   * @var string
   */
  public $numResponseItems;
  protected $policyViolationInfoType = PolicyViolationInfo::class;
  protected $policyViolationInfoDataType = '';
  /**
   * @var array[]
   */
  public $request;
  protected $requestMetadataType = RequestMetadata::class;
  protected $requestMetadataDataType = '';
  protected $resourceLocationType = ResourceLocation::class;
  protected $resourceLocationDataType = '';
  /**
   * @var string
   */
  public $resourceName;
  /**
   * @var array[]
   */
  public $resourceOriginalState;
  /**
   * @var array[]
   */
  public $response;
  /**
   * @var array[]
   */
  public $serviceData;
  /**
   * @var string
   */
  public $serviceName;
  protected $statusType = Status::class;
  protected $statusDataType = '';

  /**
   * @param AuthenticationInfo
   */
  public function setAuthenticationInfo(AuthenticationInfo $authenticationInfo)
  {
    $this->authenticationInfo = $authenticationInfo;
  }
  /**
   * @return AuthenticationInfo
   */
  public function getAuthenticationInfo()
  {
    return $this->authenticationInfo;
  }
  /**
   * @param AuthorizationInfo[]
   */
  public function setAuthorizationInfo($authorizationInfo)
  {
    $this->authorizationInfo = $authorizationInfo;
  }
  /**
   * @return AuthorizationInfo[]
   */
  public function getAuthorizationInfo()
  {
    return $this->authorizationInfo;
  }
  /**
   * @param array[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return array[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setMethodName($methodName)
  {
    $this->methodName = $methodName;
  }
  /**
   * @return string
   */
  public function getMethodName()
  {
    return $this->methodName;
  }
  /**
   * @param string
   */
  public function setNumResponseItems($numResponseItems)
  {
    $this->numResponseItems = $numResponseItems;
  }
  /**
   * @return string
   */
  public function getNumResponseItems()
  {
    return $this->numResponseItems;
  }
  /**
   * @param PolicyViolationInfo
   */
  public function setPolicyViolationInfo(PolicyViolationInfo $policyViolationInfo)
  {
    $this->policyViolationInfo = $policyViolationInfo;
  }
  /**
   * @return PolicyViolationInfo
   */
  public function getPolicyViolationInfo()
  {
    return $this->policyViolationInfo;
  }
  /**
   * @param array[]
   */
  public function setRequest($request)
  {
    $this->request = $request;
  }
  /**
   * @return array[]
   */
  public function getRequest()
  {
    return $this->request;
  }
  /**
   * @param RequestMetadata
   */
  public function setRequestMetadata(RequestMetadata $requestMetadata)
  {
    $this->requestMetadata = $requestMetadata;
  }
  /**
   * @return RequestMetadata
   */
  public function getRequestMetadata()
  {
    return $this->requestMetadata;
  }
  /**
   * @param ResourceLocation
   */
  public function setResourceLocation(ResourceLocation $resourceLocation)
  {
    $this->resourceLocation = $resourceLocation;
  }
  /**
   * @return ResourceLocation
   */
  public function getResourceLocation()
  {
    return $this->resourceLocation;
  }
  /**
   * @param string
   */
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  /**
   * @return string
   */
  public function getResourceName()
  {
    return $this->resourceName;
  }
  /**
   * @param array[]
   */
  public function setResourceOriginalState($resourceOriginalState)
  {
    $this->resourceOriginalState = $resourceOriginalState;
  }
  /**
   * @return array[]
   */
  public function getResourceOriginalState()
  {
    return $this->resourceOriginalState;
  }
  /**
   * @param array[]
   */
  public function setResponse($response)
  {
    $this->response = $response;
  }
  /**
   * @return array[]
   */
  public function getResponse()
  {
    return $this->response;
  }
  /**
   * @param array[]
   */
  public function setServiceData($serviceData)
  {
    $this->serviceData = $serviceData;
  }
  /**
   * @return array[]
   */
  public function getServiceData()
  {
    return $this->serviceData;
  }
  /**
   * @param string
   */
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
  }
  /**
   * @return string
   */
  public function getServiceName()
  {
    return $this->serviceName;
  }
  /**
   * @param Status
   */
  public function setStatus(Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Status
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuditLog::class, 'Google_Service_ServiceControl_AuditLog');
