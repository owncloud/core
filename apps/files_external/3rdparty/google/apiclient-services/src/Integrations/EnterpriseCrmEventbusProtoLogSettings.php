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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoLogSettings extends \Google\Model
{
  /**
   * @var string
   */
  public $logFieldName;
  protected $sanitizeOptionsType = EnterpriseCrmLoggingGwsSanitizeOptions::class;
  protected $sanitizeOptionsDataType = '';
  /**
   * @var string
   */
  public $seedPeriod;
  /**
   * @var string
   */
  public $seedScope;
  protected $shorteningLimitsType = EnterpriseCrmLoggingGwsFieldLimits::class;
  protected $shorteningLimitsDataType = '';

  /**
   * @param string
   */
  public function setLogFieldName($logFieldName)
  {
    $this->logFieldName = $logFieldName;
  }
  /**
   * @return string
   */
  public function getLogFieldName()
  {
    return $this->logFieldName;
  }
  /**
   * @param EnterpriseCrmLoggingGwsSanitizeOptions
   */
  public function setSanitizeOptions(EnterpriseCrmLoggingGwsSanitizeOptions $sanitizeOptions)
  {
    $this->sanitizeOptions = $sanitizeOptions;
  }
  /**
   * @return EnterpriseCrmLoggingGwsSanitizeOptions
   */
  public function getSanitizeOptions()
  {
    return $this->sanitizeOptions;
  }
  /**
   * @param string
   */
  public function setSeedPeriod($seedPeriod)
  {
    $this->seedPeriod = $seedPeriod;
  }
  /**
   * @return string
   */
  public function getSeedPeriod()
  {
    return $this->seedPeriod;
  }
  /**
   * @param string
   */
  public function setSeedScope($seedScope)
  {
    $this->seedScope = $seedScope;
  }
  /**
   * @return string
   */
  public function getSeedScope()
  {
    return $this->seedScope;
  }
  /**
   * @param EnterpriseCrmLoggingGwsFieldLimits
   */
  public function setShorteningLimits(EnterpriseCrmLoggingGwsFieldLimits $shorteningLimits)
  {
    $this->shorteningLimits = $shorteningLimits;
  }
  /**
   * @return EnterpriseCrmLoggingGwsFieldLimits
   */
  public function getShorteningLimits()
  {
    return $this->shorteningLimits;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoLogSettings::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoLogSettings');
