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

class Google_Service_CloudSearch_Snippet extends Google_Collection
{
  protected $collection_key = 'matchRanges';
  protected $matchRangesType = 'Google_Service_CloudSearch_MatchRange';
  protected $matchRangesDataType = 'array';
  public $snippet;

  /**
   * @param Google_Service_CloudSearch_MatchRange[]
   */
  public function setMatchRanges($matchRanges)
  {
    $this->matchRanges = $matchRanges;
  }
  /**
   * @return Google_Service_CloudSearch_MatchRange[]
   */
  public function getMatchRanges()
  {
    return $this->matchRanges;
  }
  public function setSnippet($snippet)
  {
    $this->snippet = $snippet;
  }
  public function getSnippet()
  {
    return $this->snippet;
  }
}
