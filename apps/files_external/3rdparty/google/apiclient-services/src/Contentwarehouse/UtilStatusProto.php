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

class UtilStatusProto extends \Google\Model
{
  /**
   * @var int
   */
  public $canonicalCode;
  /**
   * @var int
   */
  public $code;
  /**
   * @var string
   */
  public $message;
  protected $messageSetType = Proto2BridgeMessageSet::class;
  protected $messageSetDataType = '';
  /**
   * @var string
   */
  public $space;

  /**
   * @param int
   */
  public function setCanonicalCode($canonicalCode)
  {
    $this->canonicalCode = $canonicalCode;
  }
  /**
   * @return int
   */
  public function getCanonicalCode()
  {
    return $this->canonicalCode;
  }
  /**
   * @param int
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return int
   */
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param string
   */
  public function setMessage($message)
  {
    $this->message = $message;
  }
  /**
   * @return string
   */
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setMessageSet(Proto2BridgeMessageSet $messageSet)
  {
    $this->messageSet = $messageSet;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getMessageSet()
  {
    return $this->messageSet;
  }
  /**
   * @param string
   */
  public function setSpace($space)
  {
    $this->space = $space;
  }
  /**
   * @return string
   */
  public function getSpace()
  {
    return $this->space;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UtilStatusProto::class, 'Google_Service_Contentwarehouse_UtilStatusProto');
