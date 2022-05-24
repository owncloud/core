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

use Google\Service\DLP\GooglePrivacyDlpV2CreateDeidentifyTemplateRequest;
use Google\Service\DLP\GooglePrivacyDlpV2DeidentifyTemplate;
use Google\Service\DLP\GooglePrivacyDlpV2ListDeidentifyTemplatesResponse;
use Google\Service\DLP\GooglePrivacyDlpV2UpdateDeidentifyTemplateRequest;
use Google\Service\DLP\GoogleProtobufEmpty;

/**
 * The "deidentifyTemplates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google\Service\DLP(...);
 *   $deidentifyTemplates = $dlpService->deidentifyTemplates;
 *  </code>
 */
class OrganizationsDeidentifyTemplates extends \Google\Service\Resource
{
  /**
   * Creates a DeidentifyTemplate for re-using frequently used configuration for
   * de-identifying content, images, and storage. See
   * https://cloud.google.com/dlp/docs/creating-templates-deid to learn more.
   * (deidentifyTemplates.create)
   *
   * @param string $parent Required. Parent resource name. The format of this
   * value varies depending on the scope of the request (project or organization)
   * and whether you have [specified a processing
   * location](https://cloud.google.com/dlp/docs/specifying-location): + Projects
   * scope, location specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID +
   * Projects scope, no location specified (defaults to global):
   * `projects/`PROJECT_ID + Organizations scope, location specified:
   * `organizations/`ORG_ID`/locations/`LOCATION_ID + Organizations scope, no
   * location specified (defaults to global): `organizations/`ORG_ID The following
   * example `parent` string specifies a parent project with the identifier
   * `example-project`, and specifies the `europe-west3` location for processing
   * data: parent=projects/example-project/locations/europe-west3
   * @param GooglePrivacyDlpV2CreateDeidentifyTemplateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GooglePrivacyDlpV2DeidentifyTemplate
   */
  public function create($parent, GooglePrivacyDlpV2CreateDeidentifyTemplateRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GooglePrivacyDlpV2DeidentifyTemplate::class);
  }
  /**
   * Deletes a DeidentifyTemplate. See https://cloud.google.com/dlp/docs/creating-
   * templates-deid to learn more. (deidentifyTemplates.delete)
   *
   * @param string $name Required. Resource name of the organization and
   * deidentify template to be deleted, for example
   * `organizations/433245324/deidentifyTemplates/432452342` or projects/project-
   * id/deidentifyTemplates/432452342.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets a DeidentifyTemplate. See https://cloud.google.com/dlp/docs/creating-
   * templates-deid to learn more. (deidentifyTemplates.get)
   *
   * @param string $name Required. Resource name of the organization and
   * deidentify template to be read, for example
   * `organizations/433245324/deidentifyTemplates/432452342` or projects/project-
   * id/deidentifyTemplates/432452342.
   * @param array $optParams Optional parameters.
   * @return GooglePrivacyDlpV2DeidentifyTemplate
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GooglePrivacyDlpV2DeidentifyTemplate::class);
  }
  /**
   * Lists DeidentifyTemplates. See https://cloud.google.com/dlp/docs/creating-
   * templates-deid to learn more.
   * (deidentifyTemplates.listOrganizationsDeidentifyTemplates)
   *
   * @param string $parent Required. Parent resource name. The format of this
   * value varies depending on the scope of the request (project or organization)
   * and whether you have [specified a processing
   * location](https://cloud.google.com/dlp/docs/specifying-location): + Projects
   * scope, location specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID +
   * Projects scope, no location specified (defaults to global):
   * `projects/`PROJECT_ID + Organizations scope, location specified:
   * `organizations/`ORG_ID`/locations/`LOCATION_ID + Organizations scope, no
   * location specified (defaults to global): `organizations/`ORG_ID The following
   * example `parent` string specifies a parent project with the identifier
   * `example-project`, and specifies the `europe-west3` location for processing
   * data: parent=projects/example-project/locations/europe-west3
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locationId Deprecated. This field has no effect.
   * @opt_param string orderBy Comma separated list of fields to order by,
   * followed by `asc` or `desc` postfix. This list is case-insensitive, default
   * sorting order is ascending, redundant space characters are insignificant.
   * Example: `name asc,update_time, create_time desc` Supported fields are: -
   * `create_time`: corresponds to time the template was created. - `update_time`:
   * corresponds to time the template was last updated. - `name`: corresponds to
   * template's name. - `display_name`: corresponds to template's display name.
   * @opt_param int pageSize Size of the page, can be limited by server. If zero
   * server returns a page of max size 100.
   * @opt_param string pageToken Page token to continue retrieval. Comes from
   * previous call to `ListDeidentifyTemplates`.
   * @return GooglePrivacyDlpV2ListDeidentifyTemplatesResponse
   */
  public function listOrganizationsDeidentifyTemplates($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GooglePrivacyDlpV2ListDeidentifyTemplatesResponse::class);
  }
  /**
   * Updates the DeidentifyTemplate. See https://cloud.google.com/dlp/docs
   * /creating-templates-deid to learn more. (deidentifyTemplates.patch)
   *
   * @param string $name Required. Resource name of organization and deidentify
   * template to be updated, for example
   * `organizations/433245324/deidentifyTemplates/432452342` or projects/project-
   * id/deidentifyTemplates/432452342.
   * @param GooglePrivacyDlpV2UpdateDeidentifyTemplateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GooglePrivacyDlpV2DeidentifyTemplate
   */
  public function patch($name, GooglePrivacyDlpV2UpdateDeidentifyTemplateRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GooglePrivacyDlpV2DeidentifyTemplate::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsDeidentifyTemplates::class, 'Google_Service_DLP_Resource_OrganizationsDeidentifyTemplates');
