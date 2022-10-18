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

namespace Google\Service\CloudSearch;

class GoogleChatV1WidgetMarkupOnClick extends \Google\Model
{
  protected $actionType = GoogleChatV1WidgetMarkupFormAction::class;
  protected $actionDataType = '';
  protected $openLinkType = GoogleChatV1WidgetMarkupOpenLink::class;
  protected $openLinkDataType = '';

  /**
   * @param GoogleChatV1WidgetMarkupFormAction
   */
  public function setAction(GoogleChatV1WidgetMarkupFormAction $action)
  {
    $this->action = $action;
  }
  /**
   * @return GoogleChatV1WidgetMarkupFormAction
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param GoogleChatV1WidgetMarkupOpenLink
   */
  public function setOpenLink(GoogleChatV1WidgetMarkupOpenLink $openLink)
  {
    $this->openLink = $openLink;
  }
  /**
   * @return GoogleChatV1WidgetMarkupOpenLink
   */
  public function getOpenLink()
  {
    return $this->openLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChatV1WidgetMarkupOnClick::class, 'Google_Service_CloudSearch_GoogleChatV1WidgetMarkupOnClick');
