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

class Google_Service_CloudSearch_SuggestResult extends Google_Model
{
  protected $peopleSuggestionType = 'Google_Service_CloudSearch_PeopleSuggestion';
  protected $peopleSuggestionDataType = '';
  protected $querySuggestionType = 'Google_Service_CloudSearch_QuerySuggestion';
  protected $querySuggestionDataType = '';
  protected $sourceType = 'Google_Service_CloudSearch_Source';
  protected $sourceDataType = '';
  public $suggestedQuery;

  /**
   * @param Google_Service_CloudSearch_PeopleSuggestion
   */
  public function setPeopleSuggestion(Google_Service_CloudSearch_PeopleSuggestion $peopleSuggestion)
  {
    $this->peopleSuggestion = $peopleSuggestion;
  }
  /**
   * @return Google_Service_CloudSearch_PeopleSuggestion
   */
  public function getPeopleSuggestion()
  {
    return $this->peopleSuggestion;
  }
  /**
   * @param Google_Service_CloudSearch_QuerySuggestion
   */
  public function setQuerySuggestion(Google_Service_CloudSearch_QuerySuggestion $querySuggestion)
  {
    $this->querySuggestion = $querySuggestion;
  }
  /**
   * @return Google_Service_CloudSearch_QuerySuggestion
   */
  public function getQuerySuggestion()
  {
    return $this->querySuggestion;
  }
  /**
   * @param Google_Service_CloudSearch_Source
   */
  public function setSource(Google_Service_CloudSearch_Source $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_CloudSearch_Source
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
