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

namespace Google\Service\ChromePolicy;

class GoogleChromePolicyVersionsV1ResolveResponse extends \Google\Collection
{
  protected $collection_key = 'resolvedPolicies';
  /**
   * @var string
   */
  public $nextPageToken;
  protected $resolvedPoliciesType = GoogleChromePolicyVersionsV1ResolvedPolicy::class;
  protected $resolvedPoliciesDataType = 'array';

  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param GoogleChromePolicyVersionsV1ResolvedPolicy[]
   */
  public function setResolvedPolicies($resolvedPolicies)
  {
    $this->resolvedPolicies = $resolvedPolicies;
  }
  /**
   * @return GoogleChromePolicyVersionsV1ResolvedPolicy[]
   */
  public function getResolvedPolicies()
  {
    return $this->resolvedPolicies;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromePolicyVersionsV1ResolveResponse::class, 'Google_Service_ChromePolicy_GoogleChromePolicyVersionsV1ResolveResponse');
