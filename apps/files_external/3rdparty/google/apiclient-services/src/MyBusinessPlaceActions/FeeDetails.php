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

namespace Google\Service\MyBusinessPlaceActions;

class FeeDetails extends \Google\Model
{
  protected $baseFeeType = MinimumFee::class;
  protected $baseFeeDataType = '';
  protected $fixedFeeType = FixedFee::class;
  protected $fixedFeeDataType = '';
  protected $noFeeType = NoFee::class;
  protected $noFeeDataType = '';

  /**
   * @param MinimumFee
   */
  public function setBaseFee(MinimumFee $baseFee)
  {
    $this->baseFee = $baseFee;
  }
  /**
   * @return MinimumFee
   */
  public function getBaseFee()
  {
    return $this->baseFee;
  }
  /**
   * @param FixedFee
   */
  public function setFixedFee(FixedFee $fixedFee)
  {
    $this->fixedFee = $fixedFee;
  }
  /**
   * @return FixedFee
   */
  public function getFixedFee()
  {
    return $this->fixedFee;
  }
  /**
   * @param NoFee
   */
  public function setNoFee(NoFee $noFee)
  {
    $this->noFee = $noFee;
  }
  /**
   * @return NoFee
   */
  public function getNoFee()
  {
    return $this->noFee;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FeeDetails::class, 'Google_Service_MyBusinessPlaceActions_FeeDetails');
