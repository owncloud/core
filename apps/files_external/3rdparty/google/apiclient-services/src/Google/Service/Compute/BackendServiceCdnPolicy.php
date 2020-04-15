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

class Google_Service_Compute_BackendServiceCdnPolicy extends Google_Collection
{
  protected $collection_key = 'signedUrlKeyNames';
  protected $cacheKeyPolicyType = 'Google_Service_Compute_CacheKeyPolicy';
  protected $cacheKeyPolicyDataType = '';
  public $signedUrlCacheMaxAgeSec;
  public $signedUrlKeyNames;

  /**
   * @param Google_Service_Compute_CacheKeyPolicy
   */
  public function setCacheKeyPolicy(Google_Service_Compute_CacheKeyPolicy $cacheKeyPolicy)
  {
    $this->cacheKeyPolicy = $cacheKeyPolicy;
  }
  /**
   * @return Google_Service_Compute_CacheKeyPolicy
   */
  public function getCacheKeyPolicy()
  {
    return $this->cacheKeyPolicy;
  }
  public function setSignedUrlCacheMaxAgeSec($signedUrlCacheMaxAgeSec)
  {
    $this->signedUrlCacheMaxAgeSec = $signedUrlCacheMaxAgeSec;
  }
  public function getSignedUrlCacheMaxAgeSec()
  {
    return $this->signedUrlCacheMaxAgeSec;
  }
  public function setSignedUrlKeyNames($signedUrlKeyNames)
  {
    $this->signedUrlKeyNames = $signedUrlKeyNames;
  }
  public function getSignedUrlKeyNames()
  {
    return $this->signedUrlKeyNames;
  }
}
