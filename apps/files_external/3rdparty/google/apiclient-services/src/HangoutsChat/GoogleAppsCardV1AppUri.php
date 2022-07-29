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

class GoogleAppsCardV1AppUri extends \Google\Model
{
  protected $androidIntentType = GoogleAppsCardV1Intent::class;
  protected $androidIntentDataType = '';
  /**
   * @var string
   */
  public $companionUri;
  /**
   * @var string
   */
  public $iosUri;

  /**
   * @param GoogleAppsCardV1Intent
   */
  public function setAndroidIntent(GoogleAppsCardV1Intent $androidIntent)
  {
    $this->androidIntent = $androidIntent;
  }
  /**
   * @return GoogleAppsCardV1Intent
   */
  public function getAndroidIntent()
  {
    return $this->androidIntent;
  }
  /**
   * @param string
   */
  public function setCompanionUri($companionUri)
  {
    $this->companionUri = $companionUri;
  }
  /**
   * @return string
   */
  public function getCompanionUri()
  {
    return $this->companionUri;
  }
  /**
   * @param string
   */
  public function setIosUri($iosUri)
  {
    $this->iosUri = $iosUri;
  }
  /**
   * @return string
   */
  public function getIosUri()
  {
    return $this->iosUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCardV1AppUri::class, 'Google_Service_HangoutsChat_GoogleAppsCardV1AppUri');
