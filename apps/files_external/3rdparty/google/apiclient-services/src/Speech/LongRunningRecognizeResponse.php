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

class LongRunningRecognizeResponse extends \Google\Collection
{
  protected $collection_key = 'results';
  protected $outputConfigType = TranscriptOutputConfig::class;
  protected $outputConfigDataType = '';
  protected $outputErrorType = Status::class;
  protected $outputErrorDataType = '';
  protected $resultsType = SpeechRecognitionResult::class;
  protected $resultsDataType = 'array';
  public $totalBilledTime;

  /**
   * @param TranscriptOutputConfig
   */
  public function setOutputConfig(TranscriptOutputConfig $outputConfig)
  {
    $this->outputConfig = $outputConfig;
  }
  /**
   * @return TranscriptOutputConfig
   */
  public function getOutputConfig()
  {
    return $this->outputConfig;
  }
  /**
   * @param Status
   */
  public function setOutputError(Status $outputError)
  {
    $this->outputError = $outputError;
  }
  /**
   * @return Status
   */
  public function getOutputError()
  {
    return $this->outputError;
  }
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
  public function setTotalBilledTime($totalBilledTime)
  {
    $this->totalBilledTime = $totalBilledTime;
  }
  public function getTotalBilledTime()
  {
    return $this->totalBilledTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LongRunningRecognizeResponse::class, 'Google_Service_Speech_LongRunningRecognizeResponse');
