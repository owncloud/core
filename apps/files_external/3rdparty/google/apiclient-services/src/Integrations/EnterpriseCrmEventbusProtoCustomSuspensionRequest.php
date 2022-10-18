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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoCustomSuspensionRequest extends \Google\Model
{
  protected $postToQueueWithTriggerIdRequestType = GoogleInternalCloudCrmEventbusV3PostToQueueWithTriggerIdRequest::class;
  protected $postToQueueWithTriggerIdRequestDataType = '';
  /**
   * @var string
   */
  public $suspensionInfoEventParameterKey;

  /**
   * @param GoogleInternalCloudCrmEventbusV3PostToQueueWithTriggerIdRequest
   */
  public function setPostToQueueWithTriggerIdRequest(GoogleInternalCloudCrmEventbusV3PostToQueueWithTriggerIdRequest $postToQueueWithTriggerIdRequest)
  {
    $this->postToQueueWithTriggerIdRequest = $postToQueueWithTriggerIdRequest;
  }
  /**
   * @return GoogleInternalCloudCrmEventbusV3PostToQueueWithTriggerIdRequest
   */
  public function getPostToQueueWithTriggerIdRequest()
  {
    return $this->postToQueueWithTriggerIdRequest;
  }
  /**
   * @param string
   */
  public function setSuspensionInfoEventParameterKey($suspensionInfoEventParameterKey)
  {
    $this->suspensionInfoEventParameterKey = $suspensionInfoEventParameterKey;
  }
  /**
   * @return string
   */
  public function getSuspensionInfoEventParameterKey()
  {
    return $this->suspensionInfoEventParameterKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoCustomSuspensionRequest::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoCustomSuspensionRequest');
