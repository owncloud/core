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

class PathMatcher extends \Google\Collection
{
  protected $collection_key = 'routeRules';
  protected $defaultRouteActionType = HttpRouteAction::class;
  protected $defaultRouteActionDataType = '';
  /**
   * @var string
   */
  public $defaultService;
  protected $defaultUrlRedirectType = HttpRedirectAction::class;
  protected $defaultUrlRedirectDataType = '';
  /**
   * @var string
   */
  public $description;
  protected $headerActionType = HttpHeaderAction::class;
  protected $headerActionDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $pathRulesType = PathRule::class;
  protected $pathRulesDataType = 'array';
  protected $routeRulesType = HttpRouteRule::class;
  protected $routeRulesDataType = 'array';

  /**
   * @param HttpRouteAction
   */
  public function setDefaultRouteAction(HttpRouteAction $defaultRouteAction)
  {
    $this->defaultRouteAction = $defaultRouteAction;
  }
  /**
   * @return HttpRouteAction
   */
  public function getDefaultRouteAction()
  {
    return $this->defaultRouteAction;
  }
  /**
   * @param string
   */
  public function setDefaultService($defaultService)
  {
    $this->defaultService = $defaultService;
  }
  /**
   * @return string
   */
  public function getDefaultService()
  {
    return $this->defaultService;
  }
  /**
   * @param HttpRedirectAction
   */
  public function setDefaultUrlRedirect(HttpRedirectAction $defaultUrlRedirect)
  {
    $this->defaultUrlRedirect = $defaultUrlRedirect;
  }
  /**
   * @return HttpRedirectAction
   */
  public function getDefaultUrlRedirect()
  {
    return $this->defaultUrlRedirect;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param HttpHeaderAction
   */
  public function setHeaderAction(HttpHeaderAction $headerAction)
  {
    $this->headerAction = $headerAction;
  }
  /**
   * @return HttpHeaderAction
   */
  public function getHeaderAction()
  {
    return $this->headerAction;
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
   * @param PathRule[]
   */
  public function setPathRules($pathRules)
  {
    $this->pathRules = $pathRules;
  }
  /**
   * @return PathRule[]
   */
  public function getPathRules()
  {
    return $this->pathRules;
  }
  /**
   * @param HttpRouteRule[]
   */
  public function setRouteRules($routeRules)
  {
    $this->routeRules = $routeRules;
  }
  /**
   * @return HttpRouteRule[]
   */
  public function getRouteRules()
  {
    return $this->routeRules;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PathMatcher::class, 'Google_Service_Compute_PathMatcher');
