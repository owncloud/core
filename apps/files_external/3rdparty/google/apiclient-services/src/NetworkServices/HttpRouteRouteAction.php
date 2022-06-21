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

namespace Google\Service\NetworkServices;

class HttpRouteRouteAction extends \Google\Collection
{
  protected $collection_key = 'destinations';
  protected $corsPolicyType = HttpRouteCorsPolicy::class;
  protected $corsPolicyDataType = '';
  protected $destinationsType = HttpRouteDestination::class;
  protected $destinationsDataType = 'array';
  protected $faultInjectionPolicyType = HttpRouteFaultInjectionPolicy::class;
  protected $faultInjectionPolicyDataType = '';
  protected $redirectType = HttpRouteRedirect::class;
  protected $redirectDataType = '';
  protected $requestHeaderModifierType = HttpRouteHeaderModifier::class;
  protected $requestHeaderModifierDataType = '';
  protected $requestMirrorPolicyType = HttpRouteRequestMirrorPolicy::class;
  protected $requestMirrorPolicyDataType = '';
  protected $responseHeaderModifierType = HttpRouteHeaderModifier::class;
  protected $responseHeaderModifierDataType = '';
  protected $retryPolicyType = HttpRouteRetryPolicy::class;
  protected $retryPolicyDataType = '';
  /**
   * @var string
   */
  public $timeout;
  protected $urlRewriteType = HttpRouteURLRewrite::class;
  protected $urlRewriteDataType = '';

  /**
   * @param HttpRouteCorsPolicy
   */
  public function setCorsPolicy(HttpRouteCorsPolicy $corsPolicy)
  {
    $this->corsPolicy = $corsPolicy;
  }
  /**
   * @return HttpRouteCorsPolicy
   */
  public function getCorsPolicy()
  {
    return $this->corsPolicy;
  }
  /**
   * @param HttpRouteDestination[]
   */
  public function setDestinations($destinations)
  {
    $this->destinations = $destinations;
  }
  /**
   * @return HttpRouteDestination[]
   */
  public function getDestinations()
  {
    return $this->destinations;
  }
  /**
   * @param HttpRouteFaultInjectionPolicy
   */
  public function setFaultInjectionPolicy(HttpRouteFaultInjectionPolicy $faultInjectionPolicy)
  {
    $this->faultInjectionPolicy = $faultInjectionPolicy;
  }
  /**
   * @return HttpRouteFaultInjectionPolicy
   */
  public function getFaultInjectionPolicy()
  {
    return $this->faultInjectionPolicy;
  }
  /**
   * @param HttpRouteRedirect
   */
  public function setRedirect(HttpRouteRedirect $redirect)
  {
    $this->redirect = $redirect;
  }
  /**
   * @return HttpRouteRedirect
   */
  public function getRedirect()
  {
    return $this->redirect;
  }
  /**
   * @param HttpRouteHeaderModifier
   */
  public function setRequestHeaderModifier(HttpRouteHeaderModifier $requestHeaderModifier)
  {
    $this->requestHeaderModifier = $requestHeaderModifier;
  }
  /**
   * @return HttpRouteHeaderModifier
   */
  public function getRequestHeaderModifier()
  {
    return $this->requestHeaderModifier;
  }
  /**
   * @param HttpRouteRequestMirrorPolicy
   */
  public function setRequestMirrorPolicy(HttpRouteRequestMirrorPolicy $requestMirrorPolicy)
  {
    $this->requestMirrorPolicy = $requestMirrorPolicy;
  }
  /**
   * @return HttpRouteRequestMirrorPolicy
   */
  public function getRequestMirrorPolicy()
  {
    return $this->requestMirrorPolicy;
  }
  /**
   * @param HttpRouteHeaderModifier
   */
  public function setResponseHeaderModifier(HttpRouteHeaderModifier $responseHeaderModifier)
  {
    $this->responseHeaderModifier = $responseHeaderModifier;
  }
  /**
   * @return HttpRouteHeaderModifier
   */
  public function getResponseHeaderModifier()
  {
    return $this->responseHeaderModifier;
  }
  /**
   * @param HttpRouteRetryPolicy
   */
  public function setRetryPolicy(HttpRouteRetryPolicy $retryPolicy)
  {
    $this->retryPolicy = $retryPolicy;
  }
  /**
   * @return HttpRouteRetryPolicy
   */
  public function getRetryPolicy()
  {
    return $this->retryPolicy;
  }
  /**
   * @param string
   */
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  /**
   * @return string
   */
  public function getTimeout()
  {
    return $this->timeout;
  }
  /**
   * @param HttpRouteURLRewrite
   */
  public function setUrlRewrite(HttpRouteURLRewrite $urlRewrite)
  {
    $this->urlRewrite = $urlRewrite;
  }
  /**
   * @return HttpRouteURLRewrite
   */
  public function getUrlRewrite()
  {
    return $this->urlRewrite;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpRouteRouteAction::class, 'Google_Service_NetworkServices_HttpRouteRouteAction');
