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

class GeostoreTimeIntervalProto extends \Google\Model
{
  protected $beginType = GeostoreTimeEndpointProto::class;
  protected $beginDataType = '';
  protected $endType = GeostoreTimeEndpointProto::class;
  protected $endDataType = '';
  /**
   * @var bool
   */
  public $inverted;
  /**
   * @var string
   */
  public $occasion;
  /**
   * @var string
   */
  public $type;

  /**
   * @param GeostoreTimeEndpointProto
   */
  public function setBegin(GeostoreTimeEndpointProto $begin)
  {
    $this->begin = $begin;
  }
  /**
   * @return GeostoreTimeEndpointProto
   */
  public function getBegin()
  {
    return $this->begin;
  }
  /**
   * @param GeostoreTimeEndpointProto
   */
  public function setEnd(GeostoreTimeEndpointProto $end)
  {
    $this->end = $end;
  }
  /**
   * @return GeostoreTimeEndpointProto
   */
  public function getEnd()
  {
    return $this->end;
  }
  /**
   * @param bool
   */
  public function setInverted($inverted)
  {
    $this->inverted = $inverted;
  }
  /**
   * @return bool
   */
  public function getInverted()
  {
    return $this->inverted;
  }
  /**
   * @param string
   */
  public function setOccasion($occasion)
  {
    $this->occasion = $occasion;
  }
  /**
   * @return string
   */
  public function getOccasion()
  {
    return $this->occasion;
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
class_alias(GeostoreTimeIntervalProto::class, 'Google_Service_Contentwarehouse_GeostoreTimeIntervalProto');
