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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2QueryParameters extends Google_Collection
{
  protected $collection_key = 'sessionEntityTypes';
  protected $contextsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2Context';
  protected $contextsDataType = 'array';
  protected $geoLocationType = 'Google_Service_Dialogflow_GoogleTypeLatLng';
  protected $geoLocationDataType = '';
  public $payload;
  public $resetContexts;
  protected $sentimentAnalysisRequestConfigType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2SentimentAnalysisRequestConfig';
  protected $sentimentAnalysisRequestConfigDataType = '';
  protected $sessionEntityTypesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2SessionEntityType';
  protected $sessionEntityTypesDataType = 'array';
  public $timeZone;

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2Context
   */
  public function setContexts($contexts)
  {
    $this->contexts = $contexts;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2Context
   */
  public function getContexts()
  {
    return $this->contexts;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleTypeLatLng
   */
  public function setGeoLocation(Google_Service_Dialogflow_GoogleTypeLatLng $geoLocation)
  {
    $this->geoLocation = $geoLocation;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleTypeLatLng
   */
  public function getGeoLocation()
  {
    return $this->geoLocation;
  }
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
  }
  public function setResetContexts($resetContexts)
  {
    $this->resetContexts = $resetContexts;
  }
  public function getResetContexts()
  {
    return $this->resetContexts;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2SentimentAnalysisRequestConfig
   */
  public function setSentimentAnalysisRequestConfig(Google_Service_Dialogflow_GoogleCloudDialogflowV2SentimentAnalysisRequestConfig $sentimentAnalysisRequestConfig)
  {
    $this->sentimentAnalysisRequestConfig = $sentimentAnalysisRequestConfig;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2SentimentAnalysisRequestConfig
   */
  public function getSentimentAnalysisRequestConfig()
  {
    return $this->sentimentAnalysisRequestConfig;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2SessionEntityType
   */
  public function setSessionEntityTypes($sessionEntityTypes)
  {
    $this->sessionEntityTypes = $sessionEntityTypes;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2SessionEntityType
   */
  public function getSessionEntityTypes()
  {
    return $this->sessionEntityTypes;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}
