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

class InterconnectAttachmentPartnerMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $interconnectName;
  /**
   * @var string
   */
  public $partnerName;
  /**
   * @var string
   */
  public $portalUrl;

  /**
   * @param string
   */
  public function setInterconnectName($interconnectName)
  {
    $this->interconnectName = $interconnectName;
  }
  /**
   * @return string
   */
  public function getInterconnectName()
  {
    return $this->interconnectName;
  }
  /**
   * @param string
   */
  public function setPartnerName($partnerName)
  {
    $this->partnerName = $partnerName;
  }
  /**
   * @return string
   */
  public function getPartnerName()
  {
    return $this->partnerName;
  }
  /**
   * @param string
   */
  public function setPortalUrl($portalUrl)
  {
    $this->portalUrl = $portalUrl;
  }
  /**
   * @return string
   */
  public function getPortalUrl()
  {
    return $this->portalUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InterconnectAttachmentPartnerMetadata::class, 'Google_Service_Compute_InterconnectAttachmentPartnerMetadata');
