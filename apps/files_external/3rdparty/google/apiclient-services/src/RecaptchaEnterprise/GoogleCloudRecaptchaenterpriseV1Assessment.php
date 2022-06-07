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

namespace Google\Service\RecaptchaEnterprise;

class GoogleCloudRecaptchaenterpriseV1Assessment extends \Google\Model
{
  protected $accountDefenderAssessmentType = GoogleCloudRecaptchaenterpriseV1AccountDefenderAssessment::class;
  protected $accountDefenderAssessmentDataType = '';
  protected $eventType = GoogleCloudRecaptchaenterpriseV1Event::class;
  protected $eventDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $privatePasswordLeakVerificationType = GoogleCloudRecaptchaenterpriseV1PrivatePasswordLeakVerification::class;
  protected $privatePasswordLeakVerificationDataType = '';
  protected $riskAnalysisType = GoogleCloudRecaptchaenterpriseV1RiskAnalysis::class;
  protected $riskAnalysisDataType = '';
  protected $tokenPropertiesType = GoogleCloudRecaptchaenterpriseV1TokenProperties::class;
  protected $tokenPropertiesDataType = '';

  /**
   * @param GoogleCloudRecaptchaenterpriseV1AccountDefenderAssessment
   */
  public function setAccountDefenderAssessment(GoogleCloudRecaptchaenterpriseV1AccountDefenderAssessment $accountDefenderAssessment)
  {
    $this->accountDefenderAssessment = $accountDefenderAssessment;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1AccountDefenderAssessment
   */
  public function getAccountDefenderAssessment()
  {
    return $this->accountDefenderAssessment;
  }
  /**
   * @param GoogleCloudRecaptchaenterpriseV1Event
   */
  public function setEvent(GoogleCloudRecaptchaenterpriseV1Event $event)
  {
    $this->event = $event;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1Event
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudRecaptchaenterpriseV1PrivatePasswordLeakVerification
   */
  public function setPrivatePasswordLeakVerification(GoogleCloudRecaptchaenterpriseV1PrivatePasswordLeakVerification $privatePasswordLeakVerification)
  {
    $this->privatePasswordLeakVerification = $privatePasswordLeakVerification;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1PrivatePasswordLeakVerification
   */
  public function getPrivatePasswordLeakVerification()
  {
    return $this->privatePasswordLeakVerification;
  }
  /**
   * @param GoogleCloudRecaptchaenterpriseV1RiskAnalysis
   */
  public function setRiskAnalysis(GoogleCloudRecaptchaenterpriseV1RiskAnalysis $riskAnalysis)
  {
    $this->riskAnalysis = $riskAnalysis;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1RiskAnalysis
   */
  public function getRiskAnalysis()
  {
    return $this->riskAnalysis;
  }
  /**
   * @param GoogleCloudRecaptchaenterpriseV1TokenProperties
   */
  public function setTokenProperties(GoogleCloudRecaptchaenterpriseV1TokenProperties $tokenProperties)
  {
    $this->tokenProperties = $tokenProperties;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1TokenProperties
   */
  public function getTokenProperties()
  {
    return $this->tokenProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecaptchaenterpriseV1Assessment::class, 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Assessment');
