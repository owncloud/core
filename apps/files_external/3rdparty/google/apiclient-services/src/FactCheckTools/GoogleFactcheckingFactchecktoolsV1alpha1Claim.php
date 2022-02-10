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

namespace Google\Service\FactCheckTools;

class GoogleFactcheckingFactchecktoolsV1alpha1Claim extends \Google\Collection
{
  protected $collection_key = 'claimReview';
  /**
   * @var string
   */
  public $claimDate;
  protected $claimReviewType = GoogleFactcheckingFactchecktoolsV1alpha1ClaimReview::class;
  protected $claimReviewDataType = 'array';
  /**
   * @var string
   */
  public $claimant;
  /**
   * @var string
   */
  public $text;

  /**
   * @param string
   */
  public function setClaimDate($claimDate)
  {
    $this->claimDate = $claimDate;
  }
  /**
   * @return string
   */
  public function getClaimDate()
  {
    return $this->claimDate;
  }
  /**
   * @param GoogleFactcheckingFactchecktoolsV1alpha1ClaimReview[]
   */
  public function setClaimReview($claimReview)
  {
    $this->claimReview = $claimReview;
  }
  /**
   * @return GoogleFactcheckingFactchecktoolsV1alpha1ClaimReview[]
   */
  public function getClaimReview()
  {
    return $this->claimReview;
  }
  /**
   * @param string
   */
  public function setClaimant($claimant)
  {
    $this->claimant = $claimant;
  }
  /**
   * @return string
   */
  public function getClaimant()
  {
    return $this->claimant;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFactcheckingFactchecktoolsV1alpha1Claim::class, 'Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1Claim');
