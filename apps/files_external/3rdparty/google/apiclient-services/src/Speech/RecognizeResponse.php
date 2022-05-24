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

namespace Google\Service\Speech;

class RecognizeResponse extends \Google\Collection
{
  protected $collection_key = 'results';
  protected $resultsType = SpeechRecognitionResult::class;
  protected $resultsDataType = 'array';
  /**
   * @var string
   */
  public $totalBilledTime;

  /**
   * @param SpeechRecognitionResult[]
   */
  public function setResults($results)
  {
    $this->results = $results;
  }
  /**
   * @return SpeechRecognitionResult[]
   */
  public function getResults()
  {
    return $this->results;
  }
  /**
   * @param string
   */
  public function setTotalBilledTime($totalBilledTime)
  {
    $this->totalBilledTime = $totalBilledTime;
  }
  /**
   * @return string
   */
  public function getTotalBilledTime()
  {
    return $this->totalBilledTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RecognizeResponse::class, 'Google_Service_Speech_RecognizeResponse');
