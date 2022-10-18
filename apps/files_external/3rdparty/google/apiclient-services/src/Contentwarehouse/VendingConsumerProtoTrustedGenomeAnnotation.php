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

namespace Google\Service\Contentwarehouse;

class VendingConsumerProtoTrustedGenomeAnnotation extends \Google\Collection
{
  protected $collection_key = 'trustedGenomeHierarchy';
  protected $policyType = VendingConsumerProtoTrustedGenomePolicy::class;
  protected $policyDataType = '';
  /**
   * @var string[]
   */
  public $testCode;
  protected $trustedGenomeHierarchyType = VendingConsumerProtoTrustedGenomeHierarchy::class;
  protected $trustedGenomeHierarchyDataType = 'array';

  /**
   * @param VendingConsumerProtoTrustedGenomePolicy
   */
  public function setPolicy(VendingConsumerProtoTrustedGenomePolicy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return VendingConsumerProtoTrustedGenomePolicy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  /**
   * @param string[]
   */
  public function setTestCode($testCode)
  {
    $this->testCode = $testCode;
  }
  /**
   * @return string[]
   */
  public function getTestCode()
  {
    return $this->testCode;
  }
  /**
   * @param VendingConsumerProtoTrustedGenomeHierarchy[]
   */
  public function setTrustedGenomeHierarchy($trustedGenomeHierarchy)
  {
    $this->trustedGenomeHierarchy = $trustedGenomeHierarchy;
  }
  /**
   * @return VendingConsumerProtoTrustedGenomeHierarchy[]
   */
  public function getTrustedGenomeHierarchy()
  {
    return $this->trustedGenomeHierarchy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VendingConsumerProtoTrustedGenomeAnnotation::class, 'Google_Service_Contentwarehouse_VendingConsumerProtoTrustedGenomeAnnotation');
