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

class Google_Service_Compute_PathMatcher extends Google_Collection
{
  protected $collection_key = 'routeRules';
  protected $defaultRouteActionType = 'Google_Service_Compute_HttpRouteAction';
  protected $defaultRouteActionDataType = '';
  public $defaultService;
  protected $defaultUrlRedirectType = 'Google_Service_Compute_HttpRedirectAction';
  protected $defaultUrlRedirectDataType = '';
  public $description;
  protected $headerActionType = 'Google_Service_Compute_HttpHeaderAction';
  protected $headerActionDataType = '';
  public $name;
  protected $pathRulesType = 'Google_Service_Compute_PathRule';
  protected $pathRulesDataType = 'array';
  protected $routeRulesType = 'Google_Service_Compute_HttpRouteRule';
  protected $routeRulesDataType = 'array';

  /**
   * @param Google_Service_Compute_HttpRouteAction
   */
  public function setDefaultRouteAction(Google_Service_Compute_HttpRouteAction $defaultRouteAction)
  {
    $this->defaultRouteAction = $defaultRouteAction;
  }
  /**
   * @return Google_Service_Compute_HttpRouteAction
   */
  public function getDefaultRouteAction()
  {
    return $this->defaultRouteAction;
  }
  public function setDefaultService($defaultService)
  {
    $this->defaultService = $defaultService;
  }
  public function getDefaultService()
  {
    return $this->defaultService;
  }
  /**
   * @param Google_Service_Compute_HttpRedirectAction
   */
  public function setDefaultUrlRedirect(Google_Service_Compute_HttpRedirectAction $defaultUrlRedirect)
  {
    $this->defaultUrlRedirect = $defaultUrlRedirect;
  }
  /**
   * @return Google_Service_Compute_HttpRedirectAction
   */
  public function getDefaultUrlRedirect()
  {
    return $this->defaultUrlRedirect;
  }
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Compute_PathRule
   */
  public function setPathRules($pathRules)
  {
    $this->pathRules = $pathRules;
  }
  /**
   * @return Google_Service_Compute_PathRule
   */
  public function getPathRules()
  {
    return $this->pathRules;
  }
  /**
   * @param Google_Service_Compute_HttpRouteRule
   */
  public function setRouteRules($routeRules)
  {
    $this->routeRules = $routeRules;
  }
  /**
   * @return Google_Service_Compute_HttpRouteRule
   */
  public function getRouteRules()
  {
    return $this->routeRules;
  }
}
