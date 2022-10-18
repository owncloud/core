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

class RegistrationInfo extends \Google\Model
{
  /**
   * @var int
   */
  public $createdDate;
  /**
   * @var int
   */
  public $expiredDate;

  /**
   * @param int
   */
  public function setCreatedDate($createdDate)
  {
    $this->createdDate = $createdDate;
  }
  /**
   * @return int
   */
  public function getCreatedDate()
  {
    return $this->createdDate;
  }
  /**
   * @param int
   */
  public function setExpiredDate($expiredDate)
  {
    $this->expiredDate = $expiredDate;
  }
  /**
   * @return int
   */
  public function getExpiredDate()
  {
    return $this->expiredDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RegistrationInfo::class, 'Google_Service_Contentwarehouse_RegistrationInfo');
