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

namespace Google\Service\NetworkSecurity;

class Destination extends \Google\Collection
{
  protected $collection_key = 'ports';
  /**
   * @var string[]
   */
  public $hosts;
  protected $httpHeaderMatchType = HttpHeaderMatch::class;
  protected $httpHeaderMatchDataType = '';
  /**
   * @var string[]
   */
  public $methods;
  /**
   * @var string[]
   */
  public $ports;

  /**
   * @param string[]
   */
  public function setHosts($hosts)
  {
    $this->hosts = $hosts;
  }
  /**
   * @return string[]
   */
  public function getHosts()
  {
    return $this->hosts;
  }
  /**
   * @param HttpHeaderMatch
   */
  public function setHttpHeaderMatch(HttpHeaderMatch $httpHeaderMatch)
  {
    $this->httpHeaderMatch = $httpHeaderMatch;
  }
  /**
   * @return HttpHeaderMatch
   */
  public function getHttpHeaderMatch()
  {
    return $this->httpHeaderMatch;
  }
  /**
   * @param string[]
   */
  public function setMethods($methods)
  {
    $this->methods = $methods;
  }
  /**
   * @return string[]
   */
  public function getMethods()
  {
    return $this->methods;
  }
  /**
   * @param string[]
   */
  public function setPorts($ports)
  {
    $this->ports = $ports;
  }
  /**
   * @return string[]
   */
  public function getPorts()
  {
    return $this->ports;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Destination::class, 'Google_Service_NetworkSecurity_Destination');
