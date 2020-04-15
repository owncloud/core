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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2Fulfillment extends Google_Collection
{
  protected $collection_key = 'features';
  public $displayName;
  public $enabled;
  protected $featuresType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2FulfillmentFeature';
  protected $featuresDataType = 'array';
  protected $genericWebServiceType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2FulfillmentGenericWebService';
  protected $genericWebServiceDataType = '';
  public $name;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2FulfillmentFeature
   */
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2FulfillmentFeature
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2FulfillmentGenericWebService
   */
  public function setGenericWebService(Google_Service_Dialogflow_GoogleCloudDialogflowV2FulfillmentGenericWebService $genericWebService)
  {
    $this->genericWebService = $genericWebService;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2FulfillmentGenericWebService
   */
  public function getGenericWebService()
  {
    return $this->genericWebService;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
