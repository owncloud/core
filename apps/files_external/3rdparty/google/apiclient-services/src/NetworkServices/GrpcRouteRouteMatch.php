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

namespace Google\Service\NetworkServices;

class GrpcRouteRouteMatch extends \Google\Collection
{
  protected $collection_key = 'headers';
  protected $headersType = GrpcRouteHeaderMatch::class;
  protected $headersDataType = 'array';
  protected $methodType = GrpcRouteMethodMatch::class;
  protected $methodDataType = '';

  /**
   * @param GrpcRouteHeaderMatch[]
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return GrpcRouteHeaderMatch[]
   */
  public function getHeaders()
  {
    return $this->headers;
  }
  /**
   * @param GrpcRouteMethodMatch
   */
  public function setMethod(GrpcRouteMethodMatch $method)
  {
    $this->method = $method;
  }
  /**
   * @return GrpcRouteMethodMatch
   */
  public function getMethod()
  {
    return $this->method;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GrpcRouteRouteMatch::class, 'Google_Service_NetworkServices_GrpcRouteRouteMatch');
