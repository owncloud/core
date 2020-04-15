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

class Google_Service_AndroidManagement_SetupAction extends Google_Model
{
  protected $descriptionType = 'Google_Service_AndroidManagement_UserFacingMessage';
  protected $descriptionDataType = '';
  protected $launchAppType = 'Google_Service_AndroidManagement_LaunchAppAction';
  protected $launchAppDataType = '';
  protected $titleType = 'Google_Service_AndroidManagement_UserFacingMessage';
  protected $titleDataType = '';

  /**
   * @param Google_Service_AndroidManagement_UserFacingMessage
   */
  public function setDescription(Google_Service_AndroidManagement_UserFacingMessage $description)
  {
    $this->description = $description;
  }
  /**
   * @return Google_Service_AndroidManagement_UserFacingMessage
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_AndroidManagement_LaunchAppAction
   */
  public function setLaunchApp(Google_Service_AndroidManagement_LaunchAppAction $launchApp)
  {
    $this->launchApp = $launchApp;
  }
  /**
   * @return Google_Service_AndroidManagement_LaunchAppAction
   */
  public function getLaunchApp()
  {
    return $this->launchApp;
  }
  /**
   * @param Google_Service_AndroidManagement_UserFacingMessage
   */
  public function setTitle(Google_Service_AndroidManagement_UserFacingMessage $title)
  {
    $this->title = $title;
  }
  /**
   * @return Google_Service_AndroidManagement_UserFacingMessage
   */
  public function getTitle()
  {
    return $this->title;
  }
}
