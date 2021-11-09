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

class BfdStatusPacketCounts extends \Google\Model
{
  public $numRx;
  public $numRxRejected;
  public $numRxSuccessful;
  public $numTx;

  public function setNumRx($numRx)
  {
    $this->numRx = $numRx;
  }
  public function getNumRx()
  {
    return $this->numRx;
  }
  public function setNumRxRejected($numRxRejected)
  {
    $this->numRxRejected = $numRxRejected;
  }
  public function getNumRxRejected()
  {
    return $this->numRxRejected;
  }
  public function setNumRxSuccessful($numRxSuccessful)
  {
    $this->numRxSuccessful = $numRxSuccessful;
  }
  public function getNumRxSuccessful()
  {
    return $this->numRxSuccessful;
  }
  public function setNumTx($numTx)
  {
    $this->numTx = $numTx;
  }
  public function getNumTx()
  {
    return $this->numTx;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BfdStatusPacketCounts::class, 'Google_Service_Compute_BfdStatusPacketCounts');
