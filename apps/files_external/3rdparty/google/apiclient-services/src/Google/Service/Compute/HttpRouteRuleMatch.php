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

class Google_Service_Compute_HttpRouteRuleMatch extends Google_Collection
{
  protected $collection_key = 'queryParameterMatches';
  public $fullPathMatch;
  protected $headerMatchesType = 'Google_Service_Compute_HttpHeaderMatch';
  protected $headerMatchesDataType = 'array';
  public $ignoreCase;
  protected $metadataFiltersType = 'Google_Service_Compute_MetadataFilter';
  protected $metadataFiltersDataType = 'array';
  public $prefixMatch;
  protected $queryParameterMatchesType = 'Google_Service_Compute_HttpQueryParameterMatch';
  protected $queryParameterMatchesDataType = 'array';
  public $regexMatch;

  public function setFullPathMatch($fullPathMatch)
  {
    $this->fullPathMatch = $fullPathMatch;
  }
  public function getFullPathMatch()
  {
    return $this->fullPathMatch;
  }
  /**
   * @param Google_Service_Compute_HttpHeaderMatch
   */
  public function setHeaderMatches($headerMatches)
  {
    $this->headerMatches = $headerMatches;
  }
  /**
   * @return Google_Service_Compute_HttpHeaderMatch
   */
  public function getHeaderMatches()
  {
    return $this->headerMatches;
  }
  public function setIgnoreCase($ignoreCase)
  {
    $this->ignoreCase = $ignoreCase;
  }
  public function getIgnoreCase()
  {
    return $this->ignoreCase;
  }
  /**
   * @param Google_Service_Compute_MetadataFilter
   */
  public function setMetadataFilters($metadataFilters)
  {
    $this->metadataFilters = $metadataFilters;
  }
  /**
   * @return Google_Service_Compute_MetadataFilter
   */
  public function getMetadataFilters()
  {
    return $this->metadataFilters;
  }
  public function setPrefixMatch($prefixMatch)
  {
    $this->prefixMatch = $prefixMatch;
  }
  public function getPrefixMatch()
  {
    return $this->prefixMatch;
  }
  /**
   * @param Google_Service_Compute_HttpQueryParameterMatch
   */
  public function setQueryParameterMatches($queryParameterMatches)
  {
    $this->queryParameterMatches = $queryParameterMatches;
  }
  /**
   * @return Google_Service_Compute_HttpQueryParameterMatch
   */
  public function getQueryParameterMatches()
  {
    return $this->queryParameterMatches;
  }
  public function setRegexMatch($regexMatch)
  {
    $this->regexMatch = $regexMatch;
  }
  public function getRegexMatch()
  {
    return $this->regexMatch;
  }
}
