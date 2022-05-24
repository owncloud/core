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

namespace Google\Service\AdExchangeBuyerII;

class CreativeDealAssociation extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $creativeId;
  /**
   * @var string
   */
  public $dealsId;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param string
   */
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
  /**
   * @return string
   */
  public function getCreativeId()
  {
    return $this->creativeId;
  }
  /**
   * @param string
   */
  public function setDealsId($dealsId)
  {
    $this->dealsId = $dealsId;
  }
  /**
   * @return string
   */
  public function getDealsId()
  {
    return $this->dealsId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeDealAssociation::class, 'Google_Service_AdExchangeBuyerII_CreativeDealAssociation');
