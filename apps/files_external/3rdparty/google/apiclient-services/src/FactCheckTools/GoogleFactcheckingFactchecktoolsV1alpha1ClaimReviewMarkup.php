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

class GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkup extends \Google\Collection
{
  protected $collection_key = 'claimAppearances';
  /**
   * @var string[]
   */
  public $claimAppearances;
  protected $claimAuthorType = GoogleFactcheckingFactchecktoolsV1alpha1ClaimAuthor::class;
  protected $claimAuthorDataType = '';
  /**
   * @var string
   */
  public $claimDate;
  /**
   * @var string
   */
  public $claimFirstAppearance;
  /**
   * @var string
   */
  public $claimLocation;
  /**
   * @var string
   */
  public $claimReviewed;
  protected $ratingType = GoogleFactcheckingFactchecktoolsV1alpha1ClaimRating::class;
  protected $ratingDataType = '';
  /**
   * @var string
   */
  public $url;

  /**
   * @param string[]
   */
  public function setClaimAppearances($claimAppearances)
  {
    $this->claimAppearances = $claimAppearances;
  }
  /**
   * @return string[]
   */
  public function getClaimAppearances()
  {
    return $this->claimAppearances;
  }
  /**
   * @param GoogleFactcheckingFactchecktoolsV1alpha1ClaimAuthor
   */
  public function setClaimAuthor(GoogleFactcheckingFactchecktoolsV1alpha1ClaimAuthor $claimAuthor)
  {
    $this->claimAuthor = $claimAuthor;
  }
  /**
   * @return GoogleFactcheckingFactchecktoolsV1alpha1ClaimAuthor
   */
  public function getClaimAuthor()
  {
    return $this->claimAuthor;
  }
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
   * @param string
   */
  public function setClaimFirstAppearance($claimFirstAppearance)
  {
    $this->claimFirstAppearance = $claimFirstAppearance;
  }
  /**
   * @return string
   */
  public function getClaimFirstAppearance()
  {
    return $this->claimFirstAppearance;
  }
  /**
   * @param string
   */
  public function setClaimLocation($claimLocation)
  {
    $this->claimLocation = $claimLocation;
  }
  /**
   * @return string
   */
  public function getClaimLocation()
  {
    return $this->claimLocation;
  }
  /**
   * @param string
   */
  public function setClaimReviewed($claimReviewed)
  {
    $this->claimReviewed = $claimReviewed;
  }
  /**
   * @return string
   */
  public function getClaimReviewed()
  {
    return $this->claimReviewed;
  }
  /**
   * @param GoogleFactcheckingFactchecktoolsV1alpha1ClaimRating
   */
  public function setRating(GoogleFactcheckingFactchecktoolsV1alpha1ClaimRating $rating)
  {
    $this->rating = $rating;
  }
  /**
   * @return GoogleFactcheckingFactchecktoolsV1alpha1ClaimRating
   */
  public function getRating()
  {
    return $this->rating;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkup::class, 'Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkup');
