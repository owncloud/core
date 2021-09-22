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

namespace Google\Service\DLP\Resource;

use Google\Service\DLP\GooglePrivacyDlpV2DeidentifyContentRequest;
use Google\Service\DLP\GooglePrivacyDlpV2DeidentifyContentResponse;
use Google\Service\DLP\GooglePrivacyDlpV2InspectContentRequest;
use Google\Service\DLP\GooglePrivacyDlpV2InspectContentResponse;
use Google\Service\DLP\GooglePrivacyDlpV2ReidentifyContentRequest;
use Google\Service\DLP\GooglePrivacyDlpV2ReidentifyContentResponse;

/**
 * The "content" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google\Service\DLP(...);
 *   $content = $dlpService->content;
 *  </code>
 */
class ProjectsContent extends \Google\Service\Resource
{
  /**
   * De-identifies potentially sensitive info from a ContentItem. This method has
   * limits on input size and output size. See https://cloud.google.com/dlp/docs
   * /deidentify-sensitive-data to learn more. When no InfoTypes or
   * CustomInfoTypes are specified in this request, the system will automatically
   * choose what detectors to run. By default this may be all types, but may
   * change over time as detectors are updated. (content.deidentify)
   *
   * @param string $parent Parent resource name. The format of this value varies
   * depending on whether you have [specified a processing
   * location](https://cloud.google.com/dlp/docs/specifying-location): + Projects
   * scope, location specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID +
   * Projects scope, no location specified (defaults to global):
   * `projects/`PROJECT_ID The following example `parent` string specifies a
   * parent project with the identifier `example-project`, and specifies the
   * `europe-west3` location for processing data: parent=projects/example-
   * project/locations/europe-west3
   * @param GooglePrivacyDlpV2DeidentifyContentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GooglePrivacyDlpV2DeidentifyContentResponse
   */
  public function deidentify($parent, GooglePrivacyDlpV2DeidentifyContentRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deidentify', [$params], GooglePrivacyDlpV2DeidentifyContentResponse::class);
  }
  /**
   * Finds potentially sensitive info in content. This method has limits on input
   * size, processing time, and output size. When no InfoTypes or CustomInfoTypes
   * are specified in this request, the system will automatically choose what
   * detectors to run. By default this may be all types, but may change over time
   * as detectors are updated. For how to guides, see
   * https://cloud.google.com/dlp/docs/inspecting-images and
   * https://cloud.google.com/dlp/docs/inspecting-text, (content.inspect)
   *
   * @param string $parent Parent resource name. The format of this value varies
   * depending on whether you have [specified a processing
   * location](https://cloud.google.com/dlp/docs/specifying-location): + Projects
   * scope, location specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID +
   * Projects scope, no location specified (defaults to global):
   * `projects/`PROJECT_ID The following example `parent` string specifies a
   * parent project with the identifier `example-project`, and specifies the
   * `europe-west3` location for processing data: parent=projects/example-
   * project/locations/europe-west3
   * @param GooglePrivacyDlpV2InspectContentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GooglePrivacyDlpV2InspectContentResponse
   */
  public function inspect($parent, GooglePrivacyDlpV2InspectContentRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('inspect', [$params], GooglePrivacyDlpV2InspectContentResponse::class);
  }
  /**
   * Re-identifies content that has been de-identified. See
   * https://cloud.google.com/dlp/docs/pseudonymization#re-
   * identification_in_free_text_code_example to learn more. (content.reidentify)
   *
   * @param string $parent Required. Parent resource name. The format of this
   * value varies depending on whether you have [specified a processing
   * location](https://cloud.google.com/dlp/docs/specifying-location): + Projects
   * scope, location specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID +
   * Projects scope, no location specified (defaults to global):
   * `projects/`PROJECT_ID The following example `parent` string specifies a
   * parent project with the identifier `example-project`, and specifies the
   * `europe-west3` location for processing data: parent=projects/example-
   * project/locations/europe-west3
   * @param GooglePrivacyDlpV2ReidentifyContentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GooglePrivacyDlpV2ReidentifyContentResponse
   */
  public function reidentify($parent, GooglePrivacyDlpV2ReidentifyContentRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reidentify', [$params], GooglePrivacyDlpV2ReidentifyContentResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsContent::class, 'Google_Service_DLP_Resource_ProjectsContent');
