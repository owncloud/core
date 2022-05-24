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

namespace Google\Service\Compute;

class HttpRouteAction extends \Google\Collection
{
  protected $collection_key = 'weightedBackendServices';
  protected $corsPolicyType = CorsPolicy::class;
  protected $corsPolicyDataType = '';
  protected $faultInjectionPolicyType = HttpFaultInjection::class;
  protected $faultInjectionPolicyDataType = '';
  protected $maxStreamDurationType = Duration::class;
  protected $maxStreamDurationDataType = '';
  protected $requestMirrorPolicyType = RequestMirrorPolicy::class;
  protected $requestMirrorPolicyDataType = '';
  protected $retryPolicyType = HttpRetryPolicy::class;
  protected $retryPolicyDataType = '';
  protected $timeoutType = Duration::class;
  protected $timeoutDataType = '';
  protected $urlRewriteType = UrlRewrite::class;
  protected $urlRewriteDataType = '';
  protected $weightedBackendServicesType = WeightedBackendService::class;
  protected $weightedBackendServicesDataType = 'array';

  /**
   * @param CorsPolicy
   */
  public function setCorsPolicy(CorsPolicy $corsPolicy)
  {
    $this->corsPolicy = $corsPolicy;
  }
  /**
   * @return CorsPolicy
   */
  public function getCorsPolicy()
  {
    return $this->corsPolicy;
  }
  /**
   * @param HttpFaultInjection
   */
  public function setFaultInjectionPolicy(HttpFaultInjection $faultInjectionPolicy)
  {
    $this->faultInjectionPolicy = $faultInjectionPolicy;
  }
  /**
   * @return HttpFaultInjection
   */
  public function getFaultInjectionPolicy()
  {
    return $this->faultInjectionPolicy;
  }
  /**
   * @param Duration
   */
  public function setMaxStreamDuration(Duration $maxStreamDuration)
  {
    $this->maxStreamDuration = $maxStreamDuration;
  }
  /**
   * @return Duration
   */
  public function getMaxStreamDuration()
  {
    return $this->maxStreamDuration;
  }
  /**
   * @param RequestMirrorPolicy
   */
  public function setRequestMirrorPolicy(RequestMirrorPolicy $requestMirrorPolicy)
  {
    $this->requestMirrorPolicy = $requestMirrorPolicy;
  }
  /**
   * @return RequestMirrorPolicy
   */
  public function getRequestMirrorPolicy()
  {
    return $this->requestMirrorPolicy;
  }
  /**
   * @param HttpRetryPolicy
   */
  public function setRetryPolicy(HttpRetryPolicy $retryPolicy)
  {
    $this->retryPolicy = $retryPolicy;
  }
  /**
   * @return HttpRetryPolicy
   */
  public function getRetryPolicy()
  {
    return $this->retryPolicy;
  }
  /**
   * @param Duration
   */
  public function setTimeout(Duration $timeout)
  {
    $this->timeout = $timeout;
  }
  /**
   * @return Duration
   */
  public function getTimeout()
  {
    return $this->timeout;
  }
  /**
   * @param UrlRewrite
   */
  public function setUrlRewrite(UrlRewrite $urlRewrite)
  {
    $this->urlRewrite = $urlRewrite;
  }
  /**
   * @return UrlRewrite
   */
  public function getUrlRewrite()
  {
    return $this->urlRewrite;
  }
  /**
   * @param WeightedBackendService[]
   */
  public function setWeightedBackendServices($weightedBackendServices)
  {
    $this->weightedBackendServices = $weightedBackendServices;
  }
  /**
   * @return WeightedBackendService[]
   */
  public function getWeightedBackendServices()
  {
    return $this->weightedBackendServices;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpRouteAction::class, 'Google_Service_Compute_HttpRouteAction');
