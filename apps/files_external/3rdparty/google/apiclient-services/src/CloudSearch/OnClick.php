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

class OnClick extends \Google\Model
{
  protected $actionType = FormAction::class;
  protected $actionDataType = '';
  /**
   * @var string
   */
  public $link;
  protected $openLinkType = OpenLink::class;
  protected $openLinkDataType = '';
  protected $openLinkActionType = FormAction::class;
  protected $openLinkActionDataType = '';

  /**
   * @param FormAction
   */
  public function setAction(FormAction $action)
  {
    $this->action = $action;
  }
  /**
   * @return FormAction
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param string
   */
  public function setLink($link)
  {
    $this->link = $link;
  }
  /**
   * @return string
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param OpenLink
   */
  public function setOpenLink(OpenLink $openLink)
  {
    $this->openLink = $openLink;
  }
  /**
   * @return OpenLink
   */
  public function getOpenLink()
  {
    return $this->openLink;
  }
  /**
   * @param FormAction
   */
  public function setOpenLinkAction(FormAction $openLinkAction)
  {
    $this->openLinkAction = $openLinkAction;
  }
  /**
   * @return FormAction
   */
  public function getOpenLinkAction()
  {
    return $this->openLinkAction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OnClick::class, 'Google_Service_CloudSearch_OnClick');
