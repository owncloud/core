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

class DialogAction extends \Google\Model
{
  protected $actionStatusType = ActionStatus::class;
  protected $actionStatusDataType = '';
  protected $dialogType = Dialog::class;
  protected $dialogDataType = '';

  /**
   * @param ActionStatus
   */
  public function setActionStatus(ActionStatus $actionStatus)
  {
    $this->actionStatus = $actionStatus;
  }
  /**
   * @return ActionStatus
   */
  public function getActionStatus()
  {
    return $this->actionStatus;
  }
  /**
   * @param Dialog
   */
  public function setDialog(Dialog $dialog)
  {
    $this->dialog = $dialog;
  }
  /**
   * @return Dialog
   */
  public function getDialog()
  {
    return $this->dialog;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DialogAction::class, 'Google_Service_HangoutsChat_DialogAction');
