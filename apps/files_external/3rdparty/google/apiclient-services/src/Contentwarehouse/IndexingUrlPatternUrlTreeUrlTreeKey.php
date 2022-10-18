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

namespace Google\Service\Contentwarehouse;

class IndexingUrlPatternUrlTreeUrlTreeKey extends \Google\Model
{
  /**
   * @var string
   */
  public $crawlerId;
  /**
   * @var string
   */
  public $domain;
  /**
   * @var string
   */
  public $hostname;

  /**
   * @param string
   */
  public function setCrawlerId($crawlerId)
  {
    $this->crawlerId = $crawlerId;
  }
  /**
   * @return string
   */
  public function getCrawlerId()
  {
    return $this->crawlerId;
  }
  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param string
   */
  public function setHostname($hostname)
  {
    $this->hostname = $hostname;
  }
  /**
   * @return string
   */
  public function getHostname()
  {
    return $this->hostname;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingUrlPatternUrlTreeUrlTreeKey::class, 'Google_Service_Contentwarehouse_IndexingUrlPatternUrlTreeUrlTreeKey');
