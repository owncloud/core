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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1Page extends Google_Collection
{
  protected $collection_key = 'transitionRoutes';
  public $displayName;
  protected $entryFulfillmentType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1Fulfillment';
  protected $entryFulfillmentDataType = '';
  protected $eventHandlersType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1EventHandler';
  protected $eventHandlersDataType = 'array';
  protected $formType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1Form';
  protected $formDataType = '';
  public $name;
  public $transitionRouteGroups;
  protected $transitionRoutesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TransitionRoute';
  protected $transitionRoutesDataType = 'array';

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1Fulfillment
   */
  public function setEntryFulfillment(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1Fulfillment $entryFulfillment)
  {
    $this->entryFulfillment = $entryFulfillment;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1Fulfillment
   */
  public function getEntryFulfillment()
  {
    return $this->entryFulfillment;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1EventHandler[]
   */
  public function setEventHandlers($eventHandlers)
  {
    $this->eventHandlers = $eventHandlers;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1EventHandler[]
   */
  public function getEventHandlers()
  {
    return $this->eventHandlers;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1Form
   */
  public function setForm(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1Form $form)
  {
    $this->form = $form;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1Form
   */
  public function getForm()
  {
    return $this->form;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setTransitionRouteGroups($transitionRouteGroups)
  {
    $this->transitionRouteGroups = $transitionRouteGroups;
  }
  public function getTransitionRouteGroups()
  {
    return $this->transitionRouteGroups;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TransitionRoute[]
   */
  public function setTransitionRoutes($transitionRoutes)
  {
    $this->transitionRoutes = $transitionRoutes;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TransitionRoute[]
   */
  public function getTransitionRoutes()
  {
    return $this->transitionRoutes;
  }
}
