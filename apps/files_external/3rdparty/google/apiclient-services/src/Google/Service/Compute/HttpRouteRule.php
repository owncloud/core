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

class Google_Service_Compute_HttpRouteRule extends Google_Collection
{
  protected $collection_key = 'matchRules';
  public $description;
  protected $headerActionType = 'Google_Service_Compute_HttpHeaderAction';
  protected $headerActionDataType = '';
  protected $matchRulesType = 'Google_Service_Compute_HttpRouteRuleMatch';
  protected $matchRulesDataType = 'array';
  public $priority;
  protected $routeActionType = 'Google_Service_Compute_HttpRouteAction';
  protected $routeActionDataType = '';
  public $service;
  protected $urlRedirectType = 'Google_Service_Compute_HttpRedirectAction';
  protected $urlRedirectDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Compute_HttpHeaderAction
   */
  public function setHeaderAction(Google_Service_Compute_HttpHeaderAction $headerAction)
  {
    $this->headerAction = $headerAction;
  }
  /**
   * @return Google_Service_Compute_HttpHeaderAction
   */
  public function getHeaderAction()
  {
    return $this->headerAction;
  }
  /**
   * @param Google_Service_Compute_HttpRouteRuleMatch
   */
  public function setMatchRules($matchRules)
  {
    $this->matchRules = $matchRules;
  }
  /**
   * @return Google_Service_Compute_HttpRouteRuleMatch
   */
  public function getMatchRules()
  {
    return $this->matchRules;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param Google_Service_Compute_HttpRouteAction
   */
  public function setRouteAction(Google_Service_Compute_HttpRouteAction $routeAction)
  {
    $this->routeAction = $routeAction;
  }
  /**
   * @return Google_Service_Compute_HttpRouteAction
   */
  public function getRouteAction()
  {
    return $this->routeAction;
  }
  public function setService($service)
  {
    $this->service = $service;
  }
  public function getService()
  {
    return $this->service;
  }
  /**
   * @param Google_Service_Compute_HttpRedirectAction
   */
  public function setUrlRedirect(Google_Service_Compute_HttpRedirectAction $urlRedirect)
  {
    $this->urlRedirect = $urlRedirect;
  }
  /**
   * @return Google_Service_Compute_HttpRedirectAction
   */
  public function getUrlRedirect()
  {
    return $this->urlRedirect;
  }
}
