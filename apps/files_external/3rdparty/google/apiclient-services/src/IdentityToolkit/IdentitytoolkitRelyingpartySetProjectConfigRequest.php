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

namespace Google\Service\IdentityToolkit;

class IdentitytoolkitRelyingpartySetProjectConfigRequest extends \Google\Collection
{
  protected $collection_key = 'idpConfig';
  public $allowPasswordUser;
  public $apiKey;
  public $authorizedDomains;
  protected $changeEmailTemplateType = EmailTemplate::class;
  protected $changeEmailTemplateDataType = '';
  public $delegatedProjectNumber;
  public $enableAnonymousUser;
  protected $idpConfigType = IdpConfig::class;
  protected $idpConfigDataType = 'array';
  protected $legacyResetPasswordTemplateType = EmailTemplate::class;
  protected $legacyResetPasswordTemplateDataType = '';
  protected $resetPasswordTemplateType = EmailTemplate::class;
  protected $resetPasswordTemplateDataType = '';
  public $useEmailSending;
  protected $verifyEmailTemplateType = EmailTemplate::class;
  protected $verifyEmailTemplateDataType = '';

  public function setAllowPasswordUser($allowPasswordUser)
  {
    $this->allowPasswordUser = $allowPasswordUser;
  }
  public function getAllowPasswordUser()
  {
    return $this->allowPasswordUser;
  }
  public function setApiKey($apiKey)
  {
    $this->apiKey = $apiKey;
  }
  public function getApiKey()
  {
    return $this->apiKey;
  }
  public function setAuthorizedDomains($authorizedDomains)
  {
    $this->authorizedDomains = $authorizedDomains;
  }
  public function getAuthorizedDomains()
  {
    return $this->authorizedDomains;
  }
  /**
   * @param EmailTemplate
   */
  public function setChangeEmailTemplate(EmailTemplate $changeEmailTemplate)
  {
    $this->changeEmailTemplate = $changeEmailTemplate;
  }
  /**
   * @return EmailTemplate
   */
  public function getChangeEmailTemplate()
  {
    return $this->changeEmailTemplate;
  }
  public function setDelegatedProjectNumber($delegatedProjectNumber)
  {
    $this->delegatedProjectNumber = $delegatedProjectNumber;
  }
  public function getDelegatedProjectNumber()
  {
    return $this->delegatedProjectNumber;
  }
  public function setEnableAnonymousUser($enableAnonymousUser)
  {
    $this->enableAnonymousUser = $enableAnonymousUser;
  }
  public function getEnableAnonymousUser()
  {
    return $this->enableAnonymousUser;
  }
  /**
   * @param IdpConfig[]
   */
  public function setIdpConfig($idpConfig)
  {
    $this->idpConfig = $idpConfig;
  }
  /**
   * @return IdpConfig[]
   */
  public function getIdpConfig()
  {
    return $this->idpConfig;
  }
  /**
   * @param EmailTemplate
   */
  public function setLegacyResetPasswordTemplate(EmailTemplate $legacyResetPasswordTemplate)
  {
    $this->legacyResetPasswordTemplate = $legacyResetPasswordTemplate;
  }
  /**
   * @return EmailTemplate
   */
  public function getLegacyResetPasswordTemplate()
  {
    return $this->legacyResetPasswordTemplate;
  }
  /**
   * @param EmailTemplate
   */
  public function setResetPasswordTemplate(EmailTemplate $resetPasswordTemplate)
  {
    $this->resetPasswordTemplate = $resetPasswordTemplate;
  }
  /**
   * @return EmailTemplate
   */
  public function getResetPasswordTemplate()
  {
    return $this->resetPasswordTemplate;
  }
  public function setUseEmailSending($useEmailSending)
  {
    $this->useEmailSending = $useEmailSending;
  }
  public function getUseEmailSending()
  {
    return $this->useEmailSending;
  }
  /**
   * @param EmailTemplate
   */
  public function setVerifyEmailTemplate(EmailTemplate $verifyEmailTemplate)
  {
    $this->verifyEmailTemplate = $verifyEmailTemplate;
  }
  /**
   * @return EmailTemplate
   */
  public function getVerifyEmailTemplate()
  {
    return $this->verifyEmailTemplate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdentitytoolkitRelyingpartySetProjectConfigRequest::class, 'Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySetProjectConfigRequest');
