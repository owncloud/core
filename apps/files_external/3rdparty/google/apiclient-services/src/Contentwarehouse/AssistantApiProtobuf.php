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

class AssistantApiProtobuf extends \Google\Model
{
  /**
   * @var string
   */
  public $protobufData;
  /**
   * @var string
   */
  public $protobufType;

  /**
   * @param string
   */
  public function setProtobufData($protobufData)
  {
    $this->protobufData = $protobufData;
  }
  /**
   * @return string
   */
  public function getProtobufData()
  {
    return $this->protobufData;
  }
  /**
   * @param string
   */
  public function setProtobufType($protobufType)
  {
    $this->protobufType = $protobufType;
  }
  /**
   * @return string
   */
  public function getProtobufType()
  {
    return $this->protobufType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiProtobuf::class, 'Google_Service_Contentwarehouse_AssistantApiProtobuf');
