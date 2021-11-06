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

class SourceResultCount extends \Google\Model
{
  public $hasMoreResults;
  public $resultCountEstimate;
  public $resultCountExact;
  protected $sourceType = Source::class;
  protected $sourceDataType = '';

  public function setHasMoreResults($hasMoreResults)
  {
    $this->hasMoreResults = $hasMoreResults;
  }
  public function getHasMoreResults()
  {
    return $this->hasMoreResults;
  }
  public function setResultCountEstimate($resultCountEstimate)
  {
    $this->resultCountEstimate = $resultCountEstimate;
  }
  public function getResultCountEstimate()
  {
    return $this->resultCountEstimate;
  }
  public function setResultCountExact($resultCountExact)
  {
    $this->resultCountExact = $resultCountExact;
  }
  public function getResultCountExact()
  {
    return $this->resultCountExact;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SourceResultCount::class, 'Google_Service_CloudSearch_SourceResultCount');
