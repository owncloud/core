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

class Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplates extends Google_Model
{
  protected $accountNotifyType = 'Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate';
  protected $accountNotifyDataType = '';
  protected $accountVerifyType = 'Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate';
  protected $accountVerifyDataType = '';
  protected $activateType = 'Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate';
  protected $activateDataType = '';
  protected $resetPasswordType = 'Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate';
  protected $resetPasswordDataType = '';

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate
   */
  public function setAccountNotify(Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate $accountNotify)
  {
    $this->accountNotify = $accountNotify;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate
   */
  public function getAccountNotify()
  {
    return $this->accountNotify;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate
   */
  public function setAccountVerify(Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate $accountVerify)
  {
    $this->accountVerify = $accountVerify;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate
   */
  public function getAccountVerify()
  {
    return $this->accountVerify;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate
   */
  public function setActivate(Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate $activate)
  {
    $this->activate = $activate;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate
   */
  public function getActivate()
  {
    return $this->activate;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate
   */
  public function setResetPassword(Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate $resetPassword)
  {
    $this->resetPassword = $resetPassword;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ZoneCustomEmailTemplatesCustomEmailTemplate
   */
  public function getResetPassword()
  {
    return $this->resetPassword;
  }
}
