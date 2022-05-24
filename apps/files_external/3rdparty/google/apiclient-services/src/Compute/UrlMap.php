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
  /**
   * @var string
   */
  public $creationTimestamp;
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
  /**
   * @var string
   */
  public $fingerprint;
  protected $headerActionType = HttpHeaderAction::class;
  protected $headerActionDataType = '';
  protected $hostRulesType = HostRule::class;
  protected $hostRulesDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  protected $pathMatchersType = PathMatcher::class;
  protected $pathMatchersDataType = 'array';
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $selfLink;
  protected $testsType = UrlMapTest::class;
  protected $testsDataType = 'array';

  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
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
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
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
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
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
