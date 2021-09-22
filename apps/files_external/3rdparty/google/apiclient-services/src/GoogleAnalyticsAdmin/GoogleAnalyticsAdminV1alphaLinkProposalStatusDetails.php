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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaLinkProposalStatusDetails extends \Google\Model
{
  public $linkProposalInitiatingProduct;
  public $linkProposalState;
  public $requestorEmail;

  public function setLinkProposalInitiatingProduct($linkProposalInitiatingProduct)
  {
    $this->linkProposalInitiatingProduct = $linkProposalInitiatingProduct;
  }
  public function getLinkProposalInitiatingProduct()
  {
    return $this->linkProposalInitiatingProduct;
  }
  public function setLinkProposalState($linkProposalState)
  {
    $this->linkProposalState = $linkProposalState;
  }
  public function getLinkProposalState()
  {
    return $this->linkProposalState;
  }
  public function setRequestorEmail($requestorEmail)
  {
    $this->requestorEmail = $requestorEmail;
  }
  public function getRequestorEmail()
  {
    return $this->requestorEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaLinkProposalStatusDetails::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaLinkProposalStatusDetails');
