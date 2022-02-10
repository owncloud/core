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

namespace Google\Service\Compute;

class Condition extends \Google\Collection
{
  protected $collection_key = 'values';
  /**
   * @var string
   */
  public $iam;
  /**
   * @var string
   */
  public $op;
  /**
   * @var string
   */
  public $svc;
  /**
   * @var string
   */
  public $sys;
  /**
   * @var string[]
   */
  public $values;

  /**
   * @param string
   */
  public function setIam($iam)
  {
    $this->iam = $iam;
  }
  /**
   * @return string
   */
  public function getIam()
  {
    return $this->iam;
  }
  /**
   * @param string
   */
  public function setOp($op)
  {
    $this->op = $op;
  }
  /**
   * @return string
   */
  public function getOp()
  {
    return $this->op;
  }
  /**
   * @param string
   */
  public function setSvc($svc)
  {
    $this->svc = $svc;
  }
  /**
   * @return string
   */
  public function getSvc()
  {
    return $this->svc;
  }
  /**
   * @param string
   */
  public function setSys($sys)
  {
    $this->sys = $sys;
  }
  /**
   * @return string
   */
  public function getSys()
  {
    return $this->sys;
  }
  /**
   * @param string[]
   */
  public function setValues($values)
  {
    $this->values = $values;
  }
  /**
   * @return string[]
   */
  public function getValues()
  {
    return $this->values;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Condition::class, 'Google_Service_Compute_Condition');
