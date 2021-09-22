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

class GoogleCloudDialogflowV2beta1WebhookRequest extends \Google\Collection
{
  protected $collection_key = 'alternativeQueryResults';
  protected $alternativeQueryResultsType = GoogleCloudDialogflowV2beta1QueryResult::class;
  protected $alternativeQueryResultsDataType = 'array';
  protected $originalDetectIntentRequestType = GoogleCloudDialogflowV2beta1OriginalDetectIntentRequest::class;
  protected $originalDetectIntentRequestDataType = '';
  protected $queryResultType = GoogleCloudDialogflowV2beta1QueryResult::class;
  protected $queryResultDataType = '';
  public $responseId;
  public $session;

  /**
   * @param GoogleCloudDialogflowV2beta1QueryResult[]
   */
  public function setAlternativeQueryResults($alternativeQueryResults)
  {
    $this->alternativeQueryResults = $alternativeQueryResults;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1QueryResult[]
   */
  public function getAlternativeQueryResults()
  {
    return $this->alternativeQueryResults;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1OriginalDetectIntentRequest
   */
  public function setOriginalDetectIntentRequest(GoogleCloudDialogflowV2beta1OriginalDetectIntentRequest $originalDetectIntentRequest)
  {
    $this->originalDetectIntentRequest = $originalDetectIntentRequest;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1OriginalDetectIntentRequest
   */
  public function getOriginalDetectIntentRequest()
  {
    return $this->originalDetectIntentRequest;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1QueryResult
   */
  public function setQueryResult(GoogleCloudDialogflowV2beta1QueryResult $queryResult)
  {
    $this->queryResult = $queryResult;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1QueryResult
   */
  public function getQueryResult()
  {
    return $this->queryResult;
  }
  public function setResponseId($responseId)
  {
    $this->responseId = $responseId;
  }
  public function getResponseId()
  {
    return $this->responseId;
  }
  public function setSession($session)
  {
    $this->session = $session;
  }
  public function getSession()
  {
    return $this->session;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1WebhookRequest::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1WebhookRequest');
