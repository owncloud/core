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

class AppsDynamiteSharedOnClick extends \Google\Model
{
  protected $actionType = AppsDynamiteSharedAction::class;
  protected $actionDataType = '';
  protected $openDynamicLinkActionType = AppsDynamiteSharedAction::class;
  protected $openDynamicLinkActionDataType = '';
  protected $openLinkType = AppsDynamiteSharedOpenLink::class;
  protected $openLinkDataType = '';

  /**
   * @param AppsDynamiteSharedAction
   */
  public function setAction(AppsDynamiteSharedAction $action)
  {
    $this->action = $action;
  }
  /**
   * @return AppsDynamiteSharedAction
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param AppsDynamiteSharedAction
   */
  public function setOpenDynamicLinkAction(AppsDynamiteSharedAction $openDynamicLinkAction)
  {
    $this->openDynamicLinkAction = $openDynamicLinkAction;
  }
  /**
   * @return AppsDynamiteSharedAction
   */
  public function getOpenDynamicLinkAction()
  {
    return $this->openDynamicLinkAction;
  }
  /**
   * @param AppsDynamiteSharedOpenLink
   */
  public function setOpenLink(AppsDynamiteSharedOpenLink $openLink)
  {
    $this->openLink = $openLink;
  }
  /**
   * @return AppsDynamiteSharedOpenLink
   */
  public function getOpenLink()
  {
    return $this->openLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedOnClick::class, 'Google_Service_CloudSearch_AppsDynamiteSharedOnClick');
