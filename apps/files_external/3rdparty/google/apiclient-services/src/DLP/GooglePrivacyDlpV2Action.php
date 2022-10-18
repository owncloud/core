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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2Action extends \Google\Model
{
  protected $deidentifyType = GooglePrivacyDlpV2Deidentify::class;
  protected $deidentifyDataType = '';
  protected $jobNotificationEmailsType = GooglePrivacyDlpV2JobNotificationEmails::class;
  protected $jobNotificationEmailsDataType = '';
  protected $pubSubType = GooglePrivacyDlpV2PublishToPubSub::class;
  protected $pubSubDataType = '';
  protected $publishFindingsToCloudDataCatalogType = GooglePrivacyDlpV2PublishFindingsToCloudDataCatalog::class;
  protected $publishFindingsToCloudDataCatalogDataType = '';
  protected $publishSummaryToCsccType = GooglePrivacyDlpV2PublishSummaryToCscc::class;
  protected $publishSummaryToCsccDataType = '';
  protected $publishToStackdriverType = GooglePrivacyDlpV2PublishToStackdriver::class;
  protected $publishToStackdriverDataType = '';
  protected $saveFindingsType = GooglePrivacyDlpV2SaveFindings::class;
  protected $saveFindingsDataType = '';

  /**
   * @param GooglePrivacyDlpV2Deidentify
   */
  public function setDeidentify(GooglePrivacyDlpV2Deidentify $deidentify)
  {
    $this->deidentify = $deidentify;
  }
  /**
   * @return GooglePrivacyDlpV2Deidentify
   */
  public function getDeidentify()
  {
    return $this->deidentify;
  }
  /**
   * @param GooglePrivacyDlpV2JobNotificationEmails
   */
  public function setJobNotificationEmails(GooglePrivacyDlpV2JobNotificationEmails $jobNotificationEmails)
  {
    $this->jobNotificationEmails = $jobNotificationEmails;
  }
  /**
   * @return GooglePrivacyDlpV2JobNotificationEmails
   */
  public function getJobNotificationEmails()
  {
    return $this->jobNotificationEmails;
  }
  /**
   * @param GooglePrivacyDlpV2PublishToPubSub
   */
  public function setPubSub(GooglePrivacyDlpV2PublishToPubSub $pubSub)
  {
    $this->pubSub = $pubSub;
  }
  /**
   * @return GooglePrivacyDlpV2PublishToPubSub
   */
  public function getPubSub()
  {
    return $this->pubSub;
  }
  /**
   * @param GooglePrivacyDlpV2PublishFindingsToCloudDataCatalog
   */
  public function setPublishFindingsToCloudDataCatalog(GooglePrivacyDlpV2PublishFindingsToCloudDataCatalog $publishFindingsToCloudDataCatalog)
  {
    $this->publishFindingsToCloudDataCatalog = $publishFindingsToCloudDataCatalog;
  }
  /**
   * @return GooglePrivacyDlpV2PublishFindingsToCloudDataCatalog
   */
  public function getPublishFindingsToCloudDataCatalog()
  {
    return $this->publishFindingsToCloudDataCatalog;
  }
  /**
   * @param GooglePrivacyDlpV2PublishSummaryToCscc
   */
  public function setPublishSummaryToCscc(GooglePrivacyDlpV2PublishSummaryToCscc $publishSummaryToCscc)
  {
    $this->publishSummaryToCscc = $publishSummaryToCscc;
  }
  /**
   * @return GooglePrivacyDlpV2PublishSummaryToCscc
   */
  public function getPublishSummaryToCscc()
  {
    return $this->publishSummaryToCscc;
  }
  /**
   * @param GooglePrivacyDlpV2PublishToStackdriver
   */
  public function setPublishToStackdriver(GooglePrivacyDlpV2PublishToStackdriver $publishToStackdriver)
  {
    $this->publishToStackdriver = $publishToStackdriver;
  }
  /**
   * @return GooglePrivacyDlpV2PublishToStackdriver
   */
  public function getPublishToStackdriver()
  {
    return $this->publishToStackdriver;
  }
  /**
   * @param GooglePrivacyDlpV2SaveFindings
   */
  public function setSaveFindings(GooglePrivacyDlpV2SaveFindings $saveFindings)
  {
    $this->saveFindings = $saveFindings;
  }
  /**
   * @return GooglePrivacyDlpV2SaveFindings
   */
  public function getSaveFindings()
  {
    return $this->saveFindings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2Action::class, 'Google_Service_DLP_GooglePrivacyDlpV2Action');
