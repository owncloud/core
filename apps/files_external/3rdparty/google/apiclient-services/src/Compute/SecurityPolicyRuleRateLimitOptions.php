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

namespace Google\Service\Compute;

class SecurityPolicyRuleRateLimitOptions extends \Google\Model
{
  /**
   * @var int
   */
  public $banDurationSec;
  protected $banThresholdType = SecurityPolicyRuleRateLimitOptionsThreshold::class;
  protected $banThresholdDataType = '';
  /**
   * @var string
   */
  public $conformAction;
  /**
   * @var string
   */
  public $enforceOnKey;
  /**
   * @var string
   */
  public $enforceOnKeyName;
  /**
   * @var string
   */
  public $exceedAction;
  protected $exceedRedirectOptionsType = SecurityPolicyRuleRedirectOptions::class;
  protected $exceedRedirectOptionsDataType = '';
  protected $rateLimitThresholdType = SecurityPolicyRuleRateLimitOptionsThreshold::class;
  protected $rateLimitThresholdDataType = '';

  /**
   * @param int
   */
  public function setBanDurationSec($banDurationSec)
  {
    $this->banDurationSec = $banDurationSec;
  }
  /**
   * @return int
   */
  public function getBanDurationSec()
  {
    return $this->banDurationSec;
  }
  /**
   * @param SecurityPolicyRuleRateLimitOptionsThreshold
   */
  public function setBanThreshold(SecurityPolicyRuleRateLimitOptionsThreshold $banThreshold)
  {
    $this->banThreshold = $banThreshold;
  }
  /**
   * @return SecurityPolicyRuleRateLimitOptionsThreshold
   */
  public function getBanThreshold()
  {
    return $this->banThreshold;
  }
  /**
   * @param string
   */
  public function setConformAction($conformAction)
  {
    $this->conformAction = $conformAction;
  }
  /**
   * @return string
   */
  public function getConformAction()
  {
    return $this->conformAction;
  }
  /**
   * @param string
   */
  public function setEnforceOnKey($enforceOnKey)
  {
    $this->enforceOnKey = $enforceOnKey;
  }
  /**
   * @return string
   */
  public function getEnforceOnKey()
  {
    return $this->enforceOnKey;
  }
  /**
   * @param string
   */
  public function setEnforceOnKeyName($enforceOnKeyName)
  {
    $this->enforceOnKeyName = $enforceOnKeyName;
  }
  /**
   * @return string
   */
  public function getEnforceOnKeyName()
  {
    return $this->enforceOnKeyName;
  }
  /**
   * @param string
   */
  public function setExceedAction($exceedAction)
  {
    $this->exceedAction = $exceedAction;
  }
  /**
   * @return string
   */
  public function getExceedAction()
  {
    return $this->exceedAction;
  }
  /**
   * @param SecurityPolicyRuleRedirectOptions
   */
  public function setExceedRedirectOptions(SecurityPolicyRuleRedirectOptions $exceedRedirectOptions)
  {
    $this->exceedRedirectOptions = $exceedRedirectOptions;
  }
  /**
   * @return SecurityPolicyRuleRedirectOptions
   */
  public function getExceedRedirectOptions()
  {
    return $this->exceedRedirectOptions;
  }
  /**
   * @param SecurityPolicyRuleRateLimitOptionsThreshold
   */
  public function setRateLimitThreshold(SecurityPolicyRuleRateLimitOptionsThreshold $rateLimitThreshold)
  {
    $this->rateLimitThreshold = $rateLimitThreshold;
  }
  /**
   * @return SecurityPolicyRuleRateLimitOptionsThreshold
   */
  public function getRateLimitThreshold()
  {
    return $this->rateLimitThreshold;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecurityPolicyRuleRateLimitOptions::class, 'Google_Service_Compute_SecurityPolicyRuleRateLimitOptions');
