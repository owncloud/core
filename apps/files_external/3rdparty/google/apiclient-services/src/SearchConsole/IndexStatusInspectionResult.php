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

namespace Google\Service\SearchConsole;

class IndexStatusInspectionResult extends \Google\Collection
{
  protected $collection_key = 'sitemap';
  /**
   * @var string
   */
  public $coverageState;
  /**
   * @var string
   */
  public $crawledAs;
  /**
   * @var string
   */
  public $googleCanonical;
  /**
   * @var string
   */
  public $indexingState;
  /**
   * @var string
   */
  public $lastCrawlTime;
  /**
   * @var string
   */
  public $pageFetchState;
  /**
   * @var string[]
   */
  public $referringUrls;
  /**
   * @var string
   */
  public $robotsTxtState;
  /**
   * @var string[]
   */
  public $sitemap;
  /**
   * @var string
   */
  public $userCanonical;
  /**
   * @var string
   */
  public $verdict;

  /**
   * @param string
   */
  public function setCoverageState($coverageState)
  {
    $this->coverageState = $coverageState;
  }
  /**
   * @return string
   */
  public function getCoverageState()
  {
    return $this->coverageState;
  }
  /**
   * @param string
   */
  public function setCrawledAs($crawledAs)
  {
    $this->crawledAs = $crawledAs;
  }
  /**
   * @return string
   */
  public function getCrawledAs()
  {
    return $this->crawledAs;
  }
  /**
   * @param string
   */
  public function setGoogleCanonical($googleCanonical)
  {
    $this->googleCanonical = $googleCanonical;
  }
  /**
   * @return string
   */
  public function getGoogleCanonical()
  {
    return $this->googleCanonical;
  }
  /**
   * @param string
   */
  public function setIndexingState($indexingState)
  {
    $this->indexingState = $indexingState;
  }
  /**
   * @return string
   */
  public function getIndexingState()
  {
    return $this->indexingState;
  }
  /**
   * @param string
   */
  public function setLastCrawlTime($lastCrawlTime)
  {
    $this->lastCrawlTime = $lastCrawlTime;
  }
  /**
   * @return string
   */
  public function getLastCrawlTime()
  {
    return $this->lastCrawlTime;
  }
  /**
   * @param string
   */
  public function setPageFetchState($pageFetchState)
  {
    $this->pageFetchState = $pageFetchState;
  }
  /**
   * @return string
   */
  public function getPageFetchState()
  {
    return $this->pageFetchState;
  }
  /**
   * @param string[]
   */
  public function setReferringUrls($referringUrls)
  {
    $this->referringUrls = $referringUrls;
  }
  /**
   * @return string[]
   */
  public function getReferringUrls()
  {
    return $this->referringUrls;
  }
  /**
   * @param string
   */
  public function setRobotsTxtState($robotsTxtState)
  {
    $this->robotsTxtState = $robotsTxtState;
  }
  /**
   * @return string
   */
  public function getRobotsTxtState()
  {
    return $this->robotsTxtState;
  }
  /**
   * @param string[]
   */
  public function setSitemap($sitemap)
  {
    $this->sitemap = $sitemap;
  }
  /**
   * @return string[]
   */
  public function getSitemap()
  {
    return $this->sitemap;
  }
  /**
   * @param string
   */
  public function setUserCanonical($userCanonical)
  {
    $this->userCanonical = $userCanonical;
  }
  /**
   * @return string
   */
  public function getUserCanonical()
  {
    return $this->userCanonical;
  }
  /**
   * @param string
   */
  public function setVerdict($verdict)
  {
    $this->verdict = $verdict;
  }
  /**
   * @return string
   */
  public function getVerdict()
  {
    return $this->verdict;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexStatusInspectionResult::class, 'Google_Service_SearchConsole_IndexStatusInspectionResult');
