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

class IndexingEmbeddedContentRenderCacheStats extends \Google\Model
{
  /**
   * @var string
   */
  public $cacheExpireTimestampUsec;
  /**
   * @var int
   */
  public $crawledSimhashDistance;
  /**
   * @var string
   */
  public $lastRenderedTimestampUsec;
  /**
   * @var string
   */
  public $renderCache;
  /**
   * @var int
   */
  public $renderedSimhashDistance;

  /**
   * @param string
   */
  public function setCacheExpireTimestampUsec($cacheExpireTimestampUsec)
  {
    $this->cacheExpireTimestampUsec = $cacheExpireTimestampUsec;
  }
  /**
   * @return string
   */
  public function getCacheExpireTimestampUsec()
  {
    return $this->cacheExpireTimestampUsec;
  }
  /**
   * @param int
   */
  public function setCrawledSimhashDistance($crawledSimhashDistance)
  {
    $this->crawledSimhashDistance = $crawledSimhashDistance;
  }
  /**
   * @return int
   */
  public function getCrawledSimhashDistance()
  {
    return $this->crawledSimhashDistance;
  }
  /**
   * @param string
   */
  public function setLastRenderedTimestampUsec($lastRenderedTimestampUsec)
  {
    $this->lastRenderedTimestampUsec = $lastRenderedTimestampUsec;
  }
  /**
   * @return string
   */
  public function getLastRenderedTimestampUsec()
  {
    return $this->lastRenderedTimestampUsec;
  }
  /**
   * @param string
   */
  public function setRenderCache($renderCache)
  {
    $this->renderCache = $renderCache;
  }
  /**
   * @return string
   */
  public function getRenderCache()
  {
    return $this->renderCache;
  }
  /**
   * @param int
   */
  public function setRenderedSimhashDistance($renderedSimhashDistance)
  {
    $this->renderedSimhashDistance = $renderedSimhashDistance;
  }
  /**
   * @return int
   */
  public function getRenderedSimhashDistance()
  {
    return $this->renderedSimhashDistance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingEmbeddedContentRenderCacheStats::class, 'Google_Service_Contentwarehouse_IndexingEmbeddedContentRenderCacheStats');
