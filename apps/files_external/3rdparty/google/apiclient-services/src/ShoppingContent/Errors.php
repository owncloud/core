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

namespace Google\Service\ShoppingContent;

class Errors extends \Google\Collection
{
  protected $collection_key = 'errors';
  public $code;
  protected $errorsType = Error::class;
  protected $errorsDataType = 'array';
  public $message;

  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param Error[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Error[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Errors::class, 'Google_Service_ShoppingContent_Errors');
