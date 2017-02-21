<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

/**
 * An action for aggregating actions and triggering all of them afterwards.
 */
class WebDriverCompositeAction implements WebDriverAction {

  private $actions = array();

  /**
   * Add an WebDriverAction to the sequence.
   *
   * @param WebDriverAction $action
   * @return WebDriverCompositeAction The current instance.
   */
  public function addAction(WebDriverAction $action) {
    $this->actions[] = $action;
    return $this;
  }

  /**
   * Get the number of actions in the sequence.
   *
   * @return int The number of actions.
   */
  public function getNumberOfActions() {
    return count($this->actions);
  }

  /**
   * Perform the seqeunce of actions.
   */
  public function perform() {
    foreach ($this->actions as $action) {
      $action->perform();
    }
  }
}
