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

class UrlMap extends \Google\Collection
{
  protected $collection_key = 'tests';
  public $creationTimestamp;
  protected $defaultRouteActionType = HttpRouteAction::class;
  protected $defaultRouteActionDataType = '';
  public $defaultService;
  protected $defaultUrlRedirectType = HttpRedirectAction::class;
  protected $defaultUrlRedirectDataType = '';
  public $description;
  public $fingerprint;
  protected $headerActionType = HttpHeaderAction::class;
  protected $headerActionDataType = '';
  protected $hostRulesType = HostRule::class;
  protected $hostRulesDataType = 'array';
  public $id;
  public $kind;
  public $name;
  protected $pathMatchersType = PathMatcher::class;
  protected $pathMatchersDataType = 'array';
  public $region;
  public $selfLink;
  protected $testsType = UrlMapTest::class;
  protected $testsDataType = 'array';

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
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
  public function setDefaultService($defaultService)
  {
    $this->defaultService = $defaultService;
  }
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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
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
   * @param HostRule[]
   */
  public function setHostRules($hostRules)
  {
    $this->hostRules = $hostRules;
  }
  /**
   * @return HostRule[]
   */
  public function getHostRules()
  {
    return $this->hostRules;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
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
   * @param PathMatcher[]
   */
  public function setPathMatchers($pathMatchers)
  {
    $this->pathMatchers = $pathMatchers;
  }
  /**
   * @return PathMatcher[]
   */
  public function getPathMatchers()
  {
    return $this->pathMatchers;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param UrlMapTest[]
   */
  public function setTests($tests)
  {
    $this->tests = $tests;
  }
  /**
   * @return UrlMapTest[]
   */
  public function getTests()
  {
    return $this->tests;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UrlMap::class, 'Google_Service_Compute_UrlMap');
