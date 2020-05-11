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

class Google_Service_HangoutsChat_OnClick extends Google_Model
{
  protected $actionType = 'Google_Service_HangoutsChat_FormAction';
  protected $actionDataType = '';
  protected $openLinkType = 'Google_Service_HangoutsChat_OpenLink';
  protected $openLinkDataType = '';

  /**
   * @param Google_Service_HangoutsChat_FormAction
   */
  public function setAction(Google_Service_HangoutsChat_FormAction $action)
  {
    $this->action = $action;
  }
  /**
   * @return Google_Service_HangoutsChat_FormAction
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param Google_Service_HangoutsChat_OpenLink
   */
  public function setOpenLink(Google_Service_HangoutsChat_OpenLink $openLink)
  {
    $this->openLink = $openLink;
  }
  /**
   * @return Google_Service_HangoutsChat_OpenLink
   */
  public function getOpenLink()
  {
    return $this->openLink;
  }
}
