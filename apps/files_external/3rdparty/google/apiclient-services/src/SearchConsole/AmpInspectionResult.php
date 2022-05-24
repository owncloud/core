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

class AmpInspectionResult extends \Google\Collection
{
  protected $collection_key = 'issues';
  /**
   * @var string
   */
  public $ampIndexStatusVerdict;
  /**
   * @var string
   */
  public $ampUrl;
  /**
   * @var string
   */
  public $indexingState;
  protected $issuesType = AmpIssue::class;
  protected $issuesDataType = 'array';
  /**
   * @var string
   */
  public $lastCrawlTime;
  /**
   * @var string
   */
  public $pageFetchState;
  /**
   * @var string
   */
  public $robotsTxtState;
  /**
   * @var string
   */
  public $verdict;

  /**
   * @param string
   */
  public function setAmpIndexStatusVerdict($ampIndexStatusVerdict)
  {
    $this->ampIndexStatusVerdict = $ampIndexStatusVerdict;
  }
  /**
   * @return string
   */
  public function getAmpIndexStatusVerdict()
  {
    return $this->ampIndexStatusVerdict;
  }
  /**
   * @param string
   */
  public function setAmpUrl($ampUrl)
  {
    $this->ampUrl = $ampUrl;
  }
  /**
   * @return string
   */
  public function getAmpUrl()
  {
    return $this->ampUrl;
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
   * @param AmpIssue[]
   */
  public function setIssues($issues)
  {
    $this->issues = $issues;
  }
  /**
   * @return AmpIssue[]
   */
  public function getIssues()
  {
    return $this->issues;
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
class_alias(AmpInspectionResult::class, 'Google_Service_SearchConsole_AmpInspectionResult');
