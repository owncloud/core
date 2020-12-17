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

class Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeVersion extends Google_Collection
{
  protected $collection_key = 'errors';
  protected $configType = 'Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeConfig';
  protected $configDataType = '';
  public $createTime;
  protected $errorsType = 'Google_Service_DLP_GooglePrivacyDlpV2Error';
  protected $errorsDataType = 'array';
  public $state;
  protected $statsType = 'Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeStats';
  protected $statsDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeConfig
   */
  public function setConfig(Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Error[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Error[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeStats
   */
  public function setStats(Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeStats $stats)
  {
    $this->stats = $stats;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeStats
   */
  public function getStats()
  {
    return $this->stats;
  }
}
