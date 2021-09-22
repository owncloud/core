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

class GoogleCloudDialogflowCxV3QueryParameters extends \Google\Collection
{
  protected $collection_key = 'sessionEntityTypes';
  public $analyzeQueryTextSentiment;
  public $currentPage;
  public $disableWebhook;
  public $flowVersions;
  protected $geoLocationType = GoogleTypeLatLng::class;
  protected $geoLocationDataType = '';
  public $parameters;
  public $payload;
  protected $sessionEntityTypesType = GoogleCloudDialogflowCxV3SessionEntityType::class;
  protected $sessionEntityTypesDataType = 'array';
  public $timeZone;
  public $webhookHeaders;

  public function setAnalyzeQueryTextSentiment($analyzeQueryTextSentiment)
  {
    $this->analyzeQueryTextSentiment = $analyzeQueryTextSentiment;
  }
  public function getAnalyzeQueryTextSentiment()
  {
    return $this->analyzeQueryTextSentiment;
  }
  public function setCurrentPage($currentPage)
  {
    $this->currentPage = $currentPage;
  }
  public function getCurrentPage()
  {
    return $this->currentPage;
  }
  public function setDisableWebhook($disableWebhook)
  {
    $this->disableWebhook = $disableWebhook;
  }
  public function getDisableWebhook()
  {
    return $this->disableWebhook;
  }
  public function setFlowVersions($flowVersions)
  {
    $this->flowVersions = $flowVersions;
  }
  public function getFlowVersions()
  {
    return $this->flowVersions;
  }
  /**
   * @param GoogleTypeLatLng
   */
  public function setGeoLocation(GoogleTypeLatLng $geoLocation)
  {
    $this->geoLocation = $geoLocation;
  }
  /**
   * @return GoogleTypeLatLng
   */
  public function getGeoLocation()
  {
    return $this->geoLocation;
  }
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
  }
  /**
   * @param GoogleCloudDialogflowCxV3SessionEntityType[]
   */
  public function setSessionEntityTypes($sessionEntityTypes)
  {
    $this->sessionEntityTypes = $sessionEntityTypes;
  }
  /**
   * @return GoogleCloudDialogflowCxV3SessionEntityType[]
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
  public function setWebhookHeaders($webhookHeaders)
  {
    $this->webhookHeaders = $webhookHeaders;
  }
  public function getWebhookHeaders()
  {
    return $this->webhookHeaders;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3QueryParameters::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryParameters');
