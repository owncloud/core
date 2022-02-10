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

class BackendBucketCdnPolicyCacheKeyPolicy extends \Google\Collection
{
  protected $collection_key = 'queryStringWhitelist';
  /**
   * @var string[]
   */
  public $includeHttpHeaders;
  /**
   * @var string[]
   */
  public $queryStringWhitelist;

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
class_alias(BackendBucketCdnPolicyCacheKeyPolicy::class, 'Google_Service_Compute_BackendBucketCdnPolicyCacheKeyPolicy');
