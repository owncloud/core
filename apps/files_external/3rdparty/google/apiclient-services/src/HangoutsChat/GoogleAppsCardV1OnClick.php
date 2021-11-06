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

namespace Google\Service\HangoutsChat;

class GoogleAppsCardV1OnClick extends \Google\Model
{
  protected $actionType = GoogleAppsCardV1Action::class;
  protected $actionDataType = '';
  protected $cardType = GoogleAppsCardV1Card::class;
  protected $cardDataType = '';
  protected $openDynamicLinkActionType = GoogleAppsCardV1Action::class;
  protected $openDynamicLinkActionDataType = '';
  protected $openLinkType = GoogleAppsCardV1OpenLink::class;
  protected $openLinkDataType = '';

  /**
   * @param GoogleAppsCardV1Action
   */
  public function setAction(GoogleAppsCardV1Action $action)
  {
    $this->action = $action;
  }
  /**
   * @return GoogleAppsCardV1Action
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param GoogleAppsCardV1Card
   */
  public function setCard(GoogleAppsCardV1Card $card)
  {
    $this->card = $card;
  }
  /**
   * @return GoogleAppsCardV1Card
   */
  public function getCard()
  {
    return $this->card;
  }
  /**
   * @param GoogleAppsCardV1Action
   */
  public function setOpenDynamicLinkAction(GoogleAppsCardV1Action $openDynamicLinkAction)
  {
    $this->openDynamicLinkAction = $openDynamicLinkAction;
  }
  /**
   * @return GoogleAppsCardV1Action
   */
  public function getOpenDynamicLinkAction()
  {
    return $this->openDynamicLinkAction;
  }
  /**
   * @param GoogleAppsCardV1OpenLink
   */
  public function setOpenLink(GoogleAppsCardV1OpenLink $openLink)
  {
    $this->openLink = $openLink;
  }
  /**
   * @return GoogleAppsCardV1OpenLink
   */
  public function getOpenLink()
  {
    return $this->openLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCardV1OnClick::class, 'Google_Service_HangoutsChat_GoogleAppsCardV1OnClick');
