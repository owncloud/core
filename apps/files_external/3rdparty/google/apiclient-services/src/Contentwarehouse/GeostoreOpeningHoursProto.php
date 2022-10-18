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

class GeostoreOpeningHoursProto extends \Google\Collection
{
  protected $collection_key = 'exception';
  protected $exceptionType = GeostoreExceptionalHoursProto::class;
  protected $exceptionDataType = 'array';
  protected $regularHoursType = GeostoreBusinessHoursProto::class;
  protected $regularHoursDataType = '';

  /**
   * @param GeostoreExceptionalHoursProto[]
   */
  public function setException($exception)
  {
    $this->exception = $exception;
  }
  /**
   * @return GeostoreExceptionalHoursProto[]
   */
  public function getException()
  {
    return $this->exception;
  }
  /**
   * @param GeostoreBusinessHoursProto
   */
  public function setRegularHours(GeostoreBusinessHoursProto $regularHours)
  {
    $this->regularHours = $regularHours;
  }
  /**
   * @return GeostoreBusinessHoursProto
   */
  public function getRegularHours()
  {
    return $this->regularHours;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreOpeningHoursProto::class, 'Google_Service_Contentwarehouse_GeostoreOpeningHoursProto');
