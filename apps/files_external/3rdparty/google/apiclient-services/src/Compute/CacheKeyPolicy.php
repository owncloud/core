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

class CacheKeyPolicy extends \Google\Collection
{
  protected $collection_key = 'queryStringWhitelist';
  /**
   * @var bool
   */
  public $includeHost;
  /**
   * @var string[]
   */
  public $includeHttpHeaders;
  /**
   * @var string[]
   */
  public $includeNamedCookies;
  /**
   * @var bool
   */
  public $includeProtocol;
  /**
   * @var bool
   */
  public $includeQueryString;
  /**
   * @var string[]
   */
  public $queryStringBlacklist;
  /**
   * @var string[]
   */
  public $queryStringWhitelist;

  /**
   * @param bool
   */
  public function setIncludeHost($includeHost)
  {
    $this->includeHost = $includeHost;
  }
  /**
   * @return bool
   */
  public function getIncludeHost()
  {
    return $this->includeHost;
  }
  /**
   * @param string[]
   */
  public function setIncludeHttpHeaders($includeHttpHeaders)
  {
    $this->includeHttpHeaders = $includeHttpHeaders;
  }
  /**
   * @return string[]
   */
  public function getIncludeHttpHeaders()
  {
    return $this->includeHttpHeaders;
  }
  /**
   * @param string[]
   */
  public function setIncludeNamedCookies($includeNamedCookies)
  {
    $this->includeNamedCookies = $includeNamedCookies;
  }
  /**
   * @return string[]
   */
  public function getIncludeNamedCookies()
  {
    return $this->includeNamedCookies;
  }
  /**
   * @param bool
   */
  public function setIncludeProtocol($includeProtocol)
  {
    $this->includeProtocol = $includeProtocol;
  }
  /**
   * @return bool
   */
  public function getIncludeProtocol()
  {
    return $this->includeProtocol;
  }
  /**
   * @param bool
   */
  public function setIncludeQueryString($includeQueryString)
  {
    $this->includeQueryString = $includeQueryString;
  }
  /**
   * @return bool
   */
  public function getIncludeQueryString()
  {
    return $this->includeQueryString;
  }
  /**
   * @param string[]
   */
  public function setQueryStringBlacklist($queryStringBlacklist)
  {
    $this->queryStringBlacklist = $queryStringBlacklist;
  }
  /**
   * @return string[]
   */
  public function getQueryStringBlacklist()
  {
    return $this->queryStringBlacklist;
  }
  /**
   * @param string[]
   */
  public function setQueryStringWhitelist($queryStringWhitelist)
  {
    $this->queryStringWhitelist = $queryStringWhitelist;
  }
  /**
   * @return string[]
   */
  public function getQueryStringWhitelist()
  {
    return $this->queryStringWhitelist;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CacheKeyPolicy::class, 'Google_Service_Compute_CacheKeyPolicy');
