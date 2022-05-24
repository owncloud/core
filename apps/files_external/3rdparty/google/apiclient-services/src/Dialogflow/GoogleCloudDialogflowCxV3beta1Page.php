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

class GoogleCloudDialogflowCxV3beta1Page extends \Google\Collection
{
  protected $collection_key = 'transitionRoutes';
  /**
   * @var string
   */
  public $displayName;
  protected $entryFulfillmentType = GoogleCloudDialogflowCxV3beta1Fulfillment::class;
  protected $entryFulfillmentDataType = '';
  protected $eventHandlersType = GoogleCloudDialogflowCxV3beta1EventHandler::class;
  protected $eventHandlersDataType = 'array';
  protected $formType = GoogleCloudDialogflowCxV3beta1Form::class;
  protected $formDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $transitionRouteGroups;
  protected $transitionRoutesType = GoogleCloudDialogflowCxV3beta1TransitionRoute::class;
  protected $transitionRoutesDataType = 'array';

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1Fulfillment
   */
  public function setEntryFulfillment(GoogleCloudDialogflowCxV3beta1Fulfillment $entryFulfillment)
  {
    $this->entryFulfillment = $entryFulfillment;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1Fulfillment
   */
  public function getEntryFulfillment()
  {
    return $this->entryFulfillment;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1EventHandler[]
   */
  public function setEventHandlers($eventHandlers)
  {
    $this->eventHandlers = $eventHandlers;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1EventHandler[]
   */
  public function getEventHandlers()
  {
    return $this->eventHandlers;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1Form
   */
  public function setForm(GoogleCloudDialogflowCxV3beta1Form $form)
  {
    $this->form = $form;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1Form
   */
  public function getForm()
  {
    return $this->form;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setTransitionRouteGroups($transitionRouteGroups)
  {
    $this->transitionRouteGroups = $transitionRouteGroups;
  }
  /**
   * @return string[]
   */
  public function getTransitionRouteGroups()
  {
    return $this->transitionRouteGroups;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1TransitionRoute[]
   */
  public function setTransitionRoutes($transitionRoutes)
  {
    $this->transitionRoutes = $transitionRoutes;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1TransitionRoute[]
   */
  public function getTransitionRoutes()
  {
    return $this->transitionRoutes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1Page::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1Page');
