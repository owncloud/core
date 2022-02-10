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

namespace Google\Service\Gmail;

class SendAs extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $isDefault;
  /**
   * @var bool
   */
  public $isPrimary;
  /**
   * @var string
   */
  public $replyToAddress;
  /**
   * @var string
   */
  public $sendAsEmail;
  /**
   * @var string
   */
  public $signature;
  protected $smtpMsaType = SmtpMsa::class;
  protected $smtpMsaDataType = '';
  /**
   * @var bool
   */
  public $treatAsAlias;
  /**
   * @var string
   */
  public $verificationStatus;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param bool
   */
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  /**
   * @return bool
   */
  public function getIsDefault()
  {
    return $this->isDefault;
  }
  /**
   * @param bool
   */
  public function setIsPrimary($isPrimary)
  {
    $this->isPrimary = $isPrimary;
  }
  /**
   * @return bool
   */
  public function getIsPrimary()
  {
    return $this->isPrimary;
  }
  /**
   * @param string
   */
  public function setReplyToAddress($replyToAddress)
  {
    $this->replyToAddress = $replyToAddress;
  }
  /**
   * @return string
   */
  public function getReplyToAddress()
  {
    return $this->replyToAddress;
  }
  /**
   * @param string
   */
  public function setSendAsEmail($sendAsEmail)
  {
    $this->sendAsEmail = $sendAsEmail;
  }
  /**
   * @return string
   */
  public function getSendAsEmail()
  {
    return $this->sendAsEmail;
  }
  /**
   * @param string
   */
  public function setSignature($signature)
  {
    $this->signature = $signature;
  }
  /**
   * @return string
   */
  public function getSignature()
  {
    return $this->signature;
  }
  /**
   * @param SmtpMsa
   */
  public function setSmtpMsa(SmtpMsa $smtpMsa)
  {
    $this->smtpMsa = $smtpMsa;
  }
  /**
   * @return SmtpMsa
   */
  public function getSmtpMsa()
  {
    return $this->smtpMsa;
  }
  /**
   * @param bool
   */
  public function setTreatAsAlias($treatAsAlias)
  {
    $this->treatAsAlias = $treatAsAlias;
  }
  /**
   * @return bool
   */
  public function getTreatAsAlias()
  {
    return $this->treatAsAlias;
  }
  /**
   * @param string
   */
  public function setVerificationStatus($verificationStatus)
  {
    $this->verificationStatus = $verificationStatus;
  }
  /**
   * @return string
   */
  public function getVerificationStatus()
  {
    return $this->verificationStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SendAs::class, 'Google_Service_Gmail_SendAs');
