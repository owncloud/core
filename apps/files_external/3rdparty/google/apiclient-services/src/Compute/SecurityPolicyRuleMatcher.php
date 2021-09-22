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

class SecurityPolicyRuleMatcher extends \Google\Model
{
  protected $configType = SecurityPolicyRuleMatcherConfig::class;
  protected $configDataType = '';
  protected $exprType = Expr::class;
  protected $exprDataType = '';
  public $versionedExpr;

  /**
   * @param SecurityPolicyRuleMatcherConfig
   */
  public function setConfig(SecurityPolicyRuleMatcherConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return SecurityPolicyRuleMatcherConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  /**
   * @param Expr
   */
  public function setExpr(Expr $expr)
  {
    $this->expr = $expr;
  }
  /**
   * @return Expr
   */
  public function getExpr()
  {
    return $this->expr;
  }
  public function setVersionedExpr($versionedExpr)
  {
    $this->versionedExpr = $versionedExpr;
  }
  public function getVersionedExpr()
  {
    return $this->versionedExpr;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecurityPolicyRuleMatcher::class, 'Google_Service_Compute_SecurityPolicyRuleMatcher');
