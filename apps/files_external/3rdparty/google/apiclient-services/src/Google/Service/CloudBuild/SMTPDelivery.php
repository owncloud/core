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

class Google_Service_CloudBuild_SMTPDelivery extends Google_Collection
{
  protected $collection_key = 'recipientAddresses';
  public $fromAddress;
  protected $passwordType = 'Google_Service_CloudBuild_NotifierSecretRef';
  protected $passwordDataType = '';
  public $port;
  public $recipientAddresses;
  public $senderAddress;
  public $server;

  public function setFromAddress($fromAddress)
  {
    $this->fromAddress = $fromAddress;
  }
  public function getFromAddress()
  {
    return $this->fromAddress;
  }
  /**
   * @param Google_Service_CloudBuild_NotifierSecretRef
   */
  public function setPassword(Google_Service_CloudBuild_NotifierSecretRef $password)
  {
    $this->password = $password;
  }
  /**
   * @return Google_Service_CloudBuild_NotifierSecretRef
   */
  public function getPassword()
  {
    return $this->password;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setRecipientAddresses($recipientAddresses)
  {
    $this->recipientAddresses = $recipientAddresses;
  }
  public function getRecipientAddresses()
  {
    return $this->recipientAddresses;
  }
  public function setSenderAddress($senderAddress)
  {
    $this->senderAddress = $senderAddress;
  }
  public function getSenderAddress()
  {
    return $this->senderAddress;
  }
  public function setServer($server)
  {
    $this->server = $server;
  }
  public function getServer()
  {
    return $this->server;
  }
}
