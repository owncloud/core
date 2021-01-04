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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1WebhookRequest extends Google_Collection
{
  protected $collection_key = 'alternativeQueryResults';
  protected $alternativeQueryResultsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1QueryResult';
  protected $alternativeQueryResultsDataType = 'array';
  protected $originalDetectIntentRequestType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1OriginalDetectIntentRequest';
  protected $originalDetectIntentRequestDataType = '';
  protected $queryResultType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1QueryResult';
  protected $queryResultDataType = '';
  public $responseId;
  public $session;

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1QueryResult[]
   */
  public function setAlternativeQueryResults($alternativeQueryResults)
  {
    $this->alternativeQueryResults = $alternativeQueryResults;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1QueryResult[]
   */
  public function getAlternativeQueryResults()
  {
    return $this->alternativeQueryResults;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1OriginalDetectIntentRequest
   */
  public function setOriginalDetectIntentRequest(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1OriginalDetectIntentRequest $originalDetectIntentRequest)
  {
    $this->originalDetectIntentRequest = $originalDetectIntentRequest;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1OriginalDetectIntentRequest
   */
  public function getOriginalDetectIntentRequest()
  {
    return $this->originalDetectIntentRequest;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1QueryResult
   */
  public function setQueryResult(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1QueryResult $queryResult)
  {
    $this->queryResult = $queryResult;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1QueryResult
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
