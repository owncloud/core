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

/**
 * The "consentArtifacts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $consentArtifacts = $healthcareService->consentArtifacts;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsConsentStoresConsentArtifacts extends Google_Service_Resource
{
  /**
   * Creates a new Consent artifact in the parent consent store.
   * (consentArtifacts.create)
   *
   * @param string $parent Required. The name of the consent store this Consent
   * artifact belongs to.
   * @param Google_Service_CloudHealthcare_ConsentArtifact $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_ConsentArtifact
   */
  public function create($parent, Google_Service_CloudHealthcare_ConsentArtifact $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudHealthcare_ConsentArtifact");
  }
  /**
   * Deletes the specified Consent artifact. Fails if the artifact is referenced
   * by the latest revision of any Consent. (consentArtifacts.delete)
   *
   * @param string $name Required. The resource name of the Consent artifact to
   * delete. To preserve referential integrity, Consent artifacts referenced by
   * the latest revision of a Consent cannot be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HealthcareEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudHealthcare_HealthcareEmpty");
  }
  /**
   * Gets the specified Consent artifact. (consentArtifacts.get)
   *
   * @param string $name Required. The resource name of the Consent artifact to
   * retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_ConsentArtifact
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudHealthcare_ConsentArtifact");
  }
  /**
   * Lists the Consent artifacts in the specified consent store.
   * (consentArtifacts.listProjectsLocationsDatasetsConsentStoresConsentArtifacts)
   *
   * @param string $parent Required. Name of the consent store to retrieve consent
   * artifacts from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Restricts the artifacts returned to those
   * matching a filter. The following syntax is available: * A string field value
   * can be written as text inside quotation marks, for example `"query text"`.
   * The only valid relational operation for text fields is equality (`=`), where
   * text is searched within the field, rather than having the field be equal to
   * the text. For example, `"Comment = great"` returns messages with `great` in
   * the comment field. * A number field value can be written as an integer, a
   * decimal, or an exponential. The valid relational operators for number fields
   * are the equality operator (`=`), along with the less than/greater than
   * operators (`<`, `<=`, `>`, `>=`). Note that there is no inequality (`!=`)
   * operator. You can prepend the `NOT` operator to an expression to negate it. *
   * A date field value must be written in `yyyy-mm-dd` form. Fields with date and
   * time use the RFC3339 time format. Leading zeros are required for one-digit
   * months and days. The valid relational operators for date fields are the
   * equality operator (`=`) , along with the less than/greater than operators
   * (`<`, `<=`, `>`, `>=`). Note that there is no inequality (`!=`) operator. You
   * can prepend the `NOT` operator to an expression to negate it. * Multiple
   * field query expressions can be combined in one query by adding `AND` or `OR`
   * operators between the expressions. If a boolean operator appears within a
   * quoted string, it is not treated as special, it's just another part of the
   * character string to be matched. You can prepend the `NOT` operator to an
   * expression to negate it. The fields available for filtering are: - user_id.
   * For example, `filter=user_id=\"user123\"`. - consent_content_version -
   * metadata. For example, `filter=Metadata(\"testkey\")=\"value\"` or
   * `filter=HasMetadata(\"testkey\")`.
   * @opt_param int pageSize Optional. Limit on the number of consent artifacts to
   * return in a single response. If not specified, 100 is used. May not be larger
   * than 1000.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * the previous List request, if any.
   * @return Google_Service_CloudHealthcare_ListConsentArtifactsResponse
   */
  public function listProjectsLocationsDatasetsConsentStoresConsentArtifacts($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudHealthcare_ListConsentArtifactsResponse");
  }
}
