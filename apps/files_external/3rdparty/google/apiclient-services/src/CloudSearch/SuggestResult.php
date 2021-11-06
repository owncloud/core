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

class SuggestResult extends \Google\Model
{
  protected $peopleSuggestionType = PeopleSuggestion::class;
  protected $peopleSuggestionDataType = '';
  protected $querySuggestionType = QuerySuggestion::class;
  protected $querySuggestionDataType = '';
  protected $sourceType = Source::class;
  protected $sourceDataType = '';
  public $suggestedQuery;

  /**
   * @param PeopleSuggestion
   */
  public function setPeopleSuggestion(PeopleSuggestion $peopleSuggestion)
  {
    $this->peopleSuggestion = $peopleSuggestion;
  }
  /**
   * @return PeopleSuggestion
   */
  public function getPeopleSuggestion()
  {
    return $this->peopleSuggestion;
  }
  /**
   * @param QuerySuggestion
   */
  public function setQuerySuggestion(QuerySuggestion $querySuggestion)
  {
    $this->querySuggestion = $querySuggestion;
  }
  /**
   * @return QuerySuggestion
   */
  public function getQuerySuggestion()
  {
    return $this->querySuggestion;
  }
  /**
   * @param Source
   */
  public function setSource(Source $source)
  {
    $this->source = $source;
  }
  /**
   * @return Source
   */
  public function getSource()
  {
    return $this->source;
  }
  public function setSuggestedQuery($suggestedQuery)
  {
    $this->suggestedQuery = $suggestedQuery;
  }
  public function getSuggestedQuery()
  {
    return $this->suggestedQuery;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SuggestResult::class, 'Google_Service_CloudSearch_SuggestResult');
