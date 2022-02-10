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

namespace Google\Service\AndroidPublisher;

class Variant extends \Google\Model
{
  protected $deviceSpecType = DeviceSpec::class;
  protected $deviceSpecDataType = '';
  /**
   * @var string
   */
  public $variantId;

  /**
   * @param DeviceSpec
   */
  public function setDeviceSpec(DeviceSpec $deviceSpec)
  {
    $this->deviceSpec = $deviceSpec;
  }
  /**
   * @return DeviceSpec
   */
  public function getDeviceSpec()
  {
    return $this->deviceSpec;
  }
  /**
   * @param string
   */
  public function setVariantId($variantId)
  {
    $this->variantId = $variantId;
  }
  /**
   * @return string
   */
  public function getVariantId()
  {
    return $this->variantId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Variant::class, 'Google_Service_AndroidPublisher_Variant');
