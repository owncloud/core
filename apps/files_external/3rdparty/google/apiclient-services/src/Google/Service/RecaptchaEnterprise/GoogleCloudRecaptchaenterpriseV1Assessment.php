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

class Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Assessment extends Google_Model
{
  protected $eventType = 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Event';
  protected $eventDataType = '';
  public $name;
  protected $riskAnalysisType = 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1RiskAnalysis';
  protected $riskAnalysisDataType = '';
  protected $tokenPropertiesType = 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1TokenProperties';
  protected $tokenPropertiesDataType = '';

  /**
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Event
   */
  public function setEvent(Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Event $event)
  {
    $this->event = $event;
  }
  /**
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Event
   */
  public function getEvent()
  {
    return $this->event;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1RiskAnalysis
   */
  public function setRiskAnalysis(Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1RiskAnalysis $riskAnalysis)
  {
    $this->riskAnalysis = $riskAnalysis;
  }
  /**
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1RiskAnalysis
   */
  public function getRiskAnalysis()
  {
    return $this->riskAnalysis;
  }
  /**
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1TokenProperties
   */
  public function setTokenProperties(Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1TokenProperties $tokenProperties)
  {
    $this->tokenProperties = $tokenProperties;
  }
  /**
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1TokenProperties
   */
  public function getTokenProperties()
  {
    return $this->tokenProperties;
  }
}
