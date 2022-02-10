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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3FulfillIntentResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $outputAudio;
  protected $outputAudioConfigType = GoogleCloudDialogflowCxV3OutputAudioConfig::class;
  protected $outputAudioConfigDataType = '';
  protected $queryResultType = GoogleCloudDialogflowCxV3QueryResult::class;
  protected $queryResultDataType = '';
  /**
   * @var string
   */
  public $responseId;

  /**
   * @param string
   */
  public function setOutputAudio($outputAudio)
  {
    $this->outputAudio = $outputAudio;
  }
  /**
   * @return string
   */
  public function getOutputAudio()
  {
    return $this->outputAudio;
  }
  /**
   * @param GoogleCloudDialogflowCxV3OutputAudioConfig
   */
  public function setOutputAudioConfig(GoogleCloudDialogflowCxV3OutputAudioConfig $outputAudioConfig)
  {
    $this->outputAudioConfig = $outputAudioConfig;
  }
  /**
   * @return GoogleCloudDialogflowCxV3OutputAudioConfig
   */
  public function getOutputAudioConfig()
  {
    return $this->outputAudioConfig;
  }
  /**
   * @param GoogleCloudDialogflowCxV3QueryResult
   */
  public function setQueryResult(GoogleCloudDialogflowCxV3QueryResult $queryResult)
  {
    $this->queryResult = $queryResult;
  }
  /**
   * @return GoogleCloudDialogflowCxV3QueryResult
   */
  public function getQueryResult()
  {
    return $this->queryResult;
  }
  /**
   * @param string
   */
  public function setResponseId($responseId)
  {
    $this->responseId = $responseId;
  }
  /**
   * @return string
   */
  public function getResponseId()
  {
    return $this->responseId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3FulfillIntentResponse::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FulfillIntentResponse');
