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

class FirewallPolicyRuleMatcher extends \Google\Collection
{
  protected $collection_key = 'srcSecureTags';
  /**
   * @var string[]
   */
  public $destIpRanges;
  protected $layer4ConfigsType = FirewallPolicyRuleMatcherLayer4Config::class;
  protected $layer4ConfigsDataType = 'array';
  /**
   * @var string[]
   */
  public $srcIpRanges;
  protected $srcSecureTagsType = FirewallPolicyRuleSecureTag::class;
  protected $srcSecureTagsDataType = 'array';

  /**
   * @param string[]
   */
  public function setDestIpRanges($destIpRanges)
  {
    $this->destIpRanges = $destIpRanges;
  }
  /**
   * @return string[]
   */
  public function getDestIpRanges()
  {
    return $this->destIpRanges;
  }
  /**
   * @param FirewallPolicyRuleMatcherLayer4Config[]
   */
  public function setLayer4Configs($layer4Configs)
  {
    $this->layer4Configs = $layer4Configs;
  }
  /**
   * @return FirewallPolicyRuleMatcherLayer4Config[]
   */
  public function getLayer4Configs()
  {
    return $this->layer4Configs;
  }
  /**
   * @param string[]
   */
  public function setSrcIpRanges($srcIpRanges)
  {
    $this->srcIpRanges = $srcIpRanges;
  }
  /**
   * @return string[]
   */
  public function getSrcIpRanges()
  {
    return $this->srcIpRanges;
  }
  /**
   * @param FirewallPolicyRuleSecureTag[]
   */
  public function setSrcSecureTags($srcSecureTags)
  {
    $this->srcSecureTags = $srcSecureTags;
  }
  /**
   * @return FirewallPolicyRuleSecureTag[]
   */
  public function getSrcSecureTags()
  {
    return $this->srcSecureTags;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FirewallPolicyRuleMatcher::class, 'Google_Service_Compute_FirewallPolicyRuleMatcher');
