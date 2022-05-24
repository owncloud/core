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

namespace Google\Service\Monitoring\Resource;

use Google\Service\Monitoring\ListTimeSeriesResponse;

/**
 * The "timeSeries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google\Service\Monitoring(...);
 *   $timeSeries = $monitoringService->timeSeries;
 *  </code>
 */
class OrganizationsTimeSeries extends \Google\Service\Resource
{
  /**
   * Lists time series that match a filter.
   * (timeSeries.listOrganizationsTimeSeries)
   *
   * @param string $name Required. The project
   * (https://cloud.google.com/monitoring/api/v3#project_name), organization or
   * folder on which to execute the request. The format is:
   * projects/[PROJECT_ID_OR_NUMBER] organizations/[ORGANIZATION_ID]
   * folders/[FOLDER_ID]
   * @param array $optParams Optional parameters.
   *
   * @opt_param string aggregation.alignmentPeriod The alignment_period specifies
   * a time interval, in seconds, that is used to divide the data in all the time
   * series into consistent blocks of time. This will be done before the per-
   * series aligner can be applied to the data.The value must be at least 60
   * seconds. If a per-series aligner other than ALIGN_NONE is specified, this
   * field is required or an error is returned. If no per-series aligner is
   * specified, or the aligner ALIGN_NONE is specified, then this field is
   * ignored.The maximum value of the alignment_period is 104 weeks (2 years) for
   * charts, and 90,000 seconds (25 hours) for alerting policies.
   * @opt_param string aggregation.crossSeriesReducer The reduction operation to
   * be used to combine time series into a single time series, where the value of
   * each data point in the resulting series is a function of all the already
   * aligned values in the input time series.Not all reducer operations can be
   * applied to all time series. The valid choices depend on the metric_kind and
   * the value_type of the original time series. Reduction can yield a time series
   * with a different metric_kind or value_type than the input time series.Time
   * series data must first be aligned (see per_series_aligner) in order to
   * perform cross-time series reduction. If cross_series_reducer is specified,
   * then per_series_aligner must be specified, and must not be ALIGN_NONE. An
   * alignment_period must also be specified; otherwise, an error is returned.
   * @opt_param string aggregation.groupByFields The set of fields to preserve
   * when cross_series_reducer is specified. The group_by_fields determine how the
   * time series are partitioned into subsets prior to applying the aggregation
   * operation. Each subset contains time series that have the same value for each
   * of the grouping fields. Each individual time series is a member of exactly
   * one subset. The cross_series_reducer is applied to each subset of time
   * series. It is not possible to reduce across different resource types, so this
   * field implicitly contains resource.type. Fields not specified in
   * group_by_fields are aggregated away. If group_by_fields is not specified and
   * all the time series have the same resource type, then the time series are
   * aggregated into a single output time series. If cross_series_reducer is not
   * defined, this field is ignored.
   * @opt_param string aggregation.perSeriesAligner An Aligner describes how to
   * bring the data points in a single time series into temporal alignment. Except
   * for ALIGN_NONE, all alignments cause all the data points in an
   * alignment_period to be mathematically grouped together, resulting in a single
   * data point for each alignment_period with end timestamp at the end of the
   * period.Not all alignment operations may be applied to all time series. The
   * valid choices depend on the metric_kind and value_type of the original time
   * series. Alignment can change the metric_kind or the value_type of the time
   * series.Time series data must be aligned in order to perform cross-time series
   * reduction. If cross_series_reducer is specified, then per_series_aligner must
   * be specified and not equal to ALIGN_NONE and alignment_period must be
   * specified; otherwise, an error is returned.
   * @opt_param string filter Required. A monitoring filter
   * (https://cloud.google.com/monitoring/api/v3/filters) that specifies which
   * time series should be returned. The filter must specify a single metric type,
   * and can additionally specify metric labels and other information. For
   * example: metric.type = "compute.googleapis.com/instance/cpu/usage_time" AND
   * metric.labels.instance_name = "my-instance-name"
   * @opt_param string interval.endTime Required. The end of the time interval.
   * @opt_param string interval.startTime Optional. The beginning of the time
   * interval. The default value for the start time is the end time. The start
   * time must not be later than the end time.
   * @opt_param string orderBy Unsupported: must be left blank. The points in each
   * time series are currently returned in reverse time order (most recent to
   * oldest).
   * @opt_param int pageSize A positive number that is the maximum number of
   * results to return. If page_size is empty or more than 100,000 results, the
   * effective page_size is 100,000 results. If view is set to FULL, this is the
   * maximum number of Points returned. If view is set to HEADERS, this is the
   * maximum number of TimeSeries returned.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the nextPageToken value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @opt_param string secondaryAggregation.alignmentPeriod The alignment_period
   * specifies a time interval, in seconds, that is used to divide the data in all
   * the time series into consistent blocks of time. This will be done before the
   * per-series aligner can be applied to the data.The value must be at least 60
   * seconds. If a per-series aligner other than ALIGN_NONE is specified, this
   * field is required or an error is returned. If no per-series aligner is
   * specified, or the aligner ALIGN_NONE is specified, then this field is
   * ignored.The maximum value of the alignment_period is 104 weeks (2 years) for
   * charts, and 90,000 seconds (25 hours) for alerting policies.
   * @opt_param string secondaryAggregation.crossSeriesReducer The reduction
   * operation to be used to combine time series into a single time series, where
   * the value of each data point in the resulting series is a function of all the
   * already aligned values in the input time series.Not all reducer operations
   * can be applied to all time series. The valid choices depend on the
   * metric_kind and the value_type of the original time series. Reduction can
   * yield a time series with a different metric_kind or value_type than the input
   * time series.Time series data must first be aligned (see per_series_aligner)
   * in order to perform cross-time series reduction. If cross_series_reducer is
   * specified, then per_series_aligner must be specified, and must not be
   * ALIGN_NONE. An alignment_period must also be specified; otherwise, an error
   * is returned.
   * @opt_param string secondaryAggregation.groupByFields The set of fields to
   * preserve when cross_series_reducer is specified. The group_by_fields
   * determine how the time series are partitioned into subsets prior to applying
   * the aggregation operation. Each subset contains time series that have the
   * same value for each of the grouping fields. Each individual time series is a
   * member of exactly one subset. The cross_series_reducer is applied to each
   * subset of time series. It is not possible to reduce across different resource
   * types, so this field implicitly contains resource.type. Fields not specified
   * in group_by_fields are aggregated away. If group_by_fields is not specified
   * and all the time series have the same resource type, then the time series are
   * aggregated into a single output time series. If cross_series_reducer is not
   * defined, this field is ignored.
   * @opt_param string secondaryAggregation.perSeriesAligner An Aligner describes
   * how to bring the data points in a single time series into temporal alignment.
   * Except for ALIGN_NONE, all alignments cause all the data points in an
   * alignment_period to be mathematically grouped together, resulting in a single
   * data point for each alignment_period with end timestamp at the end of the
   * period.Not all alignment operations may be applied to all time series. The
   * valid choices depend on the metric_kind and value_type of the original time
   * series. Alignment can change the metric_kind or the value_type of the time
   * series.Time series data must be aligned in order to perform cross-time series
   * reduction. If cross_series_reducer is specified, then per_series_aligner must
   * be specified and not equal to ALIGN_NONE and alignment_period must be
   * specified; otherwise, an error is returned.
   * @opt_param string view Required. Specifies which information is returned
   * about the time series.
   * @return ListTimeSeriesResponse
   */
  public function listOrganizationsTimeSeries($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTimeSeriesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsTimeSeries::class, 'Google_Service_Monitoring_Resource_OrganizationsTimeSeries');
