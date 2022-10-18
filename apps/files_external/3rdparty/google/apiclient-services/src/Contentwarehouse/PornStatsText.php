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

class PornStatsText extends \Google\Model
{
  /**
   * @var string
   */
  public $anyPornPageCount;
  /**
   * @var string
   */
  public $pageCount;
  /**
   * @var string
   */
  public $siteKey;
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setAnyPornPageCount($anyPornPageCount)
  {
    $this->anyPornPageCount = $anyPornPageCount;
  }
  /**
   * @return string
   */
  public function getAnyPornPageCount()
  {
    return $this->anyPornPageCount;
  }
  /**
   * @param string
   */
  public function setPageCount($pageCount)
  {
    $this->pageCount = $pageCount;
  }
  /**
   * @return string
   */
  public function getPageCount()
  {
    return $this->pageCount;
  }
  /**
   * @param string
   */
  public function setSiteKey($siteKey)
  {
    $this->siteKey = $siteKey;
  }
  /**
   * @return string
   */
  public function getSiteKey()
  {
    return $this->siteKey;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PornStatsText::class, 'Google_Service_Contentwarehouse_PornStatsText');
