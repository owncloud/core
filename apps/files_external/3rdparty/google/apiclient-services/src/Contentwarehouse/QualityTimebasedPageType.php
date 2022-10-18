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

namespace Google\Service\Contentwarehouse;

class QualityTimebasedPageType extends \Google\Model
{
  /**
   * @var bool
   */
  public $isForumPage;
  /**
   * @var bool
   */
  public $isPageWithFreshRepeatedDates;
  /**
   * @var bool
   */
  public $isQnaPage;

  /**
   * @param bool
   */
  public function setIsForumPage($isForumPage)
  {
    $this->isForumPage = $isForumPage;
  }
  /**
   * @return bool
   */
  public function getIsForumPage()
  {
    return $this->isForumPage;
  }
  /**
   * @param bool
   */
  public function setIsPageWithFreshRepeatedDates($isPageWithFreshRepeatedDates)
  {
    $this->isPageWithFreshRepeatedDates = $isPageWithFreshRepeatedDates;
  }
  /**
   * @return bool
   */
  public function getIsPageWithFreshRepeatedDates()
  {
    return $this->isPageWithFreshRepeatedDates;
  }
  /**
   * @param bool
   */
  public function setIsQnaPage($isQnaPage)
  {
    $this->isQnaPage = $isQnaPage;
  }
  /**
   * @return bool
   */
  public function getIsQnaPage()
  {
    return $this->isQnaPage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityTimebasedPageType::class, 'Google_Service_Contentwarehouse_QualityTimebasedPageType');
