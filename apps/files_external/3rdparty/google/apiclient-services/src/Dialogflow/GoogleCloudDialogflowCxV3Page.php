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

class GoogleCloudDialogflowCxV3Page extends \Google\Collection
{
  protected $collection_key = 'transitionRoutes';
  public $displayName;
  protected $entryFulfillmentType = GoogleCloudDialogflowCxV3Fulfillment::class;
  protected $entryFulfillmentDataType = '';
  protected $eventHandlersType = GoogleCloudDialogflowCxV3EventHandler::class;
  protected $eventHandlersDataType = 'array';
  protected $formType = GoogleCloudDialogflowCxV3Form::class;
  protected $formDataType = '';
  public $name;
  public $transitionRouteGroups;
  protected $transitionRoutesType = GoogleCloudDialogflowCxV3TransitionRoute::class;
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
   * @param GoogleCloudDialogflowCxV3Fulfillment
   */
  public function setEntryFulfillment(GoogleCloudDialogflowCxV3Fulfillment $entryFulfillment)
  {
    $this->entryFulfillment = $entryFulfillment;
  }
  /**
   * @return GoogleCloudDialogflowCxV3Fulfillment
   */
  public function getEntryFulfillment()
  {
    return $this->entryFulfillment;
  }
  /**
   * @param GoogleCloudDialogflowCxV3EventHandler[]
   */
  public function setEventHandlers($eventHandlers)
  {
    $this->eventHandlers = $eventHandlers;
  }
  /**
   * @return GoogleCloudDialogflowCxV3EventHandler[]
   */
  public function getEventHandlers()
  {
    return $this->eventHandlers;
  }
  /**
   * @param GoogleCloudDialogflowCxV3Form
   */
  public function setForm(GoogleCloudDialogflowCxV3Form $form)
  {
    $this->form = $form;
  }
  /**
   * @return GoogleCloudDialogflowCxV3Form
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
   * @param GoogleCloudDialogflowCxV3TransitionRoute[]
   */
  public function setTransitionRoutes($transitionRoutes)
  {
    $this->transitionRoutes = $transitionRoutes;
  }
  /**
   * @return GoogleCloudDialogflowCxV3TransitionRoute[]
   */
  public function getTransitionRoutes()
  {
    return $this->transitionRoutes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3Page::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page');
