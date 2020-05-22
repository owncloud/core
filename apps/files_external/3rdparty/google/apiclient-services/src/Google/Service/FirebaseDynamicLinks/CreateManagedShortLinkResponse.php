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

class Google_Service_FirebaseDynamicLinks_CreateManagedShortLinkResponse extends Google_Collection
{
  protected $collection_key = 'warning';
  protected $managedShortLinkType = 'Google_Service_FirebaseDynamicLinks_ManagedShortLink';
  protected $managedShortLinkDataType = '';
  public $previewLink;
  protected $warningType = 'Google_Service_FirebaseDynamicLinks_DynamicLinkWarning';
  protected $warningDataType = 'array';

  /**
   * @param Google_Service_FirebaseDynamicLinks_ManagedShortLink
   */
  public function setManagedShortLink(Google_Service_FirebaseDynamicLinks_ManagedShortLink $managedShortLink)
  {
    $this->managedShortLink = $managedShortLink;
  }
  /**
   * @return Google_Service_FirebaseDynamicLinks_ManagedShortLink
   */
  public function getManagedShortLink()
  {
    return $this->managedShortLink;
  }
  public function setPreviewLink($previewLink)
  {
    $this->previewLink = $previewLink;
  }
  public function getPreviewLink()
  {
    return $this->previewLink;
  }
  /**
   * @param Google_Service_FirebaseDynamicLinks_DynamicLinkWarning
   */
  public function setWarning($warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return Google_Service_FirebaseDynamicLinks_DynamicLinkWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}
