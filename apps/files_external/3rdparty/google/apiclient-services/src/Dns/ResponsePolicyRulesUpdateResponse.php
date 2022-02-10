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

class ResponsePolicyRulesUpdateResponse extends \Google\Model
{
  protected $headerType = ResponseHeader::class;
  protected $headerDataType = '';
  protected $responsePolicyRuleType = ResponsePolicyRule::class;
  protected $responsePolicyRuleDataType = '';

  /**
   * @param ResponseHeader
   */
  public function setHeader(ResponseHeader $header)
  {
    $this->header = $header;
  }
  /**
   * @return ResponseHeader
   */
  public function getHeader()
  {
    return $this->header;
  }
  /**
   * @param ResponsePolicyRule
   */
  public function setResponsePolicyRule(ResponsePolicyRule $responsePolicyRule)
  {
    $this->responsePolicyRule = $responsePolicyRule;
  }
  /**
   * @return ResponsePolicyRule
   */
  public function getResponsePolicyRule()
  {
    return $this->responsePolicyRule;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResponsePolicyRulesUpdateResponse::class, 'Google_Service_Dns_ResponsePolicyRulesUpdateResponse');
