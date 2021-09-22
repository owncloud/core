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
  public $allowCredentials;
  public $allowHeaders;
  public $allowMethods;
  public $allowOriginRegexes;
  public $allowOrigins;
  public $disabled;
  public $exposeHeaders;
  public $maxAge;

  public function setAllowCredentials($allowCredentials)
  {
    $this->allowCredentials = $allowCredentials;
  }
  public function getAllowCredentials()
  {
    return $this->allowCredentials;
  }
  public function setAllowHeaders($allowHeaders)
  {
    $this->allowHeaders = $allowHeaders;
  }
  public function getAllowHeaders()
  {
    return $this->allowHeaders;
  }
  public function setAllowMethods($allowMethods)
  {
    $this->allowMethods = $allowMethods;
  }
  public function getAllowMethods()
  {
    return $this->allowMethods;
  }
  public function setAllowOriginRegexes($allowOriginRegexes)
  {
    $this->allowOriginRegexes = $allowOriginRegexes;
  }
  public function getAllowOriginRegexes()
  {
    return $this->allowOriginRegexes;
  }
  public function setAllowOrigins($allowOrigins)
  {
    $this->allowOrigins = $allowOrigins;
  }
  public function getAllowOrigins()
  {
    return $this->allowOrigins;
  }
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  public function getDisabled()
  {
    return $this->disabled;
  }
  public function setExposeHeaders($exposeHeaders)
  {
    $this->exposeHeaders = $exposeHeaders;
  }
  public function getExposeHeaders()
  {
    return $this->exposeHeaders;
  }
  public function setMaxAge($maxAge)
  {
    $this->maxAge = $maxAge;
  }
  public function getMaxAge()
  {
    return $this->maxAge;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CorsPolicy::class, 'Google_Service_Compute_CorsPolicy');
