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

class BackendBucketCdnPolicy extends \Google\Collection
{
  protected $collection_key = 'signedUrlKeyNames';
  protected $bypassCacheOnRequestHeadersType = BackendBucketCdnPolicyBypassCacheOnRequestHeader::class;
  protected $bypassCacheOnRequestHeadersDataType = 'array';
  protected $cacheKeyPolicyType = BackendBucketCdnPolicyCacheKeyPolicy::class;
  protected $cacheKeyPolicyDataType = '';
  /**
   * @var string
   */
  public $cacheMode;
  /**
   * @var int
   */
  public $clientTtl;
  /**
   * @var int
   */
  public $defaultTtl;
  /**
   * @var int
   */
  public $maxTtl;
  /**
   * @var bool
   */
  public $negativeCaching;
  protected $negativeCachingPolicyType = BackendBucketCdnPolicyNegativeCachingPolicy::class;
  protected $negativeCachingPolicyDataType = 'array';
  /**
   * @var bool
   */
  public $requestCoalescing;
  /**
   * @var int
   */
  public $serveWhileStale;
  /**
   * @var string
   */
  public $signedUrlCacheMaxAgeSec;
  /**
   * @var string[]
   */
  public $signedUrlKeyNames;

  /**
   * @param BackendBucketCdnPolicyBypassCacheOnRequestHeader[]
   */
  public function setBypassCacheOnRequestHeaders($bypassCacheOnRequestHeaders)
  {
    $this->bypassCacheOnRequestHeaders = $bypassCacheOnRequestHeaders;
  }
  /**
   * @return BackendBucketCdnPolicyBypassCacheOnRequestHeader[]
   */
  public function getBypassCacheOnRequestHeaders()
  {
    return $this->bypassCacheOnRequestHeaders;
  }
  /**
   * @param BackendBucketCdnPolicyCacheKeyPolicy
   */
  public function setCacheKeyPolicy(BackendBucketCdnPolicyCacheKeyPolicy $cacheKeyPolicy)
  {
    $this->cacheKeyPolicy = $cacheKeyPolicy;
  }
  /**
   * @return BackendBucketCdnPolicyCacheKeyPolicy
   */
  public function getCacheKeyPolicy()
  {
    return $this->cacheKeyPolicy;
  }
  /**
   * @param string
   */
  public function setCacheMode($cacheMode)
  {
    $this->cacheMode = $cacheMode;
  }
  /**
   * @return string
   */
  public function getCacheMode()
  {
    return $this->cacheMode;
  }
  /**
   * @param int
   */
  public function setClientTtl($clientTtl)
  {
    $this->clientTtl = $clientTtl;
  }
  /**
   * @return int
   */
  public function getClientTtl()
  {
    return $this->clientTtl;
  }
  /**
   * @param int
   */
  public function setDefaultTtl($defaultTtl)
  {
    $this->defaultTtl = $defaultTtl;
  }
  /**
   * @return int
   */
  public function getDefaultTtl()
  {
    return $this->defaultTtl;
  }
  /**
   * @param int
   */
  public function setMaxTtl($maxTtl)
  {
    $this->maxTtl = $maxTtl;
  }
  /**
   * @return int
   */
  public function getMaxTtl()
  {
    return $this->maxTtl;
  }
  /**
   * @param bool
   */
  public function setNegativeCaching($negativeCaching)
  {
    $this->negativeCaching = $negativeCaching;
  }
  /**
   * @return bool
   */
  public function getNegativeCaching()
  {
    return $this->negativeCaching;
  }
  /**
   * @param BackendBucketCdnPolicyNegativeCachingPolicy[]
   */
  public function setNegativeCachingPolicy($negativeCachingPolicy)
  {
    $this->negativeCachingPolicy = $negativeCachingPolicy;
  }
  /**
   * @return BackendBucketCdnPolicyNegativeCachingPolicy[]
   */
  public function getNegativeCachingPolicy()
  {
    return $this->negativeCachingPolicy;
  }
  /**
   * @param bool
   */
  public function setRequestCoalescing($requestCoalescing)
  {
    $this->requestCoalescing = $requestCoalescing;
  }
  /**
   * @return bool
   */
  public function getRequestCoalescing()
  {
    return $this->requestCoalescing;
  }
  /**
   * @param int
   */
  public function setServeWhileStale($serveWhileStale)
  {
    $this->serveWhileStale = $serveWhileStale;
  }
  /**
   * @return int
   */
  public function getServeWhileStale()
  {
    return $this->serveWhileStale;
  }
  /**
   * @param string
   */
  public function setSignedUrlCacheMaxAgeSec($signedUrlCacheMaxAgeSec)
  {
    $this->signedUrlCacheMaxAgeSec = $signedUrlCacheMaxAgeSec;
  }
  /**
   * @return string
   */
  public function getSignedUrlCacheMaxAgeSec()
  {
    return $this->signedUrlCacheMaxAgeSec;
  }
  /**
   * @param string[]
   */
  public function setSignedUrlKeyNames($signedUrlKeyNames)
  {
    $this->signedUrlKeyNames = $signedUrlKeyNames;
  }
  /**
   * @return string[]
   */
  public function getSignedUrlKeyNames()
  {
    return $this->signedUrlKeyNames;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackendBucketCdnPolicy::class, 'Google_Service_Compute_BackendBucketCdnPolicy');
