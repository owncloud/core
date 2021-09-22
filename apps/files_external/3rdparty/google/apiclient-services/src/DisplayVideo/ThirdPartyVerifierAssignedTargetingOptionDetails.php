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

namespace Google\Service\DisplayVideo;

class ThirdPartyVerifierAssignedTargetingOptionDetails extends \Google\Model
{
  protected $adlooxType = Adloox::class;
  protected $adlooxDataType = '';
  protected $doubleVerifyType = DoubleVerify::class;
  protected $doubleVerifyDataType = '';
  protected $integralAdScienceType = IntegralAdScience::class;
  protected $integralAdScienceDataType = '';

  /**
   * @param Adloox
   */
  public function setAdloox(Adloox $adloox)
  {
    $this->adloox = $adloox;
  }
  /**
   * @return Adloox
   */
  public function getAdloox()
  {
    return $this->adloox;
  }
  /**
   * @param DoubleVerify
   */
  public function setDoubleVerify(DoubleVerify $doubleVerify)
  {
    $this->doubleVerify = $doubleVerify;
  }
  /**
   * @return DoubleVerify
   */
  public function getDoubleVerify()
  {
    return $this->doubleVerify;
  }
  /**
   * @param IntegralAdScience
   */
  public function setIntegralAdScience(IntegralAdScience $integralAdScience)
  {
    $this->integralAdScience = $integralAdScience;
  }
  /**
   * @return IntegralAdScience
   */
  public function getIntegralAdScience()
  {
    return $this->integralAdScience;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ThirdPartyVerifierAssignedTargetingOptionDetails::class, 'Google_Service_DisplayVideo_ThirdPartyVerifierAssignedTargetingOptionDetails');
