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

class GooglePrivacyDlpV2StoredInfoTypeVersion extends \Google\Collection
{
  protected $collection_key = 'errors';
  protected $configType = GooglePrivacyDlpV2StoredInfoTypeConfig::class;
  protected $configDataType = '';
  /**
   * @var string
   */
  public $createTime;
  protected $errorsType = GooglePrivacyDlpV2Error::class;
  protected $errorsDataType = 'array';
  /**
   * @var string
   */
  public $state;
  protected $statsType = GooglePrivacyDlpV2StoredInfoTypeStats::class;
  protected $statsDataType = '';

  /**
   * @param GooglePrivacyDlpV2StoredInfoTypeConfig
   */
  public function setConfig(GooglePrivacyDlpV2StoredInfoTypeConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return GooglePrivacyDlpV2StoredInfoTypeConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GooglePrivacyDlpV2Error[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return GooglePrivacyDlpV2Error[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param GooglePrivacyDlpV2StoredInfoTypeStats
   */
  public function setStats(GooglePrivacyDlpV2StoredInfoTypeStats $stats)
  {
    $this->stats = $stats;
  }
  /**
   * @return GooglePrivacyDlpV2StoredInfoTypeStats
   */
  public function getStats()
  {
    return $this->stats;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2StoredInfoTypeVersion::class, 'Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeVersion');
