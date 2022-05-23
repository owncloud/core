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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1RepricingAdjustment extends \Google\Model
{
  protected $percentageAdjustmentType = GoogleCloudChannelV1PercentageAdjustment::class;
  protected $percentageAdjustmentDataType = '';

  /**
   * @param GoogleCloudChannelV1PercentageAdjustment
   */
  public function setPercentageAdjustment(GoogleCloudChannelV1PercentageAdjustment $percentageAdjustment)
  {
    $this->percentageAdjustment = $percentageAdjustment;
  }
  /**
   * @return GoogleCloudChannelV1PercentageAdjustment
   */
  public function getPercentageAdjustment()
  {
    return $this->percentageAdjustment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1RepricingAdjustment::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1RepricingAdjustment');
