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

namespace Google\Service\CloudIdentity;

class MembershipRole extends \Google\Model
{
  protected $expiryDetailType = ExpiryDetail::class;
  protected $expiryDetailDataType = '';
  public $name;

  /**
   * @param ExpiryDetail
   */
  public function setExpiryDetail(ExpiryDetail $expiryDetail)
  {
    $this->expiryDetail = $expiryDetail;
  }
  /**
   * @return ExpiryDetail
   */
  public function getExpiryDetail()
  {
    return $this->expiryDetail;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MembershipRole::class, 'Google_Service_CloudIdentity_MembershipRole');
