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

namespace Google\Service\Storage;

class BucketIamConfiguration extends \Google\Model
{
  protected $bucketPolicyOnlyType = BucketIamConfigurationBucketPolicyOnly::class;
  protected $bucketPolicyOnlyDataType = '';
  public $publicAccessPrevention;
  protected $uniformBucketLevelAccessType = BucketIamConfigurationUniformBucketLevelAccess::class;
  protected $uniformBucketLevelAccessDataType = '';

  /**
   * @param BucketIamConfigurationBucketPolicyOnly
   */
  public function setBucketPolicyOnly(BucketIamConfigurationBucketPolicyOnly $bucketPolicyOnly)
  {
    $this->bucketPolicyOnly = $bucketPolicyOnly;
  }
  /**
   * @return BucketIamConfigurationBucketPolicyOnly
   */
  public function getBucketPolicyOnly()
  {
    return $this->bucketPolicyOnly;
  }
  public function setPublicAccessPrevention($publicAccessPrevention)
  {
    $this->publicAccessPrevention = $publicAccessPrevention;
  }
  public function getPublicAccessPrevention()
  {
    return $this->publicAccessPrevention;
  }
  /**
   * @param BucketIamConfigurationUniformBucketLevelAccess
   */
  public function setUniformBucketLevelAccess(BucketIamConfigurationUniformBucketLevelAccess $uniformBucketLevelAccess)
  {
    $this->uniformBucketLevelAccess = $uniformBucketLevelAccess;
  }
  /**
   * @return BucketIamConfigurationUniformBucketLevelAccess
   */
  public function getUniformBucketLevelAccess()
  {
    return $this->uniformBucketLevelAccess;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BucketIamConfiguration::class, 'Google_Service_Storage_BucketIamConfiguration');
