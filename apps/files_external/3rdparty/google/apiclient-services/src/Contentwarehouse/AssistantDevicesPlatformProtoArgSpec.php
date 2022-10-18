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

class AssistantDevicesPlatformProtoArgSpec extends \Google\Model
{
  protected $intValueSpecType = AssistantDevicesPlatformProtoIntValueSpec::class;
  protected $intValueSpecDataType = '';
  protected $optionValueSpecType = AssistantDevicesPlatformProtoOptionValueSpec::class;
  protected $optionValueSpecDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param AssistantDevicesPlatformProtoIntValueSpec
   */
  public function setIntValueSpec(AssistantDevicesPlatformProtoIntValueSpec $intValueSpec)
  {
    $this->intValueSpec = $intValueSpec;
  }
  /**
   * @return AssistantDevicesPlatformProtoIntValueSpec
   */
  public function getIntValueSpec()
  {
    return $this->intValueSpec;
  }
  /**
   * @param AssistantDevicesPlatformProtoOptionValueSpec
   */
  public function setOptionValueSpec(AssistantDevicesPlatformProtoOptionValueSpec $optionValueSpec)
  {
    $this->optionValueSpec = $optionValueSpec;
  }
  /**
   * @return AssistantDevicesPlatformProtoOptionValueSpec
   */
  public function getOptionValueSpec()
  {
    return $this->optionValueSpec;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantDevicesPlatformProtoArgSpec::class, 'Google_Service_Contentwarehouse_AssistantDevicesPlatformProtoArgSpec');
