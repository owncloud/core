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

class GoogleCloudDialogflowCxV3beta1EventHandler extends \Google\Model
{
  public $event;
  public $name;
  public $targetFlow;
  public $targetPage;
  protected $triggerFulfillmentType = GoogleCloudDialogflowCxV3beta1Fulfillment::class;
  protected $triggerFulfillmentDataType = '';

  public function setEvent($event)
  {
    $this->event = $event;
  }
  public function getEvent()
  {
    return $this->event;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setTargetFlow($targetFlow)
  {
    $this->targetFlow = $targetFlow;
  }
  public function getTargetFlow()
  {
    return $this->targetFlow;
  }
  public function setTargetPage($targetPage)
  {
    $this->targetPage = $targetPage;
  }
  public function getTargetPage()
  {
    return $this->targetPage;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1Fulfillment
   */
  public function setTriggerFulfillment(GoogleCloudDialogflowCxV3beta1Fulfillment $triggerFulfillment)
  {
    $this->triggerFulfillment = $triggerFulfillment;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1Fulfillment
   */
  public function getTriggerFulfillment()
  {
    return $this->triggerFulfillment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1EventHandler::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1EventHandler');
