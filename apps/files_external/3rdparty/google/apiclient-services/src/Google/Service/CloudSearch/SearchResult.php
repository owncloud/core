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

class Google_Service_CloudSearch_SearchResult extends Google_Collection
{
  protected $collection_key = 'clusteredResults';
  protected $clusteredResultsType = 'Google_Service_CloudSearch_SearchResult';
  protected $clusteredResultsDataType = 'array';
  protected $debugInfoType = 'Google_Service_CloudSearch_ResultDebugInfo';
  protected $debugInfoDataType = '';
  protected $metadataType = 'Google_Service_CloudSearch_Metadata';
  protected $metadataDataType = '';
  protected $snippetType = 'Google_Service_CloudSearch_Snippet';
  protected $snippetDataType = '';
  public $title;
  public $url;

  /**
   * @param Google_Service_CloudSearch_SearchResult
   */
  public function setClusteredResults($clusteredResults)
  {
    $this->clusteredResults = $clusteredResults;
  }
  /**
   * @return Google_Service_CloudSearch_SearchResult
   */
  public function getClusteredResults()
  {
    return $this->clusteredResults;
  }
  /**
   * @param Google_Service_CloudSearch_ResultDebugInfo
   */
  public function setDebugInfo(Google_Service_CloudSearch_ResultDebugInfo $debugInfo)
  {
    $this->debugInfo = $debugInfo;
  }
  /**
   * @return Google_Service_CloudSearch_ResultDebugInfo
   */
  public function getDebugInfo()
  {
    return $this->debugInfo;
  }
  /**
   * @param Google_Service_CloudSearch_Metadata
   */
  public function setMetadata(Google_Service_CloudSearch_Metadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_CloudSearch_Metadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Google_Service_CloudSearch_Snippet
   */
  public function setSnippet(Google_Service_CloudSearch_Snippet $snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return Google_Service_CloudSearch_Snippet
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
