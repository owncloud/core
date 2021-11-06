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

namespace Google\Service\MyBusinessVerifications;

class VoiceOfMerchantState extends \Google\Model
{
  protected $complyWithGuidelinesType = ComplyWithGuidelines::class;
  protected $complyWithGuidelinesDataType = '';
  public $hasBusinessAuthority;
  public $hasVoiceOfMerchant;
  protected $resolveOwnershipConflictType = ResolveOwnershipConflict::class;
  protected $resolveOwnershipConflictDataType = '';
  protected $verifyType = Verify::class;
  protected $verifyDataType = '';
  protected $waitForVoiceOfMerchantType = WaitForVoiceOfMerchant::class;
  protected $waitForVoiceOfMerchantDataType = '';

  /**
   * @param ComplyWithGuidelines
   */
  public function setComplyWithGuidelines(ComplyWithGuidelines $complyWithGuidelines)
  {
    $this->complyWithGuidelines = $complyWithGuidelines;
  }
  /**
   * @return ComplyWithGuidelines
   */
  public function getComplyWithGuidelines()
  {
    return $this->complyWithGuidelines;
  }
  public function setHasBusinessAuthority($hasBusinessAuthority)
  {
    $this->hasBusinessAuthority = $hasBusinessAuthority;
  }
  public function getHasBusinessAuthority()
  {
    return $this->hasBusinessAuthority;
  }
  public function setHasVoiceOfMerchant($hasVoiceOfMerchant)
  {
    $this->hasVoiceOfMerchant = $hasVoiceOfMerchant;
  }
  public function getHasVoiceOfMerchant()
  {
    return $this->hasVoiceOfMerchant;
  }
  /**
   * @param ResolveOwnershipConflict
   */
  public function setResolveOwnershipConflict(ResolveOwnershipConflict $resolveOwnershipConflict)
  {
    $this->resolveOwnershipConflict = $resolveOwnershipConflict;
  }
  /**
   * @return ResolveOwnershipConflict
   */
  public function getResolveOwnershipConflict()
  {
    return $this->resolveOwnershipConflict;
  }
  /**
   * @param Verify
   */
  public function setVerify(Verify $verify)
  {
    $this->verify = $verify;
  }
  /**
   * @return Verify
   */
  public function getVerify()
  {
    return $this->verify;
  }
  /**
   * @param WaitForVoiceOfMerchant
   */
  public function setWaitForVoiceOfMerchant(WaitForVoiceOfMerchant $waitForVoiceOfMerchant)
  {
    $this->waitForVoiceOfMerchant = $waitForVoiceOfMerchant;
  }
  /**
   * @return WaitForVoiceOfMerchant
   */
  public function getWaitForVoiceOfMerchant()
  {
    return $this->waitForVoiceOfMerchant;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VoiceOfMerchantState::class, 'Google_Service_MyBusinessVerifications_VoiceOfMerchantState');
