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

namespace Google\Service\Contentwarehouse;

class AssistantApiCoreTypesCastAppInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $castAppId;
  /**
   * @var string
   */
  public $contentAppId;

  /**
   * @param string
   */
  public function setCastAppId($castAppId)
  {
    $this->castAppId = $castAppId;
  }
  /**
   * @return string
   */
  public function getCastAppId()
  {
    return $this->castAppId;
  }
  /**
   * @param string
   */
  public function setContentAppId($contentAppId)
  {
    $this->contentAppId = $contentAppId;
  }
  /**
   * @return string
   */
  public function getContentAppId()
  {
    return $this->contentAppId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesCastAppInfo::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesCastAppInfo');
