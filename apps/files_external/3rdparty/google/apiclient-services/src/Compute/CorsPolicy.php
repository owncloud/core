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

class CorsPolicy extends \Google\Collection
{
  protected $collection_key = 'exposeHeaders';
  /**
   * @var bool
   */
  public $allowCredentials;
  /**
   * @var string[]
   */
  public $allowHeaders;
  /**
   * @var string[]
   */
  public $allowMethods;
  /**
   * @var string[]
   */
  public $allowOriginRegexes;
  /**
   * @var string[]
   */
  public $allowOrigins;
  /**
   * @var bool
   */
  public $disabled;
  /**
   * @var string[]
   */
  public $exposeHeaders;
  /**
   * @var int
   */
  public $maxAge;

  /**
   * @param bool
   */
  public function setAllowCredentials($allowCredentials)
  {
    $this->allowCredentials = $allowCredentials;
  }
  /**
   * @return bool
   */
  public function getAllowCredentials()
  {
    return $this->allowCredentials;
  }
  /**
   * @param string[]
   */
  public function setAllowHeaders($allowHeaders)
  {
    $this->allowHeaders = $allowHeaders;
  }
  /**
   * @return string[]
   */
  public function getAllowHeaders()
  {
    return $this->allowHeaders;
  }
  /**
   * @param string[]
   */
  public function setAllowMethods($allowMethods)
  {
    $this->allowMethods = $allowMethods;
  }
  /**
   * @return string[]
   */
  public function getAllowMethods()
  {
    return $this->allowMethods;
  }
  /**
   * @param string[]
   */
  public function setAllowOriginRegexes($allowOriginRegexes)
  {
    $this->allowOriginRegexes = $allowOriginRegexes;
  }
  /**
   * @return string[]
   */
  public function getAllowOriginRegexes()
  {
    return $this->allowOriginRegexes;
  }
  /**
   * @param string[]
   */
  public function setAllowOrigins($allowOrigins)
  {
    $this->allowOrigins = $allowOrigins;
  }
  /**
   * @return string[]
   */
  public function getAllowOrigins()
  {
    return $this->allowOrigins;
  }
  /**
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
  public function getDisabled()
  {
    return $this->disabled;
  }
  /**
   * @param string[]
   */
  public function setExposeHeaders($exposeHeaders)
  {
    $this->exposeHeaders = $exposeHeaders;
  }
  /**
   * @return string[]
   */
  public function getExposeHeaders()
  {
    return $this->exposeHeaders;
  }
  /**
   * @param int
   */
  public function setMaxAge($maxAge)
  {
    $this->maxAge = $maxAge;
  }
  /**
   * @return int
   */
  public function getMaxAge()
  {
    return $this->maxAge;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CorsPolicy::class, 'Google_Service_Compute_CorsPolicy');
