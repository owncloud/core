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

namespace Google\Service\DisplayVideo;

class CustomBiddingModelReadinessState extends \Google\Model
{
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var string
   */
  public $readinessState;

  /**
   * @param string
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param string
   */
  public function setReadinessState($readinessState)
  {
    $this->readinessState = $readinessState;
  }
  /**
   * @return string
   */
  public function getReadinessState()
  {
    return $this->readinessState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomBiddingModelReadinessState::class, 'Google_Service_DisplayVideo_CustomBiddingModelReadinessState');
