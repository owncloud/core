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

namespace Google\Service\Dns;

class ResponsePolicyRule extends \Google\Model
{
  /**
   * @var string
   */
  public $behavior;
  /**
   * @var string
   */
  public $dnsName;
  /**
   * @var string
   */
  public $kind;
  protected $localDataType = ResponsePolicyRuleLocalData::class;
  protected $localDataDataType = '';
  /**
   * @var string
   */
  public $ruleName;

  /**
   * @param string
   */
  public function setBehavior($behavior)
  {
    $this->behavior = $behavior;
  }
  /**
   * @return string
   */
  public function getBehavior()
  {
    return $this->behavior;
  }
  /**
   * @param string
   */
  public function setDnsName($dnsName)
  {
    $this->dnsName = $dnsName;
  }
  /**
   * @return string
   */
  public function getDnsName()
  {
    return $this->dnsName;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param ResponsePolicyRuleLocalData
   */
  public function setLocalData(ResponsePolicyRuleLocalData $localData)
  {
    $this->localData = $localData;
  }
  /**
   * @return ResponsePolicyRuleLocalData
   */
  public function getLocalData()
  {
    return $this->localData;
  }
  /**
   * @param string
   */
  public function setRuleName($ruleName)
  {
    $this->ruleName = $ruleName;
  }
  /**
   * @return string
   */
  public function getRuleName()
  {
    return $this->ruleName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResponsePolicyRule::class, 'Google_Service_Dns_ResponsePolicyRule');
