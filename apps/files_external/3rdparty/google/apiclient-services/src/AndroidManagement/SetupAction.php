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

namespace Google\Service\AndroidManagement;

class SetupAction extends \Google\Model
{
  protected $descriptionType = UserFacingMessage::class;
  protected $descriptionDataType = '';
  protected $launchAppType = LaunchAppAction::class;
  protected $launchAppDataType = '';
  protected $titleType = UserFacingMessage::class;
  protected $titleDataType = '';

  /**
   * @param UserFacingMessage
   */
  public function setDescription(UserFacingMessage $description)
  {
    $this->description = $description;
  }
  /**
   * @return UserFacingMessage
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param LaunchAppAction
   */
  public function setLaunchApp(LaunchAppAction $launchApp)
  {
    $this->launchApp = $launchApp;
  }
  /**
   * @return LaunchAppAction
   */
  public function getLaunchApp()
  {
    return $this->launchApp;
  }
  /**
   * @param UserFacingMessage
   */
  public function setTitle(UserFacingMessage $title)
  {
    $this->title = $title;
  }
  /**
   * @return UserFacingMessage
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SetupAction::class, 'Google_Service_AndroidManagement_SetupAction');
