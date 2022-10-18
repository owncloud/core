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

class GoogleCloudContentwarehouseV1SetAclResponse extends \Google\Model
{
  protected $metadataType = GoogleCloudContentwarehouseV1ResponseMetadata::class;
  protected $metadataDataType = '';
  protected $policyType = GoogleIamV1Policy::class;
  protected $policyDataType = '';

  /**
   * @param GoogleCloudContentwarehouseV1ResponseMetadata
   */
  public function setMetadata(GoogleCloudContentwarehouseV1ResponseMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GoogleCloudContentwarehouseV1ResponseMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param GoogleIamV1Policy
   */
  public function setPolicy(GoogleIamV1Policy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return GoogleIamV1Policy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1SetAclResponse::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1SetAclResponse');
