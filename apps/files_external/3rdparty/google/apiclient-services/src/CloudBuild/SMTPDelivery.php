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

namespace Google\Service\CloudBuild;

class SMTPDelivery extends \Google\Collection
{
  protected $collection_key = 'recipientAddresses';
  /**
   * @var string
   */
  public $fromAddress;
  protected $passwordType = NotifierSecretRef::class;
  protected $passwordDataType = '';
  /**
   * @var string
   */
  public $port;
  /**
   * @var string[]
   */
  public $recipientAddresses;
  /**
   * @var string
   */
  public $senderAddress;
  /**
   * @var string
   */
  public $server;

  /**
   * @param string
   */
  public function setFromAddress($fromAddress)
  {
    $this->fromAddress = $fromAddress;
  }
  /**
   * @return string
   */
  public function getFromAddress()
  {
    return $this->fromAddress;
  }
  /**
   * @param NotifierSecretRef
   */
  public function setPassword(NotifierSecretRef $password)
  {
    $this->password = $password;
  }
  /**
   * @return NotifierSecretRef
   */
  public function getPassword()
  {
    return $this->password;
  }
  /**
   * @param string
   */
  public function setPort($port)
  {
    $this->port = $port;
  }
  /**
   * @return string
   */
  public function getPort()
  {
    return $this->port;
  }
  /**
   * @param string[]
   */
  public function setRecipientAddresses($recipientAddresses)
  {
    $this->recipientAddresses = $recipientAddresses;
  }
  /**
   * @return string[]
   */
  public function getRecipientAddresses()
  {
    return $this->recipientAddresses;
  }
  /**
   * @param string
   */
  public function setSenderAddress($senderAddress)
  {
    $this->senderAddress = $senderAddress;
  }
  /**
   * @return string
   */
  public function getSenderAddress()
  {
    return $this->senderAddress;
  }
  /**
   * @param string
   */
  public function setServer($server)
  {
    $this->server = $server;
  }
  /**
   * @return string
   */
  public function getServer()
  {
    return $this->server;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SMTPDelivery::class, 'Google_Service_CloudBuild_SMTPDelivery');
