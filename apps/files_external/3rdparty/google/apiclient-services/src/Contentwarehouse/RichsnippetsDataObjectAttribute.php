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

class RichsnippetsDataObjectAttribute extends \Google\Model
{
  /**
   * @var string
   */
  public $cdata;
  /**
   * @var string
   */
  public $idata;
  /**
   * @var string
   */
  public $name;
  protected $subobjectType = Proto2BridgeMessageSet::class;
  protected $subobjectDataType = '';
  /**
   * @var bool
   */
  public $tokenize;
  /**
   * @var string
   */
  public $value;

  /**
   * @param string
   */
  public function setCdata($cdata)
  {
    $this->cdata = $cdata;
  }
  /**
   * @return string
   */
  public function getCdata()
  {
    return $this->cdata;
  }
  /**
   * @param string
   */
  public function setIdata($idata)
  {
    $this->idata = $idata;
  }
  /**
   * @return string
   */
  public function getIdata()
  {
    return $this->idata;
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
   * @param Proto2BridgeMessageSet
   */
  public function setSubobject(Proto2BridgeMessageSet $subobject)
  {
    $this->subobject = $subobject;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getSubobject()
  {
    return $this->subobject;
  }
  /**
   * @param bool
   */
  public function setTokenize($tokenize)
  {
    $this->tokenize = $tokenize;
  }
  /**
   * @return bool
   */
  public function getTokenize()
  {
    return $this->tokenize;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RichsnippetsDataObjectAttribute::class, 'Google_Service_Contentwarehouse_RichsnippetsDataObjectAttribute');
