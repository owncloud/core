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

class AppsDynamiteBotResponse extends \Google\Model
{
  protected $botIdType = AppsDynamiteUserId::class;
  protected $botIdDataType = '';
  /**
   * @var string
   */
  public $requiredAction;
  /**
   * @var string
   */
  public $responseType;
  /**
   * @var string
   */
  public $setupUrl;

  /**
   * @param AppsDynamiteUserId
   */
  public function setBotId(AppsDynamiteUserId $botId)
  {
    $this->botId = $botId;
  }
  /**
   * @return AppsDynamiteUserId
   */
  public function getBotId()
  {
    return $this->botId;
  }
  /**
   * @param string
   */
  public function setRequiredAction($requiredAction)
  {
    $this->requiredAction = $requiredAction;
  }
  /**
   * @return string
   */
  public function getRequiredAction()
  {
    return $this->requiredAction;
  }
  /**
   * @param string
   */
  public function setResponseType($responseType)
  {
    $this->responseType = $responseType;
  }
  /**
   * @return string
   */
  public function getResponseType()
  {
    return $this->responseType;
  }
  /**
   * @param string
   */
  public function setSetupUrl($setupUrl)
  {
    $this->setupUrl = $setupUrl;
  }
  /**
   * @return string
   */
  public function getSetupUrl()
  {
    return $this->setupUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteBotResponse::class, 'Google_Service_CloudSearch_AppsDynamiteBotResponse');
