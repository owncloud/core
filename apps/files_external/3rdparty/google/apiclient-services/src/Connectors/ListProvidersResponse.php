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

namespace Google\Service\Connectors;

class ListProvidersResponse extends \Google\Collection
{
  protected $collection_key = 'unreachable';
  public $nextPageToken;
  protected $providersType = Provider::class;
  protected $providersDataType = 'array';
  public $unreachable;

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param Provider[]
   */
  public function setProviders($providers)
  {
    $this->providers = $providers;
  }
  /**
   * @return Provider[]
   */
  public function getProviders()
  {
    return $this->providers;
  }
  public function setUnreachable($unreachable)
  {
    $this->unreachable = $unreachable;
  }
  public function getUnreachable()
  {
    return $this->unreachable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListProvidersResponse::class, 'Google_Service_Connectors_ListProvidersResponse');
