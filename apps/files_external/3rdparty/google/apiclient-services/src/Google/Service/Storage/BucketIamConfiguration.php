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

class Google_Service_Storage_BucketIamConfiguration extends Google_Model
{
  protected $bucketPolicyOnlyType = 'Google_Service_Storage_BucketIamConfigurationBucketPolicyOnly';
  protected $bucketPolicyOnlyDataType = '';
  protected $uniformBucketLevelAccessType = 'Google_Service_Storage_BucketIamConfigurationUniformBucketLevelAccess';
  protected $uniformBucketLevelAccessDataType = '';

  /**
   * @param Google_Service_Storage_BucketIamConfigurationBucketPolicyOnly
   */
  public function setBucketPolicyOnly(Google_Service_Storage_BucketIamConfigurationBucketPolicyOnly $bucketPolicyOnly)
  {
    $this->bucketPolicyOnly = $bucketPolicyOnly;
  }
  /**
   * @return Google_Service_Storage_BucketIamConfigurationBucketPolicyOnly
   */
  public function getBucketPolicyOnly()
  {
    return $this->bucketPolicyOnly;
  }
  /**
   * @param Google_Service_Storage_BucketIamConfigurationUniformBucketLevelAccess
   */
  public function setUniformBucketLevelAccess(Google_Service_Storage_BucketIamConfigurationUniformBucketLevelAccess $uniformBucketLevelAccess)
  {
    $this->uniformBucketLevelAccess = $uniformBucketLevelAccess;
  }
  /**
   * @return Google_Service_Storage_BucketIamConfigurationUniformBucketLevelAccess
   */
  public function getUniformBucketLevelAccess()
  {
    return $this->uniformBucketLevelAccess;
  }
}
