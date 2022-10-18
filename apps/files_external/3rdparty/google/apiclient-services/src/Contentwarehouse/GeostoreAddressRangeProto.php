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

class GeostoreAddressRangeProto extends \Google\Collection
{
  protected $collection_key = 'parameter';
  /**
   * @var int[]
   */
  public $number;
  /**
   * @var float[]
   */
  public $parameter;
  /**
   * @var string
   */
  public $prefix;
  /**
   * @var bool
   */
  public $sameParity;
  /**
   * @var string
   */
  public $suffix;
  protected $temporaryDataType = Proto2BridgeMessageSet::class;
  protected $temporaryDataDataType = '';

  /**
   * @param int[]
   */
  public function setNumber($number)
  {
    $this->number = $number;
  }
  /**
   * @return int[]
   */
  public function getNumber()
  {
    return $this->number;
  }
  /**
   * @param float[]
   */
  public function setParameter($parameter)
  {
    $this->parameter = $parameter;
  }
  /**
   * @return float[]
   */
  public function getParameter()
  {
    return $this->parameter;
  }
  /**
   * @param string
   */
  public function setPrefix($prefix)
  {
    $this->prefix = $prefix;
  }
  /**
   * @return string
   */
  public function getPrefix()
  {
    return $this->prefix;
  }
  /**
   * @param bool
   */
  public function setSameParity($sameParity)
  {
    $this->sameParity = $sameParity;
  }
  /**
   * @return bool
   */
  public function getSameParity()
  {
    return $this->sameParity;
  }
  /**
   * @param string
   */
  public function setSuffix($suffix)
  {
    $this->suffix = $suffix;
  }
  /**
   * @return string
   */
  public function getSuffix()
  {
    return $this->suffix;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setTemporaryData(Proto2BridgeMessageSet $temporaryData)
  {
    $this->temporaryData = $temporaryData;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getTemporaryData()
  {
    return $this->temporaryData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreAddressRangeProto::class, 'Google_Service_Contentwarehouse_GeostoreAddressRangeProto');
