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

namespace Google\Service\Integrations;

class EnterpriseCrmLoggingGwsSanitizeOptions extends \Google\Collection
{
  protected $collection_key = 'logType';
  /**
   * @var bool
   */
  public $isAlreadySanitized;
  /**
   * @var string[]
   */
  public $logType;
  /**
   * @var string
   */
  public $privacy;
  /**
   * @var string
   */
  public $sanitizeType;

  /**
   * @param bool
   */
  public function setIsAlreadySanitized($isAlreadySanitized)
  {
    $this->isAlreadySanitized = $isAlreadySanitized;
  }
  /**
   * @return bool
   */
  public function getIsAlreadySanitized()
  {
    return $this->isAlreadySanitized;
  }
  /**
   * @param string[]
   */
  public function setLogType($logType)
  {
    $this->logType = $logType;
  }
  /**
   * @return string[]
   */
  public function getLogType()
  {
    return $this->logType;
  }
  /**
   * @param string
   */
  public function setPrivacy($privacy)
  {
    $this->privacy = $privacy;
  }
  /**
   * @return string
   */
  public function getPrivacy()
  {
    return $this->privacy;
  }
  /**
   * @param string
   */
  public function setSanitizeType($sanitizeType)
  {
    $this->sanitizeType = $sanitizeType;
  }
  /**
   * @return string
   */
  public function getSanitizeType()
  {
    return $this->sanitizeType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmLoggingGwsSanitizeOptions::class, 'Google_Service_Integrations_EnterpriseCrmLoggingGwsSanitizeOptions');
