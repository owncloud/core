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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Flow extends Google_Collection
{
  protected $collection_key = 'transitionRoutes';
  public $description;
  public $displayName;
  protected $eventHandlersType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EventHandler';
  protected $eventHandlersDataType = 'array';
  public $name;
  protected $nluSettingsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3NluSettings';
  protected $nluSettingsDataType = '';
  protected $transitionRoutesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRoute';
  protected $transitionRoutesDataType = 'array';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EventHandler[]
   */
  public function setEventHandlers($eventHandlers)
  {
    $this->eventHandlers = $eventHandlers;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EventHandler[]
   */
  public function getEventHandlers()
  {
    return $this->eventHandlers;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3NluSettings
   */
  public function setNluSettings(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3NluSettings $nluSettings)
  {
    $this->nluSettings = $nluSettings;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3NluSettings
   */
  public function getNluSettings()
  {
    return $this->nluSettings;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRoute[]
   */
  public function setTransitionRoutes($transitionRoutes)
  {
    $this->transitionRoutes = $transitionRoutes;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRoute[]
   */
  public function getTransitionRoutes()
  {
    return $this->transitionRoutes;
  }
}
