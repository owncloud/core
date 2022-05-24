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

class GoogleCloudChannelV1alpha1Parameter extends \Google\Model
{
  /**
   * @var bool
   */
  public $editable;
  /**
   * @var string
   */
  public $name;
  protected $valueType = GoogleCloudChannelV1alpha1Value::class;
  protected $valueDataType = '';

  /**
   * @param bool
   */
  public function setEditable($editable)
  {
    $this->editable = $editable;
  }
  /**
   * @return bool
   */
  public function getEditable()
  {
    return $this->editable;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudChannelV1alpha1Value
   */
  public function setValue(GoogleCloudChannelV1alpha1Value $value)
  {
    $this->value = $value;
  }
  /**
   * @return GoogleCloudChannelV1alpha1Value
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1alpha1Parameter::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1Parameter');
