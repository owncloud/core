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

class OtrChatMessageEvent extends \Google\Model
{
  /**
   * @var string
   */
  public $expirationTimestampUsec;
  /**
   * @var string
   */
  public $kansasRowId;
  /**
   * @var string
   */
  public $kansasVersionInfo;
  /**
   * @var string
   */
  public $messageOtrStatus;

  /**
   * @param string
   */
  public function setExpirationTimestampUsec($expirationTimestampUsec)
  {
    $this->expirationTimestampUsec = $expirationTimestampUsec;
  }
  /**
   * @return string
   */
  public function getExpirationTimestampUsec()
  {
    return $this->expirationTimestampUsec;
  }
  /**
   * @param string
   */
  public function setKansasRowId($kansasRowId)
  {
    $this->kansasRowId = $kansasRowId;
  }
  /**
   * @return string
   */
  public function getKansasRowId()
  {
    return $this->kansasRowId;
  }
  /**
   * @param string
   */
  public function setKansasVersionInfo($kansasVersionInfo)
  {
    $this->kansasVersionInfo = $kansasVersionInfo;
  }
  /**
   * @return string
   */
  public function getKansasVersionInfo()
  {
    return $this->kansasVersionInfo;
  }
  /**
   * @param string
   */
  public function setMessageOtrStatus($messageOtrStatus)
  {
    $this->messageOtrStatus = $messageOtrStatus;
  }
  /**
   * @return string
   */
  public function getMessageOtrStatus()
  {
    return $this->messageOtrStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OtrChatMessageEvent::class, 'Google_Service_CloudSearch_OtrChatMessageEvent');
