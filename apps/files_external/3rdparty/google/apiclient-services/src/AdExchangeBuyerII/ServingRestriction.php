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

class ServingRestriction extends \Google\Collection
{
  protected $collection_key = 'disapprovalReasons';
  protected $contextsType = ServingContext::class;
  protected $contextsDataType = 'array';
  protected $disapprovalType = Disapproval::class;
  protected $disapprovalDataType = '';
  protected $disapprovalReasonsType = Disapproval::class;
  protected $disapprovalReasonsDataType = 'array';
  /**
   * @var string
   */
  public $status;

  /**
   * @param ServingContext[]
   */
  public function setContexts($contexts)
  {
    $this->contexts = $contexts;
  }
  /**
   * @return ServingContext[]
   */
  public function getContexts()
  {
    return $this->contexts;
  }
  /**
   * @param Disapproval
   */
  public function setDisapproval(Disapproval $disapproval)
  {
    $this->disapproval = $disapproval;
  }
  /**
   * @return Disapproval
   */
  public function getDisapproval()
  {
    return $this->disapproval;
  }
  /**
   * @param Disapproval[]
   */
  public function setDisapprovalReasons($disapprovalReasons)
  {
    $this->disapprovalReasons = $disapprovalReasons;
  }
  /**
   * @return Disapproval[]
   */
  public function getDisapprovalReasons()
  {
    return $this->disapprovalReasons;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServingRestriction::class, 'Google_Service_AdExchangeBuyerII_ServingRestriction');
