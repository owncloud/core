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

class DNSConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $clusterDns;
  /**
   * @var string
   */
  public $clusterDnsDomain;
  /**
   * @var string
   */
  public $clusterDnsScope;

  /**
   * @param string
   */
  public function setClusterDns($clusterDns)
  {
    $this->clusterDns = $clusterDns;
  }
  /**
   * @return string
   */
  public function getClusterDns()
  {
    return $this->clusterDns;
  }
  /**
   * @param string
   */
  public function setClusterDnsDomain($clusterDnsDomain)
  {
    $this->clusterDnsDomain = $clusterDnsDomain;
  }
  /**
   * @return string
   */
  public function getClusterDnsDomain()
  {
    return $this->clusterDnsDomain;
  }
  /**
   * @param string
   */
  public function setClusterDnsScope($clusterDnsScope)
  {
    $this->clusterDnsScope = $clusterDnsScope;
  }
  /**
   * @return string
   */
  public function getClusterDnsScope()
  {
    return $this->clusterDnsScope;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DNSConfig::class, 'Google_Service_Container_DNSConfig');
