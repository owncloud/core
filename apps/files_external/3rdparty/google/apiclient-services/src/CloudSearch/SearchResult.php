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

namespace Google\Service\CloudSearch;

class SearchResult extends \Google\Collection
{
  protected $collection_key = 'clusteredResults';
  protected $clusteredResultsType = SearchResult::class;
  protected $clusteredResultsDataType = 'array';
  protected $debugInfoType = ResultDebugInfo::class;
  protected $debugInfoDataType = '';
  protected $metadataType = Metadata::class;
  protected $metadataDataType = '';
  protected $snippetType = Snippet::class;
  protected $snippetDataType = '';
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $url;

  /**
   * @param SearchResult[]
   */
  public function setClusteredResults($clusteredResults)
  {
    $this->clusteredResults = $clusteredResults;
  }
  /**
   * @return SearchResult[]
   */
  public function getClusteredResults()
  {
    return $this->clusteredResults;
  }
  /**
   * @param ResultDebugInfo
   */
  public function setDebugInfo(ResultDebugInfo $debugInfo)
  {
    $this->debugInfo = $debugInfo;
  }
  /**
   * @return ResultDebugInfo
   */
  public function getDebugInfo()
  {
    return $this->debugInfo;
  }
  /**
   * @param Metadata
   */
  public function setMetadata(Metadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Metadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Snippet
   */
  public function setSnippet(Snippet $snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return Snippet
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchResult::class, 'Google_Service_CloudSearch_SearchResult');
