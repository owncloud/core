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

namespace Google\Service\CloudTrace;

class Link extends \Google\Model
{
  protected $attributesType = Attributes::class;
  protected $attributesDataType = '';
  /**
   * @var string
   */
  public $spanId;
  /**
   * @var string
   */
  public $traceId;
  /**
   * @var string
   */
  public $type;

  /**
   * @param Attributes
   */
  public function setAttributes(Attributes $attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return Attributes
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param string
   */
  public function setSpanId($spanId)
  {
    $this->spanId = $spanId;
  }
  /**
   * @return string
   */
  public function getSpanId()
  {
    return $this->spanId;
  }
  /**
   * @param string
   */
  public function setTraceId($traceId)
  {
    $this->traceId = $traceId;
  }
  /**
   * @return string
   */
  public function getTraceId()
  {
    return $this->traceId;
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
class_alias(Link::class, 'Google_Service_CloudTrace_Link');
