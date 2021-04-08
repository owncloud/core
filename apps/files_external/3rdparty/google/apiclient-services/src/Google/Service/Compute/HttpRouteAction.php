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

class Google_Service_Compute_HttpRouteAction extends Google_Collection
{
  protected $collection_key = 'weightedBackendServices';
  protected $corsPolicyType = 'Google_Service_Compute_CorsPolicy';
  protected $corsPolicyDataType = '';
  protected $faultInjectionPolicyType = 'Google_Service_Compute_HttpFaultInjection';
  protected $faultInjectionPolicyDataType = '';
  protected $maxStreamDurationType = 'Google_Service_Compute_Duration';
  protected $maxStreamDurationDataType = '';
  protected $requestMirrorPolicyType = 'Google_Service_Compute_RequestMirrorPolicy';
  protected $requestMirrorPolicyDataType = '';
  protected $retryPolicyType = 'Google_Service_Compute_HttpRetryPolicy';
  protected $retryPolicyDataType = '';
  protected $timeoutType = 'Google_Service_Compute_Duration';
  protected $timeoutDataType = '';
  protected $urlRewriteType = 'Google_Service_Compute_UrlRewrite';
  protected $urlRewriteDataType = '';
  protected $weightedBackendServicesType = 'Google_Service_Compute_WeightedBackendService';
  protected $weightedBackendServicesDataType = 'array';

  /**
   * @param Google_Service_Compute_CorsPolicy
   */
  public function setCorsPolicy(Google_Service_Compute_CorsPolicy $corsPolicy)
  {
    $this->corsPolicy = $corsPolicy;
  }
  /**
   * @return Google_Service_Compute_CorsPolicy
   */
  public function getCorsPolicy()
  {
    return $this->corsPolicy;
  }
  /**
   * @param Google_Service_Compute_HttpFaultInjection
   */
  public function setFaultInjectionPolicy(Google_Service_Compute_HttpFaultInjection $faultInjectionPolicy)
  {
    $this->faultInjectionPolicy = $faultInjectionPolicy;
  }
  /**
   * @return Google_Service_Compute_HttpFaultInjection
   */
  public function getFaultInjectionPolicy()
  {
    return $this->faultInjectionPolicy;
  }
  /**
   * @param Google_Service_Compute_Duration
   */
  public function setMaxStreamDuration(Google_Service_Compute_Duration $maxStreamDuration)
  {
    $this->maxStreamDuration = $maxStreamDuration;
  }
  /**
   * @return Google_Service_Compute_Duration
   */
  public function getMaxStreamDuration()
  {
    return $this->maxStreamDuration;
  }
  /**
   * @param Google_Service_Compute_RequestMirrorPolicy
   */
  public function setRequestMirrorPolicy(Google_Service_Compute_RequestMirrorPolicy $requestMirrorPolicy)
  {
    $this->requestMirrorPolicy = $requestMirrorPolicy;
  }
  /**
   * @return Google_Service_Compute_RequestMirrorPolicy
   */
  public function getRequestMirrorPolicy()
  {
    return $this->requestMirrorPolicy;
  }
  /**
   * @param Google_Service_Compute_HttpRetryPolicy
   */
  public function setRetryPolicy(Google_Service_Compute_HttpRetryPolicy $retryPolicy)
  {
    $this->retryPolicy = $retryPolicy;
  }
  /**
   * @return Google_Service_Compute_HttpRetryPolicy
   */
  public function getRetryPolicy()
  {
    return $this->retryPolicy;
  }
  /**
   * @param Google_Service_Compute_Duration
   */
  public function setTimeout(Google_Service_Compute_Duration $timeout)
  {
    $this->timeout = $timeout;
  }
  /**
   * @return Google_Service_Compute_Duration
   */
  public function getTimeout()
  {
    return $this->timeout;
  }
  /**
   * @param Google_Service_Compute_UrlRewrite
   */
  public function setUrlRewrite(Google_Service_Compute_UrlRewrite $urlRewrite)
  {
    $this->urlRewrite = $urlRewrite;
  }
  /**
   * @return Google_Service_Compute_UrlRewrite
   */
  public function getUrlRewrite()
  {
    return $this->urlRewrite;
  }
  /**
   * @param Google_Service_Compute_WeightedBackendService[]
   */
  public function setWeightedBackendServices($weightedBackendServices)
  {
    $this->weightedBackendServices = $weightedBackendServices;
  }
  /**
   * @return Google_Service_Compute_WeightedBackendService[]
   */
  public function getWeightedBackendServices()
  {
    return $this->weightedBackendServices;
  }
}
