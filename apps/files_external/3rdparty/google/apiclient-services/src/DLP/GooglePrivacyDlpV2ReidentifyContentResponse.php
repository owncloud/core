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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2ReidentifyContentResponse extends \Google\Model
{
  protected $itemType = GooglePrivacyDlpV2ContentItem::class;
  protected $itemDataType = '';
  protected $overviewType = GooglePrivacyDlpV2TransformationOverview::class;
  protected $overviewDataType = '';

  /**
   * @param GooglePrivacyDlpV2ContentItem
   */
  public function setItem(GooglePrivacyDlpV2ContentItem $item)
  {
    $this->item = $item;
  }
  /**
   * @return GooglePrivacyDlpV2ContentItem
   */
  public function getItem()
  {
    return $this->item;
  }
  /**
   * @param GooglePrivacyDlpV2TransformationOverview
   */
  public function setOverview(GooglePrivacyDlpV2TransformationOverview $overview)
  {
    $this->overview = $overview;
  }
  /**
   * @return GooglePrivacyDlpV2TransformationOverview
   */
  public function getOverview()
  {
    return $this->overview;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2ReidentifyContentResponse::class, 'Google_Service_DLP_GooglePrivacyDlpV2ReidentifyContentResponse');
