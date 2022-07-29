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

class GoogleAppsCardV1Intent extends \Google\Collection
{
  protected $collection_key = 'extraData';
  protected $extraDataType = GoogleAppsCardV1ExtraData::class;
  protected $extraDataDataType = 'array';
  /**
   * @var string
   */
  public $intentAction;

  /**
   * @param GoogleAppsCardV1ExtraData[]
   */
  public function setExtraData($extraData)
  {
    $this->extraData = $extraData;
  }
  /**
   * @return GoogleAppsCardV1ExtraData[]
   */
  public function getExtraData()
  {
    return $this->extraData;
  }
  /**
   * @param string
   */
  public function setIntentAction($intentAction)
  {
    $this->intentAction = $intentAction;
  }
  /**
   * @return string
   */
  public function getIntentAction()
  {
    return $this->intentAction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCardV1Intent::class, 'Google_Service_HangoutsChat_GoogleAppsCardV1Intent');
