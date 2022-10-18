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

class Presenter extends \Google\Collection
{
  protected $collection_key = 'copresenterDeviceIds';
  /**
   * @var string
   */
  public $byDeviceId;
  /**
   * @var string[]
   */
  public $copresenterDeviceIds;
  /**
   * @var string
   */
  public $presenterDeviceId;

  /**
   * @param string
   */
  public function setByDeviceId($byDeviceId)
  {
    $this->byDeviceId = $byDeviceId;
  }
  /**
   * @return string
   */
  public function getByDeviceId()
  {
    return $this->byDeviceId;
  }
  /**
   * @param string[]
   */
  public function setCopresenterDeviceIds($copresenterDeviceIds)
  {
    $this->copresenterDeviceIds = $copresenterDeviceIds;
  }
  /**
   * @return string[]
   */
  public function getCopresenterDeviceIds()
  {
    return $this->copresenterDeviceIds;
  }
  /**
   * @param string
   */
  public function setPresenterDeviceId($presenterDeviceId)
  {
    $this->presenterDeviceId = $presenterDeviceId;
  }
  /**
   * @return string
   */
  public function getPresenterDeviceId()
  {
    return $this->presenterDeviceId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Presenter::class, 'Google_Service_CloudSearch_Presenter');
