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
 * The "assessments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recaptchaenterpriseService = new Google_Service_RecaptchaEnterprise(...);
 *   $assessments = $recaptchaenterpriseService->assessments;
 *  </code>
 */
class Google_Service_RecaptchaEnterprise_Resource_ProjectsAssessments extends Google_Service_Resource
{
  /**
   * Annotates a previously created Assessment to provide additional information
   * on whether the event turned out to be authentic or fraudulent.
   * (assessments.annotate)
   *
   * @param string $name Required. The resource name of the Assessment, in the
   * format "projects/{project}/assessments/{assessment}".
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1AnnotateAssessmentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1AnnotateAssessmentResponse
   */
  public function annotate($name, Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1AnnotateAssessmentRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('annotate', array($params), "Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1AnnotateAssessmentResponse");
  }
  /**
   * Creates an Assessment of the likelihood an event is legitimate.
   * (assessments.create)
   *
   * @param string $parent Required. The name of the project in which the
   * assessment will be created, in the format "projects/{project}".
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Assessment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Assessment
   */
  public function create($parent, Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Assessment $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Assessment");
  }
}
