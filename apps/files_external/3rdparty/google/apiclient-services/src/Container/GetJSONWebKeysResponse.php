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

namespace Google\Service\Container;

class GetJSONWebKeysResponse extends \Google\Collection
{
  protected $collection_key = 'keys';
  protected $cacheHeaderType = HttpCacheControlResponseHeader::class;
  protected $cacheHeaderDataType = '';
  protected $keysType = Jwk::class;
  protected $keysDataType = 'array';

  /**
   * @param HttpCacheControlResponseHeader
   */
  public function setCacheHeader(HttpCacheControlResponseHeader $cacheHeader)
  {
    $this->cacheHeader = $cacheHeader;
  }
  /**
   * @return HttpCacheControlResponseHeader
   */
  public function getCacheHeader()
  {
    return $this->cacheHeader;
  }
  /**
   * @param Jwk[]
   */
  public function setKeys($keys)
  {
    $this->keys = $keys;
  }
  /**
   * @return Jwk[]
   */
  public function getKeys()
  {
    return $this->keys;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GetJSONWebKeysResponse::class, 'Google_Service_Container_GetJSONWebKeysResponse');
