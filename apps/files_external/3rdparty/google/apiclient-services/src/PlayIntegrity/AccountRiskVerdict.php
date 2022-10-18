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

namespace Google\Service\PlayIntegrity;

class AccountRiskVerdict extends \Google\Model
{
  /**
   * @var string
   */
  public $risk;
  /**
   * @var string
   */
  public $riskLevel;

  /**
   * @param string
   */
  public function setRisk($risk)
  {
    $this->risk = $risk;
  }
  /**
   * @return string
   */
  public function getRisk()
  {
    return $this->risk;
  }
  /**
   * @param string
   */
  public function setRiskLevel($riskLevel)
  {
    $this->riskLevel = $riskLevel;
  }
  /**
   * @return string
   */
  public function getRiskLevel()
  {
    return $this->riskLevel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountRiskVerdict::class, 'Google_Service_PlayIntegrity_AccountRiskVerdict');
