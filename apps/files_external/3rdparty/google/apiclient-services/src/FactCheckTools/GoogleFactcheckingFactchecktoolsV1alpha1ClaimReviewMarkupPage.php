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

class GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage extends \Google\Collection
{
  protected $collection_key = 'claimReviewMarkups';
  protected $claimReviewAuthorType = GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewAuthor::class;
  protected $claimReviewAuthorDataType = '';
  protected $claimReviewMarkupsType = GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkup::class;
  protected $claimReviewMarkupsDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $pageUrl;
  /**
   * @var string
   */
  public $publishDate;
  /**
   * @var string
   */
  public $versionId;

  /**
   * @param GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewAuthor
   */
  public function setClaimReviewAuthor(GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewAuthor $claimReviewAuthor)
  {
    $this->claimReviewAuthor = $claimReviewAuthor;
  }
  /**
   * @return GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewAuthor
   */
  public function getClaimReviewAuthor()
  {
    return $this->claimReviewAuthor;
  }
  /**
   * @param GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkup[]
   */
  public function setClaimReviewMarkups($claimReviewMarkups)
  {
    $this->claimReviewMarkups = $claimReviewMarkups;
  }
  /**
   * @return GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkup[]
   */
  public function getClaimReviewMarkups()
  {
    return $this->claimReviewMarkups;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPageUrl($pageUrl)
  {
    $this->pageUrl = $pageUrl;
  }
  /**
   * @return string
   */
  public function getPageUrl()
  {
    return $this->pageUrl;
  }
  /**
   * @param string
   */
  public function setPublishDate($publishDate)
  {
    $this->publishDate = $publishDate;
  }
  /**
   * @return string
   */
  public function getPublishDate()
  {
    return $this->publishDate;
  }
  /**
   * @param string
   */
  public function setVersionId($versionId)
  {
    $this->versionId = $versionId;
  }
  /**
   * @return string
   */
  public function getVersionId()
  {
    return $this->versionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage::class, 'Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage');
